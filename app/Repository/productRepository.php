<?php

namespace App\Repository;


use App\Interfaces\productInterface;
use App\Models\products;

class productRepository implements productInterface
{
    public function all()
    {
        return products::all();
    }

    public function store($data)
    {
        return products::create($data);
    }

    public function show($id)
    {
        return products::find($id);
    }

    public function update($id, $data)
    {
        $product = products::find($id);
        $product->update($data);
        return $product;
    }

    public function destroy($id)
    {
        $product = products::find($id);
        $product->delete();
        return $product;
    }

    public function colors($id)
    {
        return products::with('colors')->find($id);
    }

    public function sizes($id)
    {
        return products::with('sizes')->find($id);
    }

    public function ColorsSizes($id)
    {
        return products::with('colors', 'sizes')->find($id);
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
