<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\colorRequest;
use App\Http\Requests\sizeRequest;
use App\Interfaces\colorSizesInterface;
class colorSizesController extends Controller
{
    use apiResponse;
    private $colorSizesRepository;

    public function __construct(colorSizesInterface $colorSizesRepository)
    {
        $this->colorSizesRepository = $colorSizesRepository;
    }

    public function addColor(colorRequest $request){
        $fields=$request->validated();
        if($fields){
            $addColor= $this->colorSizesRepository->addColors($fields);
            return $this->apiResponse($addColor,'Color Created Successfully');
        }
        return $this->sendError('Color Not Created');
    }

    public function addSize(sizeRequest $request){
        $fields=$request->validated();
        if($fields){
            $addSize= $this->colorSizesRepository->addSizes($fields);
            return $this->apiResponse($addSize,'Size Created Successfully');
        }
        return $this->sendError('Size Not Created');
    }

    public function getAllColors(){
        $data=$this->colorSizesRepository->allColors(request('id'));
        if(!$data){
            return $this->sendError('Colors Not Found');
        }
        return $this->apiResponse($data,'Colors Fetched Successfully');
    }

    public function getAllSizes(){
        $data=$this->colorSizesRepository->allSizes(request('id'));
        if(!$data){
            return $this->sendError('Sizes Not Found');
        }
        return $this->apiResponse($data,'Sizes Fetched Successfully');
    }
}
