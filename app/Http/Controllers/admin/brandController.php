<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\brandRequest;
use App\Services\brandServices;
use Illuminate\Http\Request;

class brandController extends Controller
{
    use apiResponse;
    private $brandServices;
    public function __construct(brandServices $brandServices)
    {
        $this->brandServices = $brandServices;
    }

    public function index(){
        $allBrands=$this->brandServices->getBrands();
        return $this->apiResponse($allBrands,'All Brands Fethched Successfully');
    }

    public function store(brandRequest $request){
        $data=$request->validated();
        $brand=$this->brandServices->storeBrand($data);
        if(!$brand){
            return $this->sendError('Brand Not Created');
        }
        return $this->apiResponse($brand,'Brand Created Successfully');
    }

    public function show($id){
        $brand=$this->brandServices->showBrand($id);
        if(!$brand){
            return $this->sendError('Brand Not Found');
        }
        return $this->apiResponse($brand,'Brand Fetched Successfully');
    }

    public function update(brandRequest $request,$id){
        $data=$request->validated();
        $brand=$this->brandServices->updateBrand($data,$id);
        if(!$brand){
            return $this->sendError('Brand Not Updated');
        }
        return $this->apiResponse($brand,'Brand Updated Successfully');
    }

    public function destroy($id){
        $brand=$this->brandServices->deleteBrand($id);
        if(!$brand){
            return $this->sendError('Brand Not Deleted');
        }
        return $this->apiResponse($brand,'Brand Deleted Successfully');
    }

}
