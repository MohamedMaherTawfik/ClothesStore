<?php

namespace App\Interfaces;

interface brandInterface
{
    public function all();
    public function store($data);
    public function show($id);
    public function update($data, $id);
    public function destroy($id);
}

