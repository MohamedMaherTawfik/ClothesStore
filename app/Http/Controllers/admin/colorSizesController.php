<?php

namespace App\Http\Controllers\admin;

use App;
use App\Http\Controllers\Controller;
use App\Http\Requests\colorRequest;
use App\Http\Requests\sizeRequest;
use App\Interfaces\colorSizesInterface;
use App\services\colorSizesServices;
use Illuminate\Support\Facades\Auth;
class colorSizesController extends Controller
{
    use apiResponse;
    private $colorSizeServices;

    public function __construct(colorSizesServices $colorSizeServices)
    {
        $this->colorSizeServices = $colorSizeServices;
    }

    public function addColor(colorRequest $request){
        $fields=$request->validated();
        if($fields){
            $addColor= $this->colorSizeServices->addColors($fields);
            $emailsent="Email Has been sent To " .Auth::user()->email;
            return $this->apiResponse($addColor,__('messages.store_Message'),$emailsent);
        }
        return $this->sendError(__('messages.Error_store_Message'));
    }

    public function addSize(sizeRequest $request){
        $fields=$request->validated();
        if($fields){
            $addSize= $this->colorSizeServices->addSizes($fields);
            $emailsent="Email Has been sent To " .Auth::user()->email;
            return $this->apiResponse($addSize,__('messages.store_Message'),$emailsent);
        }
        return $this->sendError(__('messages.Error_store_Message'));
    }

    public function getAllColors(){
        $data=$this->colorSizeServices->allColors();
        if(!$data){
            return $this->sendError(__('messages.Error_index_Message'));
        }
        return $this->apiResponse($data,__('messages.index_Message'));
    }

    public function getAllSizes(){
        $data=$this->colorSizeServices->allSizes();
        if(!$data){
            return $this->sendError(__('messages.Error_index_Message'));
        }
        return $this->apiResponse($data,__('messages.index_Message'));
    }
}
