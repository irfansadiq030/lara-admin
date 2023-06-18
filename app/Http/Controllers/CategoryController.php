<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // View Category

    public function view_categories(){

        return view('admin.categories');

    }

    // Add New Category

    public function add_category(){
        return view('admin.add-category');
    }
}
