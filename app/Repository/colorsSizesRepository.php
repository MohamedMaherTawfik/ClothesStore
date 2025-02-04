<?php

namespace App\Repository;

use App\Interfaces\colorSizesInterface;
use App\Models\productColors;
use App\Models\products;

class ColorsSizesRepository implements colorSizesInterface
{

    public function addColors($data)
    {
        $addColor=productColors::create([
            'products_id'=>$data['products_id'],
            'color'=>$data['color']
        ]);
        return $addColor;
    }

    public function addSizes($data)
    {
        $addSize=productColors::create([
            'products_id'=>$data['products_id'],
            'size'=>$data['size']
        ]);
        return $addSize;
    }
    public function showProductColors(int $id)
    {
        $colorSizes = products::with('colors')->get();
        return $colorSizes;
    }

    public function showProductSizes($id)
    {
        $colorSizes = products::with('sizes')->get();
        return $colorSizes;
    }

    public function ShowProductColorsSizes(int $id)
    {
        $colorSizes = products::with('colors', 'sizes')->get();
        return $colorSizes;
    }


}
