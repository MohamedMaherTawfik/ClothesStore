<?php

namespace App\Http\Controllers\web\admin;

use App\Http\Controllers\Controller;
use App\Services\brandServices;
use Illuminate\Http\Request;

class brandController extends Controller
{
    private $brandServices;

    public function __construct(brandServices $brandServices){
        $this->brandServices=$brandServices;
    }
    public function index(){
        $brands=$this->brandServices->getBrands();
        return view('admin.brand.index',compact('brands'));
    }

    public function create(){
        return view('admin.brand.create');
    }

    public function edit(){
        return view('admin.brand.edit');
    }

    public function delete(){
        return view('admin.brand.delete');
    }
}
