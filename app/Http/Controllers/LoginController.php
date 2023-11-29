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
use Carbon\Carbon;
use Illuminate\Support\Str;
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
        // $user = User::where('email', $email)->get();
        // $email = '';
        // $email = (string)$request->email;
        $user = DB::table('users')->where('email', $request->email)->first();
        if (!$user || !$user->email_verified_at) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records or the email is not verified.',
                'section' => 'login',
            ]);
        }

        // remember me
        if ($request->remember == null) {
            // setcookie('login_email',$request->email,100);
            // setcookie('login_pass',$request->password,100);
        } else {
            setcookie('login_email', $request->email, time() + 60 * 60 * 24 * 100);
            setcookie('login_pass', $request->password, time() + 60 * 60 * 24 * 100);
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            $user = auth()->user();
            $userRole = $user->roles->pluck('name')->first();
            session(['role' => $userRole]);
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
        if ($userRole == "Admin") {
            return view('pages.dashboard_admin', compact('permenperinCount', 'allUserPremiumCount', 'user', 'userRole', 'userCount', 'roleCount', 'pageTitle', 'type_menu'));
        }
        return view('pages.dashboard', compact('newsData', 'permenperinCount', 'allUserPremiumCount', 'user', 'userRole', 'userCount', 'roleCount', 'pageTitle', 'type_menu'));
    }

    public function filteredNewsDashboardUser(Request $request)
    {
        $permenperinCount = PermenperinCategory::all()->count();
        $userCount = User::count();
        $roleCount = Role::count();
        $allUserPremiumCount = User::with('user_category')->where("user_category_id", "1")->count();
        $user = auth()->user();
        $userRole = $user->roles->pluck('name')->first();
        $pageTitle = 'Dashboard';
        $type_menu = 'dashboard';
        $newsData = News::all();
        $requestValue = $request->input('filterName');
        if ($requestValue != '') {
            $filteredNewsData = News::where("created_at", "like", "%{$requestValue}%")->get();
            //dd($filteredNewsData);
            if ($filteredNewsData != null) {
                return response()->json($filteredNewsData, 200);
            }
        }
        //return view('pages.dashboard', compact('newsData', 'permenperinCount', 'allUserPremiumCount', 'user', 'userRole', 'userCount', 'roleCount', 'pageTitle', 'type_menu'));
        return response()->json($newsData, 200);
    }

    public function viewForgetPassword()
    {
        $pageTitle = 'Forget Password';
        return view('pages.auth-forgot-password', compact('pageTitle'));
    }

    public function forgetPassword(Request $request)
    {
        DB::beginTransaction();
        try {
            $getUser = DB::table('users')->where('email', $request->email)->first();
            // dd(Str::random(12));
            // if (!empty($getUser)) {
            $randomString = Str::random(12);
            $fieldUpdate = [
                'password'      => Hash::make($randomString),
                // 'updated_by' => $getUser->id,
            ];
            DB::table('users')->where('id', $getUser->id)->update($fieldUpdate);
            // send email
            $subject = "Forget Password E-learning";
            $details = [
                'title' => 'Forget Password',
                'opener' => 'Hai, You have requested a password reset. ',
                'opener_desc' => 'Your password will be changed to ' . $randomString,
                'closing' => 'Please log in and change your password in the profile form.',
            ];

            \Mail::to($getUser->email)->send(new \App\Mail\ForgetPassword($details, $subject));
            // return back()->with('success', 'Password reset successful, please check your email');
            // } else {
            // return back()->with('failed', 'Invalid Email');
            // }
            DB::commit();
            return redirect()->route('login')->with('success', 'Password reset successful, please check your email');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('failed', 'An error occurred during forget password. Please try again.');
        }
    }

    public function register(Request $request)
    {
        DB::beginTransaction();
        try {
            request()->validate(User::$rules);

            $credentials = [
                "email" => $request->email,
                "password" => Hash::make($request->password),
                "user_category_id" => 1,
                "is_active" => 1
            ];

            $user = User::create($credentials);

            $user_profile = UserProfile::create([
                "user_id" => $user->id,
                "fullname" => $request->fullname
            ]);

            $user->assignRole('Pengguna');

            // dd($user->id, $request->fullname, $request->email);
            $this->sendEmailRegister($user->id, $request->fullname, $request->email);

            DB::commit();
            return redirect()->route('login')->with('success', 'Please check your email for verification. If its not in your inbox, check your spam folder. ');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('failed', 'An error occurred during registration. Please try again.');
        }
    }

    public function sendEmailRegister($id, $name, $email)
    {
        // dd($name . '-' . $email );
        $subject = "Registration Comfirmation";
        $details = [
            'title' => 'Registration E-learning',
            'body1' => 'Dear ' . $name . ' , Thank you for creating an account through our website 
                        E-learning. For your security, please kindly 
                        verify your account for a better experience by clicking the 
                        button below',
            'button' => $id,
            'body2' => 'If in any case, you need our assistance, please do not 
                        hesitate to contact us through email at 
                        artexsinergi@smtp14.mailtarget.co.',
        ];

        \Mail::to($email)->send(new \App\Mail\VerifyRegister($details, $subject));
    }

    public function verify($id)
    {
        $Get = DB::table('users')->where('id', $id)->first();
        if (!$Get) {
            return redirect('/')->with('failed', 'Error');
        }
        if ($Get->email_verified_at != null) {
            return redirect('/')->with('failed', 'Your email has been verified on ' . $Get->email_verified_at);
        } else {
            $mytime = Carbon::now();
            $fieldUpdate = [
                'email_verified_at' =>  $mytime->toDatetimeString()
            ];
            $update = DB::table('users')->where('id', $id)->update($fieldUpdate);
            return redirect('/')->with('success', 'Verify email successfully, Please login');
        }
    }
}
