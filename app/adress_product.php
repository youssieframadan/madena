<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class adress_product extends Model
{
    protected $table = "adress_products";
    protected $fillable = [
        'adress_id','product_id','product_status',
    ];
}
