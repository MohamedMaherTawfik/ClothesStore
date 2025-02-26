<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\categoreyRequest;
use App\Http\Resources\CategoreyResoucres;
use App\Models\categorey;
use App\Services\categoreyServices;
use Illuminate\Support\Facades\App;


class categoreyController extends Controller
{
    use apiResponse;

    private $categoreyServices;

    public function __construct(categoreyServices $categoreyServices)
    {
        $this->categoreyServices = $categoreyServices;
    }

    public function index(){
        App::setLocale(request('lang'));
        $allCategories=$this->categoreyServices->getAllCategorey();
        if(count($allCategories ) == 0){
            return $this->sendError(__('messages.Error_index_Message'));
        }
        return $this->apiResponse($allCategories,__('messages.index_Message'));
    }

    public function store(categoreyRequest $request){
        App::setLocale(request('lang'));
        $fields=$request->validated();
        if($fields){
            if($request->hasFile('image')){
                $file=$request->file('image');
                $name=time().'.'.$file->getClientOriginalName();
                $file->move(public_path('categorey'),$name);
                $fields['image']=$name;
            }
            $categorey=$this->categoreyServices->storeCategorey($fields);
            return $this->apiResponse($categorey,__('messages.store_Message'));
        }
        return $this->sendError(__('messages.Error_store_Message'));

    }

    public function show(){
        App::setLocale(request('lang'));
        $categorey=$this->categoreyServices->showCategorey(request('id'));
        if(!$categorey){
            return $this->sendError(__('messages.Error_show_Message'));
        }
        return $this->apiResponse($categorey,__('messages.show_Message'));
    }

    public function update(categoreyRequest $request){
        App::setLocale(request('lang'));
        $fields=$request->validated();
        if($fields){
            if($request->hasFile('image')){
                $file=$request->file('image');
                $name=time().'.'.$file->getClientOriginalName();
                $file->move(public_path('categorey'),$name);
                $fields['image']=$name;
            }
            $categorey=$this->categoreyServices->updateCategorey($fields,request('id'));
            return $this->apiResponse(new CategoreyResoucres($categorey),__("messages.update_Message"));
        }
        return $this->sendError(__("messages.Error_update_Message"));
    }
    public function destroy(){
        App::setLocale(request('lang'));
        $categorey=$this->categoreyServices->deleteCategorey(request('id'));
        if(!$categorey){
            return $this->sendError(__("messages.Error_destroy_Message"));
        }
        return $this->apiResponse(new CategoreyResoucres($categorey),__("messages.destroy_Message"));
    }

    public function products(){
        App::setLocale(request('lang'));
        $categorey=$this->categoreyServices->products(request('id'));
        if(!$categorey){
            return $this->sendError(__("messages.Error_with_products_Message"));
        }
        return $this->apiResponse($categorey,__("messages.with_products_Message"));
    }
}
