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
        'price'
    ];
}
