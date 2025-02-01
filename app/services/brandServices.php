<?php

namespace App\Services;

use App\Interfaces\brandInterface;

class brandServices
{
    private $brandRepository;
    public function __construct(brandInterface $brandInterface)
    {
        $this->brandRepository = $brandInterface;
    }

    public function getBrands()
    {
        $allBrands=$this->brandRepository->all();
        return $allBrands;
    }

    public function storeBrand($data){
        $brand=$this->brandRepository->store($data);
        return $brand;
    }

    public function showBrand($id){
        $brand=$this->brandRepository->show($id);
        return $brand;
    }

    public function updateBrand($data,$id){
        $brand=$this->brandRepository->update($data,$id);
        return $brand;
    }

    public function deleteBrand($id){
        $brand=$this->brandRepository->destroy($id);
        return $brand;
    }
}
