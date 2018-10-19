<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Product extends Model
{

    protected $fillable = [
        'product_title', 'product_category_id','product_type_id','product_description','product_price_presale'
        ,'product_price_postsale','store_id','product_sale',
    ];
    public static function boot() {
        parent::boot();

        static::deleting(function($product) { // before delete() method call this
            foreach($product->Images() as $image){
                $filename = public_path($image->image_location);
                File::delete($filename);
            }
             $product->Images()->delete();
             $product->likes()->delete();
             $product->shares()->delete();
             $product->comments()->delete();
             $product->views()->delete();
             $product->views()->delete();
             $product->adresses()->detach();
             // do the rest of the cleanup...
        });
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
    
    public function Images()
    {
        return $this->hasMany(product_image::class);
    }

    public function adresses()
    {
        return $this->belongsToMany(Adress::class,'adress_products');
    }
    public function likes()
    {
        return $this->hasMany(Likes::class);
    }
    public function shares()
    {
        return $this->hasMany(Share::class);
    }
    public function comments()
    {
        return $this->hasMany(Comments::class)->latest();
    }
    public function views()
    {
        return $this->hasMany(View::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class,'product_type_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class,'product_category_id');
    }
    public function Recommend(){
        return $this::where('product_type_id',$this->product_type_id)->get()->sortBy(function ($product)
        {
            return $product->likes->count();
        },SORT_REGULAR,true);
    }
}
