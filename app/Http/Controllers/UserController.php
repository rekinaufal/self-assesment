<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Computation;
use App\Models\CalculationResult;

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
        $roles = Role::get();
        // dd($roles);
        return view('user.create', compact('user', 'pageTitle', 'missingDataRoleUserForOption', 'roles'));
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
                ->with('failed', 'Users Id ' . $id . ' Not Found');
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

        $req = $req->all();
        if (!empty($req['password'])) {
            request()->validate(User::$rules);
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
        $data = [
            "computations" => Computation::where('id', 1)->get(),
            "form_detail" => CalculationResult::where('computation_id', 1)->get()->toArray(),
        ];
        // dd($data['form_detail'][0]['results']['calculations']);
        if (!$data['form_detail'][0]) {
            return redirect()->back()->with('failed', 'Data is Empty');
        }
        $form = [];
        foreach ($data['form_detail'][0]['results']['calculations'] as $item) {
            // dd($item['no']);
            $form[$item['no']] = $item;
        }
        // dd($form, $data['computations'][0]);
        $export = new UserExport($form, $data['computations'][0]);
        // Excel::download($export, 'report.xlsx');
        // return Excel::download(new UserExport, 'user.xlsx');
        return Excel::download($export, 'report.xlsx');
        // return redirect()->back();
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
        // request()->validate(User::$rules);
        $id = auth()->user()->id;
        $user = User::find($id);
        // dd($user);
        if (!$user) {
            return redirect()->back()->with('failed', 'User is empty');
        }

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

    public function getUsersJson()
    {
        $users = User::all();

        if (!$users) abort(404, "Not found users");

        return response()->json($users);
    }

    public function deletedBatch(Request $request)
    {
        // dd($request->delete_ids);
        $deleteIds = json_decode($request->delete_ids);

        $deletedNews = User::whereIn('id', $deleteIds)->delete();
        // dd($deleteIds);
        if (!$deletedNews) {
            return redirect()->route("users.index")->with("failed", "Failed to delete batch!");
        }

        return redirect()->route("users.index")->with("success", "Successfully to delete the selected users!");
    }

    public function search(Request $req)
    {
        $perpage = $req->input("perpage", 6);
        // $users = User::where('email','LIKE','%'.$req->search.'%')->paginate($perpage);
        $search_value = $req->search;
        $users = User::join('user_profiles', 'users.id', '=', 'user_profiles.user_id')
                        ->where('user_profiles.fullname','LIKE','%'.$search_value.'%')
                        ->paginate($perpage);
        $users->appends(["perpage" => $perpage]);
        $pageTitle = self::$pageTitle;

        return view('user.index', compact('pageTitle', 'users', 'perpage', 'search_value'));

        // if($req->ajax())
        // {
        //     $perpage = $req->input("perpage", 6);
        //     $users = User::where('email','LIKE','%'.$req->search.'%') ->paginate($perpage);
        //     $users->appends(["perpage" => $perpage]);
        //     $pageTitle = self::$pageTitle;
        // }   
        // return [
        //     'pageTitle' => $pageTitle,
        //     'users' => $users,
        //     'perpage' => $perpage,
        // ];
    }
}
