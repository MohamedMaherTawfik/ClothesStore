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
        if($data){
            if($request->hasFile('image')){
                $file=$request->file('image');
                $name=time().'.'.$file->getClientOriginalName();
                $file->move(public_path('brand'),$name);
                $data['image']=$name;
            }
            $brand=$this->brandServices->storeBrand($data);
            return $this->apiResponse($brand,'Brand Created Successfully');
        }
        return $this->sendError('Brand Not Created');
    }

    public function show($id){
        $brand=$this->brandServices->showBrand($id);
        if(!$brand){
            return $this->sendError('Brand Not Found');
        }
        return $this->apiResponse($brand,'Brand Fetched Successfully');
    }

    public function update(brandRequest $request){
        $data=$request->validated();
        if($data){
            if($request->hasFile('image')){
                $file=$request->file('image');
                $name=time().'.'.$file->getClientOriginalName();
                $file->move(public_path('brand'),$name);
                $data['image']=$name;
            }
            $brand=$this->brandServices->updateBrand($data,$request->id);
            return $this->apiResponse($brand,'Brand Updated Successfully');
        }
        return $this->sendError('Brand Not Updated');

    }

    public function destroy($id){
        $brand=$this->brandServices->deleteBrand($id);
        if(!$brand){
            return $this->sendError('Brand Not Deleted');
        }
        return $this->apiResponse($brand,'Brand Deleted Successfully');
    }

    public function products($id){
        $brand=$this->brandServices->products($id);
        if(!$brand){
            return $this->sendError('Brand Not Found');
        }
        return $this->apiResponse($brand,'Brand Fetched Successfully');
    }

}
