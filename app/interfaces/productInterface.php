<?php

namespace App\Interfaces;

interface productInterface {
    public function all();
    public function show($id);
    public function store($data);
    public function storeStock($product_id,$quantity);
    public function update($data, $id);
    public function updateStock($id, $data);
    public function destroy($id);
    public function storeProductColorsSizes($data,$color_id,$size_id);
}
