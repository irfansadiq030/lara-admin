<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

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
}
