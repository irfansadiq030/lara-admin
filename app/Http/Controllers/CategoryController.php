<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\TempImage;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\Datatables;
use Image;

class CategoryController extends Controller
{
    // View Category

    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Category::select('*')->orderBy('id', 'desc');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $editUrl = route('categories.edit', $row->id);
                    $deleteUrl = route('delete-category', $row->id);
                    $actionBtn = '<td class="tb-tnx-action">
                                        <div class="dropdown">
                                            <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown" aria-expanded="false"><em class="icon ni ni-more-h"></em></a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-xs" style="">
                                                <ul class="link-list-plain">
                                                    <li><a href="#" onclick="confirmDelete()">View</a></li>
                                                    <li><a href="' . $editUrl . '">Edit</a></li>
                                                    <li><a href="' . $deleteUrl . '" >Remove</a></li>
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
        $category->save();

        // Saving IMAGE
        if (!empty($request->input('img_id'))) {
            $temp_img = TempImage::find($request->input('img_id'));
            $extArray = explode('.', $temp_img->name);
            $ext = last($extArray);

            $newImgName = $category->id . '.' . $ext;
            $sPath = public_path() . '/temp/' . $temp_img->name;
            $dPath = public_path() . '/uploads/category/' . $newImgName;

            File::copy($sPath, $dPath);

            // Generate Image Thumbnail
            $dPath = public_path() . '/uploads/category/thumb/' . $newImgName;
            $full_img = Image::make($sPath);
            $thumbnail = $full_img->fit(450,600);
            $thumbnail->save($dPath);

            // Save Category Again
            $category->img = $newImgName;
            $category->save();
        }

        return redirect()->route('categories');
    }

    // Edit Category
    public function edit($category_id)
    {
        // dd($category_id);
        $category_data = Category::find($category_id);

        if (empty($category_data)) {
            return redirect()->route('categories');
        }
        return view('admin.edit-category', compact('category_data'));

        // dd($category_data);

    }

    // Update Category
    public function update(Request $request)
    {
        $id = $request->input('category_id');
        $category = Category::find($id);

        if (empty($category)) {
            return redirect('admin/categories')->with('error', 'Category not found!');
        }

        $validated = $request->validate([
            'category_title' => 'required',
            'slug' => 'required|unique:categories,slug,' . $id . ',id',
        ]);

        // Update category attributes
        $category->title = $request->input('category_title');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('category_status');
        // Save the updated category
        $category->save();

        // Old image 
        $old_img = $category->img;

        // Saving IMAGE
        if (!empty($request->input('img_id'))) {
            $temp_img = TempImage::find($request->input('img_id'));
            $extArray = explode('.', $temp_img->name);
            $ext = last($extArray);

            $newImgName = $category->id . '.' . $ext;
            $sPath = public_path() . '/temp/' . $temp_img->name;
            $dPath = public_path() . '/uploads/category/' . $newImgName;

            File::copy($sPath, $dPath);

            // Save Category Again
            $category->img = $newImgName;
            $category->save();
        }

        // Delete old Image here
        $old_img = $category->img;
        File::delete(public_path().'uploads/category/thumb/'.$old_img);
        File::delete(public_path().'uploads/category/'.$old_img);


        return redirect('admin/categories')->with('msg', 'Category updated successfully!');
    }

    // Delete Category
    public function delete($id)
    {
        $category = Category::find($id);

        if (!$category) {
            return redirect()->route('categories')->with('error', 'Category not found!');
        }

        $category->delete();

        return redirect()->route('categories')->with('success', 'Category deleted successfully!');
    }
}
