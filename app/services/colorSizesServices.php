<?php

namespace App\services;

use App\Interfaces\colorSizesInterface;
use App\Models\productColors;
use App\Models\productSizes;

class colorSizesServices
{
    private $colorSizesRepository;
    public function __construct(colorSizesInterface $colorSizesRepository)
    {
        $this->colorSizesRepository = $colorSizesRepository;
    }

    public function getSizes($id){
        $data= $this->colorSizesRepository->showProductSizes($id);
        return $data;
    }

    public function getColors($id){
        $data= $this->colorSizesRepository->showProductColors($id);
        return $data;
    }

    public function getColorSizes($id){
        $data= $this->colorSizesRepository->ShowProductColorsSizes($id);
        return $data;
    }

    public function addColors($data){
        $addColor= $this->colorSizesRepository->addColors($data);
        return $addColor;
    }

    public function addSizes($data){
        $addSize= $this->colorSizesRepository->addSizes($data);
        return $addSize;
    }


}
