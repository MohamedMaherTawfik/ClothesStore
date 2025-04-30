<?php

namespace App\Http\Controllers\web\home;

use App\Http\Controllers\Controller;
use App\Services\brandServices;
use App\Services\categoreyServices;
use App\Services\productServices;

class indexController extends Controller
{
    private $brandServices;
    private $categoreyServices;
    private $productServices;
    public function __construct(brandServices $brandServices, categoreyServices $categoreyServices, productServices $productServices)
    {
        $this->brandServices = $brandServices;
        $this->categoreyServices = $categoreyServices;
        $this->productServices = $productServices;
    }
    public function index()
    {
        $brands = $this->brandServices->getBrands();
        $categories = $this->categoreyServices->getAllCategorey();
        $products = $this->productServices->allProducts();
        return view('home.home', compact('brands', 'categories', 'products'));
    }

    public function showCategorey()
    {
        $categorey = $this->categoreyServices->showCategorey(request('id'));
        return view('home.findCategorey', compact('categorey',));
    }

    public function about_us()
    {
        return view('home.about_us');
    }
}
