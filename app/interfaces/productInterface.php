<?php

namespace App\Interfaces;

interface productInterface {
    public function all();
    public function show($id);
    public function store($data);
    public function storeStock($data);
    public function update($data, $id);
    public function updateStock($id, $data);
    public function destroy($id);
    public function storeProductColorsSizes($data,$color_id,$size_id);
    // public function showProductColors(int $id);
    // public function showProductSizes(int $id);
    // public function ShowProductColorsSizes(int $id);
}
