<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class productImages extends Model
{
    protected $table = 'product_images';
    protected $guarded=[];

    public function product(){
        return $this->belongsTo(products::class);
    }

}
