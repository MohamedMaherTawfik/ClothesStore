<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\colorRequest;
use App\Http\Requests\productRequest;
use App\Http\Requests\sizeRequest;
use App\Models\productColors;
use App\Models\productSizes;
use App\services\colorSizesServices;
use App\Services\productServices;
use Illuminate\Http\Request;

class productController extends Controller
{
    use apiResponse;
    private $productServices;
    private $colorSizes;

    public function __construct(productServices $productServices, colorSizesServices $colorSizes){
        $this->productServices = $productServices;
        $this->colorSizes = $colorSizes;
    }

    public function index(){
        return $this->productServices->allProducts();
    }

    public function store(productRequest $request){
        $fields=$request->validated();
        if($fields){
            if($request->hasFile('image')){
                $file=$request->file('image');
                $name=time().'.'.$file->getClientOriginalName();
                $file->move(public_path('products'),$name);
                $fields['image']=$name;
            }
            $colors=productColors::all();
            $sizes=productSizes::all();
            $data=$this->productServices->createProduct($fields, $colors, $sizes);
            return $this->apiResponse($data->load('colors','sizes'),'Product Created Successfully');
        }
        return $this->sendError('Product Not Created');

    }

    public function show(){
        $data=$this->productServices->showProduct(request('id'));
        if(!$data){
            return $this->sendError('Product Not Found');
        }
        return $this->apiResponse($data,'Product Found Successfully');
    }

    public function update(productRequest $request, $id){
        $fields=$request->validated();
        if($fields){
            if($request->hasFile('image')){
                $file=$request->file('image');
                $name=time().'.'.$file->getClientOriginalName();
                $file->move(public_path('products'),$name);
                $fields['image']=$name;
            }
            $data=$this->productServices->updateProduct($id, $fields);
            return $this->apiResponse($data,'Product Updated Successfully');
        }
        return $this->sendError('Product Not Updated');


    }

    public function destroy($id){
        $data=$this->productServices->deleteProduct($id);
        if(!$data){
            return $this->sendError('Product Not Deleted');
        }
        return $this->apiResponse($data,'Product Deleted Successfully');
    }

    public function colorSizes($id){
        $data=$this->productServices->getColorSizes($id);
        if(!$data){
            return $this->sendError('Sizes Not Found');
        }
        return $this->apiResponse($data,'Sizes Fetched Successfully');
    }

    public function sizes(){
        $data=$this->productServices->getSizes(request('id'));
        if(!$data){
            return $this->sendError('Sizes Not Found');
        }
        return $this->apiResponse($data,'Sizes Fetched Successfully');
    }

    public function colors(){
        $data=$this->productServices->getColors(request('id'));
        if(!$data){
            return $this->sendError('Colors Not Found');
        }
        return $this->apiResponse($data,'Colors Fetched Successfully');
    }


}
