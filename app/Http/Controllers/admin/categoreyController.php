<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\categoreyRequest;
use App\Services\categoreyServices;


class categoreyController extends Controller
{
    use apiResponse;

    private $categoreyServices;

    public function __construct(categoreyServices $categoreyServices)
    {
        $this->categoreyServices = $categoreyServices;
    }

    public function index(){
        $allCategories=$this->categoreyServices->getAllCategorey();
        return $this->apiResponse($allCategories,'All Categorey Fethched Successfully');
    }

    public function store(categoreyRequest $request){
        $fields=$request->validated();
        if($fields){
            $categorey=$this->categoreyServices->storeCategorey($fields);
            return $this->apiResponse($categorey,'Categorey Created Successfully');
        }
        return $this->sendError('Categorey Not Created');
    }

    public function show($id){
        $categorey=$this->categoreyServices->showCategorey($id);
        return $this->apiResponse($categorey,'Categorey Fetched Successfully');
    }

    public function update(categoreyRequest $request,$id){
        $fields=$request->validated();
        if($fields){
            $categorey=$this->categoreyServices->updateCategorey($fields,$id);
            return $this->apiResponse($categorey,'Categorey Updated Successfully');
        }
        return $this->sendError('Categorey Not Updated');
    }
    public function destroy($id){
        $categorey=$this->categoreyServices->deleteCategorey($id);
        return $this->apiResponse($categorey,'Categorey Deleted Successfully');
    }

    public function products($id){
        $categorey=$this->categoreyServices->products($id);
        if(!$categorey){
            return $this->sendError('Categorey Not Found');
        }
        return $this->apiResponse($categorey,'Categorey with products Fetched Successfully');
    }
}
