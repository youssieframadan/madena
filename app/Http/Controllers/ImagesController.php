<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product_image;
use App\Product;
class ImagesController extends Controller
{
    public function imageapi($id)
    {
        $image = product_image::where('product_id','=',$id)->get();
        return response()->json($image);
        
    }
}
