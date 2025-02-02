<?php

namespace App\Services;

use App\Interfaces\productInterface;

class productServices
{
    private $productRepository;
    public function __construct(productInterface $productInterface)
    {
        $this->productInterface = $productInterface;
    }

    public function allProducts()
    {
        $products=$this->productRepository->all();
        return $products;
    }

    public function createProduct($data)
    {
        $product=$this->productRepository->store($data);
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

    public function deleteProduct($id)
    {
        $product=$this->productRepository->delete($id);
        return $product;
    }

    public function colors($id)
    {
        $colors=$this->productRepository->colors($id);
        return $colors;
    }

    public function sizes($id)
    {
        $sizes=$this->productRepository->sizes($id);
        return $sizes;
    }

    public function ColorsSizes($id){
        $colorsSizes=$this->productRepository->ColorsSizes($id);
        return $colorsSizes;
    }

}
