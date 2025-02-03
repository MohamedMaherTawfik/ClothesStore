<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    protected $table = 'orders';
    protected $fillable = [
        'user_id',
        'total_price',
        'status',
        'discount',
        'total_quantity',
        'taxes',
        'coupon_code',
        'notes',
        'carrier',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function orderDetails(){
        return $this->hasMany(orderdetails::class);
    }
}
