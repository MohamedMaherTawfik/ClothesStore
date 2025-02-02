<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'image', 'description', 'price', 'quantity', 'discount', 'status', 'categorey_id', 'brand_id'];

    public function categorey()
    {
        return $this->belongsTo(categorey::class);
    }

    public function brand()
    {
        return $this->belongsTo(brand::class);
    }
}
