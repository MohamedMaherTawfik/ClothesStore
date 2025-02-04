<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class userAddress extends Model
{
    protected $table='user_addresses';
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
