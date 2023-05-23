<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

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
        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) 
        {
            return redirect()->route('admin.dashboard')->with('msg', 'Admin Logged in Successfully');

        }else{
            return back()->with('msg', 'Invalid Email or Password');
        }
    }

    public function admin_dashboard(Request $request)
    {
        return View('admin.dashboard');
    }
}
