<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userAddresses extends Model
{
    protected $table='user_addresses';
    protected $fillabl=['user_id','address','city','postal_code'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
