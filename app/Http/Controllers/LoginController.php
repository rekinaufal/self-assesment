<?php

namespace App\Http\Controllers;

use App\Models\PermenperinCategory;
use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;

class LoginController extends Controller
{
    public function index()
    {
        if (auth()->user()) {
            return redirect()->route('dashboard');
        }

        $pageTitle = 'Login';
        $pageDescription = 'Some description for the page';

        return view('login.login', compact('pageTitle', 'pageDescription'));
    }

    public function loginAdmin()
    {
        if (auth()->user()) {
            return redirect()->route('dashboard');
        }

        $pageTitle = 'Login Admin';
        $pageDescription = 'Some description for the page';

        return view('login.login_admin', compact('pageTitle', 'pageDescription'));
    }

    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $remember = request('remember');
        if (!empty($user)) {
            $userRole = $user->roles->pluck('name')->first();
            // Validate login on the admin page and use a non-admin account.
            if ($request->type == 'admin' && $userRole != 'Administrator') {
                return back()->withErrors([
                    'email' => 'You are not an admin, please login with an admin account.',
                ]);
            }
            if ($request->type == 'reguler' && $userRole == 'Administrator') {
                return back()->withErrors([
                    'email' => 'You are not an reguler, please login with an reguler account.',
                ]);
            }
        }

        if (Auth::attempt($request->only('email', 'password'), $remember)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function dashboard()
    {
        $userCount = User::count();
        $roleCount = Role::count();
        $allUserPremiumCount = User::with('user_category')->where("user_category_id", "1")->count();
        $user = auth()->user();
        $userRole = $user->roles->pluck('name')->first();
        $pageTitle = 'Dashboard';
        $type_menu = 'dashboard';
        $permenperinCount = PermenperinCategory::all()->count();
        if ($userRole == "Administrator") {
            return view('pages.dashboard_admin', compact('permenperinCount', 'allUserPremiumCount', 'user', 'userRole', 'userCount', 'roleCount', 'pageTitle', 'type_menu'));
        }
        return view('pages.dashboard', compact('permenperinCount', 'allUserPremiumCount', 'user', 'userRole', 'userCount', 'roleCount', 'pageTitle', 'type_menu'));
    }
    public function viewForgetPassword()
    {
        $pageTitle = 'Forget Password';
        return view('pages.auth-forgot-password', compact('pageTitle'));
    }

    public function forgetPassword(Request $request)
    {
        $getUser = DB::table('users')->where('email', $request->email)->first();
        // dd($getUser);
        if (!empty($getUser)) {
            $fieldUpdate = [
                'password'      => Hash::make('Rapp@' . $getUser->username),
                'updated_by' => $getUser->id,
            ];
            $update = DB::table('users')->where('id', $getUser->id)->update($fieldUpdate);
            // send email 
            $subject = "Forget Password E-learning";
            $details = [
                'title' => 'Forget Password',
                'body1' => 'Hai ' . $getUser->name . ', You have requested a password reset. ',
                'body2' => 'Your password will be changed to learning@' . $getUser->username,
                'body3' => 'Please log in and change your password in the profile form.',
            ];

            \Mail::to($getUser->email)->send(new \App\Mail\Email($details, $subject));
            // return back()->with('success', 'Password reset successful, please check your email');
            return redirect()->route('login')
                ->with('success', 'Password reset successful, please check your email');
        } else {
            return back()->with('failed', 'Invalid Email');
        }
    }

    public function register(Request $req)
    {
        request()->validate(User::$rules);

        $req = $req->all();
        $req['password'] = Hash::make($req['password']);
        $user = User::create($req);
        // $user->assignRole($req['roles']);

        $user_profile = UserProfile::create([
            "user_id" => $user->id
        ]);

        if ($user_profile) {
            return redirect()->route('login')->with('success', 'Registrasi Berhasil');
        } else {
            return redirect()->back()->with('failed', 'Registrasi gagal');
        }
    }
}
