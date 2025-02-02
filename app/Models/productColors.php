<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productColors extends Model
{
    protected $table = 'product_colors';

    protected $fillable = [
        'products_id',
        'color',
    ];

    public function products()
    {
        return $this->belongsTo(products::class);
    }
}
