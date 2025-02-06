<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'image', 'description', 'price', 'quantity', 'discount', 'status', 'category_id', 'brand_id'];

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
        return $this->hasMany(productColors::class);
    }

    public function sizes()
    {
        return $this->hasMany(productSizes::class);
    }
}
