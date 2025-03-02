<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orderdetails extends Model
{
    protected $table='orderdetails';
    protected $fillable=[
        'orders_id',
        'products_id',
        'quantity',
        'total_price'
    ];

    public function product(){
        return $this->belongsTo(Products::class,'products_id');
    }

    public function order(){
        return $this->belongsTo(orders::class,'orders_id');
    }
}
