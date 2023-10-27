<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
class UserProfileController extends Controller
{
    public function profile(){
        $id = auth()->user()->id;
        $pageTitle = 'Profile';
        $user = User::find($id);
        if (!$user) {
            return redirect()->route('dashboard')
            ->with('failed', 'Users Id '. $id . ' Not Found');
        }
        $userRole = $user->roles->pluck('name')->first();
        // $profile = DB::table('users')
        //     ->leftJoin('user_profiles', 'users.id', '=', 'user_profiles.user_id')
        //     ->where('user_profiles.user_id', '=', $id) 
        //     ->select('users.*', 'user_profiles.*') 
        //     ->first();
        $profile = UserProfile::where('user_id', $id)->first();
        // dd($profile);
        return view('user.profile', compact('pageTitle', 'profile', 'userRole', 'user'));

    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function show(UserProfile $userProfile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(UserProfile $userProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req)
    {
        // request()->validate(UserProfile::$rules);
        $id = auth()->user()->id;
        //  dd($id);
        $isEdited = UserProfile::where('user_id', $id)->update([
            'user_id' => $id,
            'fullname' => $req->fullname,
            'company_name' => $req->company_name,
            'company_address' => $req->company_address,
            'phone_number' => $req->phone_number,
            'job_title' => $req->job_title
        ]);
        if ($isEdited) {
            return redirect()->back()
                ->with('success', 'Data updated successfully');
        }
        return redirect()->back()->with('failed', 'Profile gagal diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }
}
