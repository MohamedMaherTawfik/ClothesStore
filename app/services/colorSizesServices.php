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

    public function addColors($data){
        $addColor= $this->colorSizesRepository->addColors($data);
        return $addColor;
    }

    public function addSizes($data){
        $addSize= $this->colorSizesRepository->addSizes($data);
        return $addSize;
    }

    public function allColors(){
        $allColors= $this->colorSizesRepository->allColors();
        return $allColors;
    }

    public function allSizes(){
        $allSizes= $this->colorSizesRepository->allSizes();
        return $allSizes;
    }

}
