<?php

namespace App\Interfaces;

use App\Models\brand;

interface brandInterface
{
    public function all();
    public function store($data);
    public function show($id);
    public function update($data, $id);
    public function destroy($id);
    public function products($id);
}

