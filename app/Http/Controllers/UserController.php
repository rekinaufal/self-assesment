<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Excel;
use Dompdf\Dompdf;
use App\Exports\UserExport;
/**
 * Class UserController
 * @package App\Http\Controllers
 */
class UserController extends Controller
{
    public static $pageTitle = 'User';

    function __construct()
    {
        $this->middleware('permission:user-list', ['only' => ['index']]);
        $this->middleware('permission:user-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:user-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:user-delete', ['only' => ['destroy']]);
        $this->middleware('permission:user-show', ['only' => ['show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $perpage = $request->input("perpage", 6);

        $users = User::paginate($perpage);

        $users->appends(["perpage" => $perpage]);

        $pageTitle = self::$pageTitle;

        // return view('user.index', compact('users', 'pageTitle'));
        return view('user.index', compact('pageTitle', 'users', 'perpage'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = new User();
        // $roles = Role::pluck('name', 'name')->all();
        $pageTitle = self::$pageTitle;

        $missingDataRoleUserForOption = Role::whereNotExists(function ($query) {
            $query->select('id')
                  ->from('model_has_roles')
                  ->whereColumn('roles.id', 'model_has_roles.role_id');
        })
        ->get();
        return view('user.create', compact('user', 'pageTitle', 'missingDataRoleUserForOption'));
    }

    public function store(Request $req)
    {
        request()->validate(User::$rules);

        $req = $req->all();
        $req['password'] = Hash::make($req['password']);
        $user = User::create($req);
        $user->assignRole($req['roles']);

        return redirect()->route('users.index')
            ->with('success', 'User created successfully.');
    }

    public function show($id)
    {
        $user = User::find($id);
        $userRole = "";
        if (!$user->roles->isEmpty()) {
            $userRole = $user->roles[0]->name;
        } else {

        }
        $pageTitle = self::$pageTitle;

        return view('user.show', compact('user', 'pageTitle', 'userRole'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('users.index')
            ->with('failed', 'Users Id '. $id . ' Not Found');
        }
        $userRole = $user->roles->pluck('name')->first();
        // dd($userRole);
        $roles = Role::pluck('name', 'name')->all();
        // $userRole = $user->roles->pluck('name', 'name')->all();
        $pageTitle = self::$pageTitle;
        return view('user.edit', compact('user', 'roles', 'userRole', 'pageTitle'));
    }

    public function update(Request $req, User $user)
    {
        request()->validate(User::$rules);

        $req = $req->all();
        if (!empty($req['password'])) {
            $req['password'] = Hash::make($req['password']);
        } else {
            unset($req['password']);
        }
        $user->update($req);

        DB::table('model_has_roles')->where('model_id', $user->id)->delete();

        $user->assignRole($req['roles']);

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        if ($id) {
            User::find($id)->delete();
            return redirect()->route('users.index')
                ->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('users.index')
                ->with('failed', 'User deleted failed because id is empty or null');
        }
    }

    public function destroyByCheckbox(Request $request)
    {
        $dataArray = explode(",", $request->idsDownload);
        if ($dataArray) {
            foreach ($dataArray as $value) {
                User::find($value)->delete();
            }
            return redirect()->route('users.index')
                ->with('success', 'User deleted successfully');
        } else {
            return redirect()->route('users.index')
                ->with('failed', 'User deleted failed because id is empty or null');
        }
    }

    public function exportExcel()
    {
        return Excel::download(new UserExport, 'user.xlsx');
        return redirect()->back();
    }

    public function exportPdf()
    {
        $th = [
            'fullname',
            'email',
            'created at'
        ];
        $users = User::all();

        $html = view('pdf.table', compact('users', 'th'));
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream('users.pdf');
    }

    public function changePassword(Request $req, User $user)
    {
        request()->validate(User::$rules);
        $id = auth()->user()->id;
        $user = User::find($id);

        if (Hash::check($req->current_password, $user->password)) {
            if (!empty($req->new_password)) {
                $isEdited = User::where('id', $id)->update([
                    'password' => Hash::make($req->new_password)
                ]);
                if ($isEdited) {
                    return redirect()->back()
                        ->with('success', 'Data berhasil diupdate');
                }
            }

        } else {
            return redirect()->back()->with('failed', 'Current password is wrong !');
        }
        return redirect()->back()->with('failed', 'Password gagal diedit');
    }

    public function getNewsJson()
    {
        $users = User::all();

        if (!$users) abort(404, "Not found users");

        return response()->json($users);
    }

    public function deletedBatch(Request $request)
    {
        dd($request->delete_ids);
        $deleteIds = json_decode($request->delete_ids);

        $deletedNews = User::whereIn('id', $deleteIds)->delete();
        // dd($deleteIds);
        if (!$deletedNews) {
            return redirect()->route("users.index")->with("failed", "Failed to delete batch!");
        }

        return redirect()->route("users.index")->with("success", "Successfully to delete the selected users!");
    }
}
