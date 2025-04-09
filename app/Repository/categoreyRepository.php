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
        // dd($data['image']['originalName']);
        $categorey = categorey::create([
            'name' => $data['name'],
            'image' => $data['image'],
        ]);
        // Event::dispatch(new NewDataEvent($categorey));
        return $categorey;
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
        $categorey = categorey::findOrFail($id);
        $categorey->delete();
        return $categorey;
    }

    public function products($id)
    {
        return categorey::with('products')->find($id);
    }
}
