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

}
