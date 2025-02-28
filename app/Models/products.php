<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'image', 'description', 'price', 'discount', 'status', 'categorey_id', 'brand_id'];

    public function categorey()
    {
        return $this->belongsTo(categorey::class);
    }

    public function brand()
    {
        return $this->belongsTo(brand::class);
    }

    public function colors()
    {
        return $this->belongsToMany(productColors::class, 'product_color_sizes');
    }

    public function sizes()
    {
        return $this->belongsToMany(productSizes::class, 'product_color_sizes');
    }

    public function colorsizes()
    {
        return $this->hasMany(ProductColorSizes::class, 'products_id');
    }

    public function blog()
    {
        return $this->hasMany(blogs::class);
    }

    public function stock()
    {
        return $this->hasMany(stocks::class);
    }
}
