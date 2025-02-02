<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\productRequest;
use App\Services\productServices;
use Illuminate\Http\Request;

class productController extends Controller
{
    use apiResponse;
    private $productServices;

    public function __construct(productServices $productServices){
        $this->productServices = $productServices;
    }

    public function index(){
        return $this->productServices->allProducts();
    }

    public function store(productRequest $request){
        $fields=$request->validated();
        $data=$this->productServices->createProduct($fields);
        if(!$data){
            return $this->sendError('Product Not Created');
        }
        return $this->apiResponse($data,'Product Created Successfully');
    }

    public function show($id){
        $data=$this->productServices->showProduct($id);
        if(!$data){
            return $this->sendError('Product Not Found');
        }
        return $this->apiResponse($data,'Product Found Successfully');
    }

    public function update(productRequest $request, $id){
        $fields=$request->validated();
        $data=$this->productServices->updateProduct($id, $fields);
        if(!$data){
            return $this->sendError('Product Not Updated');
        }
        return $this->apiResponse($data,'Product Updated Successfully');
    }

    public function destroy($id){
        $data=$this->productServices->deleteProduct($id);
        if(!$data){
            return $this->sendError('Product Not Deleted');
        }
        return $this->apiResponse($data,'Product Deleted Successfully');
    }

    public function colors($id){
        $data=$this->productServices->colors($id);
        if(!$data){
            return $this->sendError('Colors Not Found');
        }
        return $this->apiResponse($data,'Product With Colors Found Successfully');
    }

    public function sizes($id){
        $data=$this->productServices->sizes($id);
        if(!$data){
            return $this->sendError('Sizes Not Found');
        }
        return $this->apiResponse($data,'Product With Sizes Found Successfully');
    }

    public function ColorsSizes($id){
        $data=$this->productServices->ColorsSizes($id);
        if(!$data){
            return $this->sendError('ColorsSizes Not Found');
        }
        return $this->apiResponse($data,'Product With ColorsSizes Found Successfully');
    }
}
