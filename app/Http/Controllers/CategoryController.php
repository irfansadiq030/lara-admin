<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

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

    // Create Category
    public function create_category(Request $request)
    {
        // dd($request->input('category_title'));

        $category = new Category();
        $category->title = $request->input('category_title');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->img = 'null';

        // Save
        $category->save();

        return redirect('admin/dashboard')->with('msg','Category Added Successfuly!');
    }
}
