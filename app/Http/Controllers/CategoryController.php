<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    // View Category

    public function index(){

        $categories = Category::all();
        return view('admin.categories',compact('categories'));

    }

    // Add New Category

    public function create(){
        return view('admin.add-category');
    }

    // Create Category
    public function store(Request $request)
    {
        // dd($request->input('category_title'));

        $category = new Category();
        $category->title = $request->input('category_title');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('category_status');
        $category->img = 'null';

        // Save
        $category->save();

        return redirect('admin/dashboard')->with('msg','Category Added Successfuly!');
    }
}
