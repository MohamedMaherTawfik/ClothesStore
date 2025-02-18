<?php

namespace App\Repository;

use App\Interfaces\colorSizesInterface;
use App\Models\productColors;
use App\Models\products;
use App\Models\productSizes;

class ColorsSizesRepository implements colorSizesInterface
{

    public function addColors($data,$id)
    {
        $addColor=productColors::create([
            'products_id'=>$id,
            'color'=>$data['color']
        ]);
        return $addColor;
    }

    public function addSizes($data,$id)
    {
        $addSize=productSizes::create([
            'products_id'=>$id,
            'size'=>$data['size']
        ]);
        return $addSize;
    }
    public function showProductColors(int $id)
    {
        $colorSizes = products::with('colors')->find($id);
        return $colorSizes;
    }

    public function showProductSizes($id)
    {
        $colorSizes = products::with('sizes')->find($id);
        return $colorSizes;
    }

    public function ShowProductColorsSizes(int $id)
    {
        $colorSizes = products::with('colors', 'sizes')->find($id);
        return $colorSizes;
    }


}
