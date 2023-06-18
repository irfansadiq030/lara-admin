<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use App\Notifications\loggedInNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function index()
    {
        return View('admin.auth-pages.login');
    }

    public function admin_login(Request $request)
    {
        // dd($request->input());
        $check = $request->all();
        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {


            // Send email notification after the user logs in successfully.
            $user = Auth::guard('admin')->user();
            Notification::send($user, new loggedInNotification($user));

            return redirect()->route('admin.dashboard')->with('msg', 'Admin Logged in Successfully');
        } else {
            return back()->with('msg', 'Invalid Email or Password');
        }
    }

    public function admin_dashboard(Request $request)
    {
        return View('admin.dashboard');
    }

    public function admin_logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('login_form')->with('msg', 'Admin Logged Out');
    }

    public function register()
    {
        return view('admin.auth-pages.register');
    }

    public function admin_register(Request $request)
    {
        // dd($request->all());
        Admin::insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),
        ]);

        return redirect()->route('login_form')->with('msg', 'Admin Created Successfully');
    }

    // View Profile

    public function admin_profile(){
        return view('admin.admin-profile');
    }

    // Edit Profile

    public function edit_profile(){

        $admin_info = Auth::guard('admin')->user();

        return view('admin.edit-profile',compact('admin_info'));
    }

    // Update Profile

    public function update_profile(Request $request){
        dd($request->all());
    }
}
