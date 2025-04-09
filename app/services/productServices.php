<?php

namespace App\Services;

use App\Interfaces\productInterface;
use App\Models\brand;
use App\Models\categorey;
use Illuminate\Support\Arr;
class productServices
{
    private $productRepository;
    private $stockRepository;
    public function __construct(productInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function allProducts()
    {
        $products=$this->productRepository->all();
        return $products;
    }

    public function createProduct($data, $colors, $sizes)
    {
        $product = $this->productRepository->store(
            Arr::except($data, ['image', 'quantity'])
        );
        // $this->productRepository->storeProductColorsSizes($product->id, $colors, $sizes);
        // foreach($colors as $key => $color ){

        //         if(!isset($sizes[$key]) || $sizes[$key]==null){
        //             $this->productRepository->storeProductColorsSizes($product->id, $color->id, rand(1,count($sizes)));
        //         }
        //         else if($size=$sizes[$key]){
        //         $this->productRepository->storeProductColorsSizes($product->id, $color->id, $size->id);
        //     }
        // }
        // dd($product);
        $this->productRepository->storeImage($product->id, $data['image']);
        $this->productRepository->storeStock($product->id, $data['quantity']);
        return $product;
    }

    public function showProduct($id)
    {
        $product=$this->productRepository->show($id);
        return $product;
    }

    public function updateProduct($id, $data)
    {
        $product=$this->productRepository->update($id, $data);
        return $product;
    }

    public function updateProductStock($id, $data)
    {
        $product=$this->productRepository->updateStock($id, $data);
        return $product;
    }
    public function deleteProduct($id)
    {
        $product=$this->productRepository->destroy($id);
        return $product;
    }


}
