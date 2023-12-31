<?php

namespace App\Http\Controllers;

use App\Models\News;
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

    public function loginOne()
    {
        if (auth()->user()) {
            return redirect()->route('dashboard');
        }

        $pageTitle = 'Login';
        $pageDescription = 'Some description for the page';

        return view('login.login-one', compact('pageTitle', 'pageDescription'));
    }

    public function loginTwo()
    {
        if (auth()->user()) {
            return redirect()->route('dashboard');
        }

        $pageTitle = 'Login';
        $pageDescription = 'Some description for the page';

        return view('login.login-two', compact('pageTitle', 'pageDescription'));
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
        // $profile = UserProfile::where('user_id', $user->id)->first();
        $remember = request('remember');
        // if (!empty($user)) {
        //     // $userRole = $user->roles->pluck('name')->first();
        //     // // Validate login on the admin page and use a non-admin account.
        //     // if ($request->type == 'admin' && $userRole != 'Administrator') {
        //     //     return back()->withErrors([
        //     //         'email' => 'You are not an admin, please login with an admin account.',
        //     //     ]);
        //     // }
        //     // if ($request->type == 'reguler' && $userRole == 'Administrator') {
        //     //     return back()->withErrors([
        //     //         'email' => 'You are not an reguler, please login with an reguler account.',
        //     //     ]);
        //     // }
        // }

        if (Auth::attempt($request->only('email', 'password'), $remember)) {
            $request->session()->regenerate();
            // Menyimpan avatar ke session
            // if ($profile) {
            //     $avatar = url('uploads/'.$profile->avatar);
            //     $fullname = $profile->fullname;
            //     session(['avatar' => $avatar]);
            //     session(['fullname' => $fullname]);
            // }
            return redirect()->route('dashboard');
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
                'section' => 'login',
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
        $newsData = News::all();
        $permenperinCount = PermenperinCategory::all()->count();
        if ($userRole == "Administrator") {
            return view('pages.dashboard_admin', compact('permenperinCount', 'allUserPremiumCount', 'user', 'userRole', 'userCount', 'roleCount', 'pageTitle', 'type_menu'));
        }
        return view('pages.dashboard', compact('newsData', 'permenperinCount', 'allUserPremiumCount', 'user', 'userRole', 'userCount', 'roleCount', 'pageTitle', 'type_menu'));
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

    public function register(Request $request)
    {
        request()->validate(User::$rules);

        $credentials = [
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "user_category_id" => 1
        ];

        $user = User::create($credentials);

        $user_profile = UserProfile::create([
            "user_id" => $user->id,
            "fullname" => $request->fullname
        ]);

        if ($user_profile) {
            return redirect()->route('login')->with('success', 'Registrasi Berhasil');
        } else {
            return redirect()->back()->with('failed', 'Registrasi gagal');
        }
    }
}
