<?php

namespace App\Services;

use App\Interfaces\productInterface;
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
        $product=$this->productRepository->store($data);
        foreach($colors as $key => $color ){

                if(!isset($sizes[$key]) || $sizes[$key]==null){
                    $this->productRepository->storeProductColorsSizes($product->id, $color->id, rand(1,count($sizes)));
                }
                else if($size=$sizes[$key]){
                $this->productRepository->storeProductColorsSizes($product->id, $color->id, $size->id);
            }
        }
        $this->productRepository->storeStock([
            'products_id'=>$product->id,
            'quantity'=>$data['quantity']
        ]);
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
