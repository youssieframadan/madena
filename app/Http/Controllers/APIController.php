<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Type;
class APIController extends Controller
{
    public function category()
    {
        return Category::All();
    }
    public function type($category_id)
    {
        $category = Category::find($category_id);
        if($category){
            return $category->type()->get();
        }else{
            return abort(404);
        }
    }
}
