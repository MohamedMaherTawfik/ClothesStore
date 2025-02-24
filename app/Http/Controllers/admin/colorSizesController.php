<?php

namespace App\Http\Controllers\admin;

use App;
use App\Http\Controllers\Controller;
use App\Http\Requests\colorRequest;
use App\Http\Requests\sizeRequest;
use App\Interfaces\colorSizesInterface;
use App\services\colorSizesServices;
class colorSizesController extends Controller
{
    use apiResponse;
    private $colorSizeServices;

    public function __construct(colorSizesServices $colorSizeServices)
    {
        $this->colorSizeServices = $colorSizeServices;
    }

    public function addColor(colorRequest $request){
        App::setLocale(request('lang'));
        $fields=$request->validated();
        if($fields){
            $addColor= $this->colorSizeServices->addColors($fields);
            return $this->apiResponse($addColor,__('messages.store_Message'));
        }
        return $this->sendError(__('messages.Error_store_Message'));
    }

    public function addSize(sizeRequest $request){
        App::setLocale(request('lang'));
        $fields=$request->validated();
        if($fields){
            $addSize= $this->colorSizeServices->addSizes($fields);
            return $this->apiResponse($addSize,__('messages.store_Message'));
        }
        return $this->sendError(__('messages.Error_store_Message'));
    }

    public function getAllColors(){
        App::setLocale(request('lang'));
        $data=$this->colorSizeServices->allColors();
        if(!$data){
            return $this->sendError(__('messages.Error_index_Message'));
        }
        return $this->apiResponse($data,__('messages.index_Message'));
    }

    public function getAllSizes(){
        App::setLocale(request('lang'));
        $data=$this->colorSizeServices->allSizes();
        if(!$data){
            return $this->sendError(__('messages.Error_index_Message'));
        }
        return $this->apiResponse($data,__('messages.index_Message'));
    }
}
