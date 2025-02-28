<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class stocks extends Model
{
    protected $table = 'stocks';
    protected $fillable = ['products_id','quantity'];

    public function product(){
        return $this->hasOne(Products::class,'products_id');
    }
}
