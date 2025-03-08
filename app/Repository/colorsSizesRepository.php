<?php

namespace App\Repository;

use App\Events\NewDataEvent;
use App\Interfaces\colorSizesInterface;
use App\Models\productColors;
use App\Models\ProductColorSizes;
use App\Models\products;
use App\Models\productSizes;
use Illuminate\Support\Facades\Event;

class ColorsSizesRepository implements colorSizesInterface
{

    public function addColors($data)
    {
        $color = productColors::create($data);
        Event::dispatch(new NewDataEvent($color));
        return $color;
    }

    public function addSizes($data)
    {
        $size= productSizes::create($data);
        Event::dispatch(new NewDataEvent($size));
        return $size;
    }

    public function allColors()
    {
        return productColors::all();
    }

    public function allSizes()
    {
        return productSizes::all();
    }

}
