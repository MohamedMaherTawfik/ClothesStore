<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categorey extends Model
{
    protected $table='categoreys';
    protected $fillable=['name','image'];

    public function products()
    {
        return $this->hasMany(products::class);
    }
}
