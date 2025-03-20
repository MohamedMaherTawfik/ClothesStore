<?php

namespace App\Http\Controllers\web\home;

use App\Http\Controllers\Controller;
use App\Services\brandServices;
use Illuminate\Http\Request;

class indexController extends Controller
{
    private $brandServices;
    public function __construct(brandServices $brandServices){
        $this->brandServices=$brandServices;
    }
    public function index(){
        $brands=$this->brandServices->getBrands();
        return view('admin.index',compact('brands'));
    }
}
