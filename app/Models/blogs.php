<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class blogs extends Model
{
    protected $table = 'blogs';
    protected $fillable = [
        'blog',
        'user_id',
        'products_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->belongsTo(products::class);
    }
}
