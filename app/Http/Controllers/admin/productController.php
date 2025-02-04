<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\colorRequest;
use App\Http\Requests\productRequest;
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

    public function colorSizes($id){
        $data=$this->colorSizes->getColorSizes($id);
        if(!$data){
            return $this->sendError('Sizes Not Found');
        }
        return $this->apiResponse($data,'Sizes Fetched Successfully');
    }

    public function sizes($id){
        $data=$this->colorSizes->getSizes($id);
        if(!$data){
            return $this->sendError('Sizes Not Found');
        }
        return $this->apiResponse($data,'Sizes Fetched Successfully');
    }

    public function colors($id){
        $data=$this->colorSizes->getColors($id);
        if(!$data){
            return $this->sendError('Colors Not Found');
        }
        return $this->apiResponse($data,'Colors Fetched Successfully');
    }

    public function addColors(colorRequest $request){
        $fields=$request->validated();
        $data=$this->colorSizes->addColors($fields);
        if(!$data){
            return $this->sendError('Colors Not Added');
        }
        return $this->apiResponse($data,'Colors Added Successfully');
    }

    public function addSizes(colorRequest $request){
        $fields=$request->validated();
        $data=$this->colorSizes->addSizes($fields);
        if(!$data){
            return $this->sendError('Sizes Not Added');
        }
        return $this->apiResponse($data,'Sizes Added Successfully');
    }
}
