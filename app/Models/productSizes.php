<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productSizes extends Model
{
    protected $table = 'product_sizes';
    protected $fillable = ['size'];

    public function products()
    {
        return $this->belongsToMany(products::class,'product_color_sizes');
    }
}
