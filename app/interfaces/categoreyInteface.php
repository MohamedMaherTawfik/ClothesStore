<?php

namespace App\Interfaces;

interface CategoreyInteface{
    // function with thier return type
    public function all();
    public function store($data);
    public function show($id);
    public function update($data, $id);
    public function destroy($id);
    public function products($id);
}
