<?php

namespace App\Interfaces;

interface colorSizesInterface{
    public function addColors($data,$id);
    public function addSizes($data,$id);
    public function showProductColors(int $id);
    public function showProductSizes(int $id);
    public function ShowProductColorsSizes(int $id);
}
