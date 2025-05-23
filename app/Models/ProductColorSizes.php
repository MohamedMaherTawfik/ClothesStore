<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductColorSizes extends Model
{
    protected $table ='product_color_sizes';
    protected $fillable = ['products_id','product_colors_id','product_sizes_id'];

    public function product()
    {
        return $this->belongsTo(products::class);
    }

    public function color()
    {
        return $this->belongsTo(productColors::class);
    }

    public function size()
    {
        return $this->belongsTo(productSizes::class);
    }
}
