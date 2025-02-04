<?php

namespace App\Interfaces;

interface colorSizesInterface{
    public function addColors($data);
    public function addSizes($data);
    public function showProductColors(int $id);
    public function showProductSizes(int $id);
    public function ShowProductColorsSizes(int $id);
}
