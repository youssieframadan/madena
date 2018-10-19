<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function product(){
    	return $this->hasMany(Product::class,'product_category_id');
    }
    public function type(){
    	return $this->hasMany(Type::class,'category_id');
    }
}
