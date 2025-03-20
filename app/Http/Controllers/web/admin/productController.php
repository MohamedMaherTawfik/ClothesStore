<?php

namespace App\Http\Controllers\web\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\productRequest;
use App\Services\productServices;
use Illuminate\Http\Request;

class productController extends Controller
{
    private $productServices;

    public function __construct(productServices $productServices){
        $this->productServices = $productServices;
    }

    public function index(){
        $products=$this->productServices->allProducts();
        return view('admin.product.index',compact('products'));
    }

    public function create(){
        return view('admin.product.create');
    }

    public function store(productRequest $request){
        $fields=$request->validated();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $name=time().'.'.$file->getClientOriginalName();
            $file->move(public_path('products'),$name);
            $fields['image']=$name;
        }
        $products=$this->productServices->createProduct($fields, null, null);
        return redirect()->route('product')->with('success',__('messages.store_Message'))->with('products',$products);
    }

    public function edit(){
        $product=$this->productServices->showProduct(request('id'));
        return view('admin.product.edit',compact('product'));
    }

    public function update(productRequest $request){
        $fields=$request->validated();
        if($request->hasFile('image')){
            $file=$request->file('image');
            $name=time().'.'.$file->getClientOriginalName();
            $file->move(public_path('products'),$name);
            $fields['image']=$name;
        }
        $products=$this->productServices->updateProduct($fields, request('id'));
        return redirect()->route('product')->with('success',__('messages.update_Message'))->with('products',$products);
    }

    public function destroy(){
        $products=$this->productServices->deleteProduct(request('id'));
        return redirect()->route('product')->with('success',__('messages.delete_Message'))->with('products',$products);
    }

}
