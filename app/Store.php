<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'storename', 'user_id','phone_no','store_image',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function adresses()
    {
        return $this->hasMany(Adress::class);
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function likes()
    {
        $counter = 0;
        foreach($this->products as $product){
            $counter =+ $product->likes()->count();
        }
        return $counter;
    }
    public function shares()
    {
        $counter = 0;
        foreach($this->products as $product){
            $counter =+ $product->shares()->count();
        }
        return $counter;
    }
    public function comments()
    {
        $counter = 0;
        foreach($this->products as $product){
            $counter =+ $product->comments()->count();
        }
        return $counter;
    }
    public function views()
    {
        $counter = 0;
        foreach($this->products as $product){
            $counter =+ $product->views()->count();
        }
        return $counter;
    }
}
