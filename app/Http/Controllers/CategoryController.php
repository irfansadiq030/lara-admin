<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Yajra\DataTables\Facades\Datatables;

class CategoryController extends Controller
{
    // View Category

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Category::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = $row->id;
                    $actionBtn = '<td class="tb-tnx-action">
                                        <div class="dropdown">
                                            <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs" style="">
                                                <ul class="link-list-plain">
                                                    <li><a href="#">View</a></li>
                                                    <li><a href="category.edit.'. $editUrl.'">Edit</a></li>
                                                    <li><a href="#">Remove</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </td>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // $categories = Category::all();
        return view('admin.categories');
    }

    // Add New Category

    public function create()
    {
        return view('admin.add-category');
    }

    // Create Category
    public function store(Request $request)
    {
        // dd($request->input('category_title'));
        $validated = $request->validate([
            'category_title' => 'required',
            'slug' => 'required|unique:categories',
        ]);

        $category = new Category();
        $category->title = $request->input('category_title');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('category_status');
        $category->img = 'null';

        // Save
        $category->save();

        return redirect('admin/dashboard')->with('msg', 'Category Added Successfuly!');
    }
}
