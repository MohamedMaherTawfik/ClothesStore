<?php

namespace App\Http\Controllers\web\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\sizeRequest;
use App\services\colorSizesServices;
use Illuminate\Http\Request;

class sizeController extends Controller
{
    private $sizeServices;
    public function __construct(colorSizesServices $sizeServices)
    {
        $this->sizeServices = $sizeServices;
    }


    public function index()
    {
        $size=$this->sizeServices->allSizes();
        return view('admin.size.index',compact('size'));
    }

    public function create()
    {
        return view('admin.size.create');
    }

    public function store(sizeRequest $request)
    {
        $fields=$request->validated();
        $this->sizeServices->addSizes($fields);
        return redirect()->route('size');
    }
}
