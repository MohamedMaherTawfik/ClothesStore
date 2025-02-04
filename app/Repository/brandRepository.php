<?php

namespace App\Repository;

use App\Interfaces\brandInterface;
use App\Models\brand;

class brandRepository implements brandInterface
{
    public function all()
    {
        return brand::all();
    }

    public function show($id)
    {
        return brand::find($id);
    }

    public function store($data)
    {
        return brand::create($data);
    }

    public function update($data, $id)
    {
        $brand = brand::find($id);
        $brand->update($data);
        return $brand;
    }

    public function destroy($id)
    {
        $brand = brand::find($id);
        $brand->delete();
        return $brand;
    }

    public function products($id)
    {
        return brand::with('products')->find($id);
    }
}
