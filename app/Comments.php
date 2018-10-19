<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $fillable = [
        'product_id','user_id','comment_body'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
