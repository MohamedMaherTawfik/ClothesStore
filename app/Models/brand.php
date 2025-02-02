<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    protected $table='brands';
    protected $fillable=['name','description','image'];

    public function products()
    {
        return $this->hasMany(products::class);
    }

}
