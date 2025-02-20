<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productColors extends Model
{
    protected $table = 'product_colors';

    protected $fillable = [
        'color',
    ];

    public function products()
    {
        return $this->belongsToMany(products::class,'product_color_sizes');
    }
}
