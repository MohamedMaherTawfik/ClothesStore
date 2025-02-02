<?php

namespace App\Services;

use App\Interfaces\CategoreyInteface;
use App\Models\categorey;

class categoreyServices{

    private $categoreyRepository;

    public function __construct(CategoreyInteface $categoreyRepository)
    {
        $this->categoreyRepository = $categoreyRepository;
    }

    public function getAllCategorey(){
        $allCategories=$this->categoreyRepository->all();
        return $allCategories;
    }

    public function storeCategorey($data){
        $categorey=$this->categoreyRepository->store($data);
        return $categorey;
    }

    public function showCategorey($id){
        $categorey=$this->categoreyRepository->show($id);
        return $categorey;
    }

    public function updateCategorey($data,$id){
        $categorey=$this->categoreyRepository->update($data,$id);
        return $categorey;
    }

    public function deleteCategorey($id){
        $categorey=$this->categoreyRepository->destroy($id);
        return $categorey;
    }

    public function products($id){
        $categorey=$this->categoreyRepository->products($id);
        return $categorey;
    }
}
