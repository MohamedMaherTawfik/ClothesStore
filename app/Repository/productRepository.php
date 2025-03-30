<?php

namespace App\Repository;


use App\Events\NewDataEvent;
use App\Interfaces\productInterface;
use App\Models\ProductColorSizes;
use App\Models\products;
use App\Models\stocks;
use Illuminate\Support\Facades\Event;

class productRepository implements productInterface
{
    public function all()
    {
        return products::latest()->take(10)->get();
    }

    public function store($data)
    {
        $product = products::create($data);
        Event::dispatch(new NewDataEvent($product));
        return $product;
    }

    public function storeStock($data)
    {
        return stocks::create($data);
    }
    public function show($id)
    {
        $data= products::with([
            'colors:id,color',
            'sizes:id,size',
            'stock',
        ])->find($id);

        // $data->colors->each(function ($color) {
        //     $color->makeHidden('pivot');
        //     $color->makeHidden('id');
        // });

        // $data->sizes->each(function ($size) {
        //     $size->makeHidden('pivot');
        //     $size->makeHidden('id');
        // });

        // $data->stock->each(function ($stock) {
        //     $stock->makeHidden('id');
        //     $stock->makeHidden('products_id');
        //     $stock->makeHidden('created_at');
        // });

        return $data;
    }

    public function update($id, $data)
    {
        $product = products::find($id);
        $product->update($data);
        return $product;
    }

    public function updateStock($id, $data)
    {
       $stock= stocks::where('products_id', $id)->first();
       $stock->update($data);
       return $stock;
    }

    public function destroy($id)
    {
        $product = products::find($id);
        $product->delete();
        return $product;
    }

    public function storeProductColorsSizes($data,$color_id,$size_id)
    {
        return ProductColorSizes::create([
            'products_id' => $data,
            'product_colors_id' => $color_id,
            'product_sizes_id' => $size_id,
        ]);
    }

}

