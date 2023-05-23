<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AdminController extends Controller
{
    public function index()
    {
        return View('admin.auth-pages.login');
    }

    public function admin_login(Request $request)
    {
        dd($request->input());
    }
}
