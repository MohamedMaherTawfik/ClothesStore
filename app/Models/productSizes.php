<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productSizes extends Model
{
    protected $table = 'product_sizes';
    protected $fillable = ['products_id', 'size'];

    public function products()
    {
        return $this->belongsTo(products::class);
    }
}
