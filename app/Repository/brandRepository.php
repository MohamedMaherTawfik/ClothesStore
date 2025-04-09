<?php

namespace App\Repository;

use App\Events\NewDataEvent;
use App\Interfaces\brandInterface;
use App\Models\brand;
use Illuminate\Support\Facades\Event;

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
        $brand = brand::create($data);
        // Event::dispatch(new NewDataEvent($brand));
        return $brand;
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
        if(!$brand) return false;
        $brand->delete();
        return $brand;
    }

    public function products($id)
    {
        return brand::with('products')->find($id);
    }
}
