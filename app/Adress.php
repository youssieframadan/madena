<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    protected $fillable = [
        'governorate_id','city_id','store_id','street','block_no',
    ];
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }
    public function products()
    {
        return $this->belongsToMany(Product::class,'adress_products');
    }
}
