<?php

namespace App\Http\Controllers\web\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\brandRequest;
use App\Services\brandServices;

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

    public function store(brandRequest $request){
        $fields=$request->validated();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $name=time().'.'.$file->getClientOriginalName();
            $file->move(public_path('brand'),$name);
            $fields['image']=$name;
        }
        $brand=$this->brandServices->storeBrand($fields);
        return redirect()->route('brand')->with('success',__('messages.store_Message'))->with('brand',$brand);
    }
    public function edit(){
        $brand=$this->brandServices->showBrand(request('id'));
        return view('admin.brand.edit')->with('brand',$brand);
    }

    public function update(brandRequest $request){
        $fields=$request->validated();
        $brand=$this->brandServices->updateBrand($fields,request('id'));
        if($request->hasFile('image')){
            $file=$request->file('image');
            $name=time().'.'.$file->getClientOriginalName();
            $file->move(public_path('brand'),$name);
            $fields['image']=$name;
        }
        return redirect()->route('brand')->with('success',__('messages.update_Message'))->with('brand',$brand);
    }

    public function delete(){
        $brand=$this->brandServices->deleteBrand(request('id'));
        return redirect()->route('brand')->with('success',__('messages.destroy_Message'))->with('brand',$brand);
    }
}
