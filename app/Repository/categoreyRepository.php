<?php

namespace App\Repository;

use App\Interfaces\CategoreyInteface;
use App\Models\categorey;

class categoreyRepository implements CategoreyInteface
{
    public function all()
    {
        return categorey::all();
    }

    public function store($data)
    {
        return categorey::create($data);
    }

    public function show($id)
    {
        return categorey::find($id);
    }

    public function update($data, $id)
    {
        $categorey = categorey::find($id);
        $categorey->update($data);
        return $categorey;
    }

    public function destroy($id)
    {
        $categorey = categorey::find($id);
        $categorey->delete();
        return $categorey;
    }

    public function products($id)
    {
        return categorey::with('products')->find($id);
    }
}
