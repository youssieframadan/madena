<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_image extends Model
{
    protected $fillable = [
        'product_id','image_location',
    ];
    public function product(){
    	return $this->BelongsTo(Products::class);
    }
}
