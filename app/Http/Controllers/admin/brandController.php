<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\brandRequest;
use App\Services\brandServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class brandController extends Controller
{
    use apiResponse;
    private $brandServices;
    public function __construct(brandServices $brandServices)
    {
        $this->brandServices = $brandServices;
    }

    public function index(){
        App::setLocale(request('lang'));
        $allBrands=$this->brandServices->getBrands();
        if(count($allBrands ) == 0){
            return $this->sendError(__('messages.Error_index_Message'));
        }
        return $this->apiResponse($allBrands,__('messages.index_Message'));
    }

    public function store(brandRequest $request){
        App::setLocale(request('lang'));
        $data=$request->validated();
        if($data){
            if($request->hasFile('image')){
                $file=$request->file('image');
                $name=time().'.'.$file->getClientOriginalName();
                $file->move(public_path('brand'),$name);
                $data['image']=$name;
            }
            $brand=$this->brandServices->storeBrand($data);
            return $this->apiResponse($brand,__("messages.store_Message"));
        }
        return $this->sendError(__("messages.Error_store_Message"));
    }

    public function show(){
        App::setLocale(request('lang'));
        $brand=$this->brandServices->showBrand(request('id'));
        if(!$brand){
            return $this->sendError(__("messages.Error_show_Message"));
        }
        return $this->apiResponse($brand,__("messages.show_Message"));
    }

    public function update(brandRequest $request){
        App::setLocale(request('lang'));
        $data=$request->validated();
        if($data){
            if($request->hasFile('image')){
                $file=$request->file('image');
                $name=time().'.'.$file->getClientOriginalName();
                $file->move(public_path('brand'),$name);
                $data['image']=$name;
            }
            $brand=$this->brandServices->updateBrand($data,$request->id);
            return $this->apiResponse($brand,__("messages.update_Message"));
        }
        return $this->sendError(__("messages.Error_update_Message"));

    }

    public function destroy(){
        App::setLocale(request('lang'));
        $brand=$this->brandServices->deleteBrand(request('id'));
        if(!$brand){
            return $this->sendError(__("messages.Error_destroy_Message"));
        }
        return $this->apiResponse($brand,__("messages.destroy_Message"));
    }

    public function products(){
        App::setLocale(request('lang'));
        $brand=$this->brandServices->products(request('id'));
        if(!$brand){
            return $this->sendError(__("messages.Error_with_products_Message"));
        }
        return $this->apiResponse($brand,__("messages.with_products_Message"));
    }

}
