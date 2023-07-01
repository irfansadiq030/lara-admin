<?php

namespace App\Http\Controllers;

use App\Models\TempImage;
use Illuminate\Http\Request;

class TempImagesController extends Controller
{
    //Create
    public function create(Request $request)
    {
        if ($request->hasFile('temp-img')) {
            $uploaded_img = $request->file('temp-img');

            $file_name = $uploaded_img->getClientOriginalName();
            $exp = explode('.', $file_name);
            $new_name = 'temp_' . time() . '.' . $exp[1];

            $temp_image = new TempImage();
            $temp_image->name = $new_name;
            $temp_image->save();

            // Move img to directory
            $uploaded_img->move(public_path() . '/temp', $new_name);
            // Return the URL in the response
            return response()->json([
                'msg' => 'success',
                'code' => 200,
                "img_id" => $temp_image->id

            ]);
        } else {
            echo 'Noo';
        }
    }
}
