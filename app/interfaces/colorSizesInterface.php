<?php

namespace App\Interfaces;

interface colorSizesInterface{
    public function addColors($data);
    public function addSizes($data);
    public function allColors($id);
    public function allSizes($id);
}
