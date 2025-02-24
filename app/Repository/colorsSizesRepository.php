<?php

namespace App\Repository;

use App\Interfaces\colorSizesInterface;
use App\Models\productColors;
use App\Models\ProductColorSizes;
use App\Models\products;
use App\Models\productSizes;

class ColorsSizesRepository implements colorSizesInterface
{

    public function addColors($data)
    {
        return productColors::create($data);
    }

    public function addSizes($data)
    {
        return productSizes::create($data);
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
