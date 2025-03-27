<?php

namespace App\Http\Controllers\web\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\colorRequest;
use App\services\colorSizesServices;
use Illuminate\Http\Request;

class colorController extends Controller
{
    private $colorServices;
    public function __construct(colorSizesServices $colorServices)
    {
        $this->colorServices =$colorServices;
    }

    public function index(){
        $color = $this->colorServices->allColors();
        return view('admin.color.index',compact('color'));
    }

    public function create(){
        return view('admin.color.create');
    }

    public function store(colorRequest $request){
        $fields=$request->validated();
        $this->colorServices->addColors($fields);
        return redirect()->route('color');
    }
}
