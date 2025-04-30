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
        $product = $this->productRepository->store($data);
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
