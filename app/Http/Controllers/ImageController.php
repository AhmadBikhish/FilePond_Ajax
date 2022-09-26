<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        return view('image.index');
    }


    public function store(Request $request)
    {
        foreach($request->image as $image){
            $name = rand(11111,99999).'.'.$image->extension();
            $image->move(public_path('images'), $name);
            $image = Image::create(['image_name' => $name]);
        }

        return response()->json($image->id);
    }


    public function destroy(Request $request)
    {
        $image = Image::find($request->getContent());
        unlink(public_path('images'.DIRECTORY_SEPARATOR.$image->image_name));
        $image->delete();
        return true;
    }
}
