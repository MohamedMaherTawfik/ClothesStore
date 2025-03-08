<?php

namespace App\Repository;

use App\Events\NewDataEvent;
use App\Interfaces\CategoreyInteface;
use App\Models\categorey;
use Illuminate\Support\Facades\Event;

class categoreyRepository implements CategoreyInteface
{
    public function all()
    {
        return categorey::all();
    }

    public function store($data)
    {
        $brand = categorey::create($data);
        Event::dispatch(new NewDataEvent($brand));
        return $brand;
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
