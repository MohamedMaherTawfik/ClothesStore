<?php

namespace App\Http\Controllers\reviews;

use App\Http\Controllers\admin\apiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\blogRequest;
use App\Services\blogServices;
use Illuminate\Http\Request;

class blogConteroller extends Controller
{
    use apiResponse;
    private $blogServices;

    public function __construct(blogServices $blogServices)
    {
        $this->blogServices = $blogServices;
    }

    public function index()
    {
        $data= $this->blogServices->index();
        if($data){
            return $this->apiResponse($data,'Blogs Fetched Successfully');
        }
        return $this->sendError('Blogs Not Found');
    }


    public function show($id)
    {
        $data= $this->blogServices->show($id);
        if($data){
            return $this->apiResponse($data,'Blog Fetched Successfully');
        }
        return $this->sendError('Blog Not Found');
    }

    public function store(blogRequest $request)
    {
        $data=$request->validated();
        if(!$data){
            return $this->sendError('Blog Not Created');
        }
        $created= $this->blogServices->store($data);
        return $this->apiResponse($created,'Blog Created Successfully');
    }

    public function update(blogRequest $request)
    {
        $data=$request->validated();
        if(!$data){
            return $this->sendError('Blog Not Updated');
        }
        $created= $this->blogServices->update($request->id,$data);
        return $this->apiResponse($created,'Blog Updated Successfully');
    }

    public function destroy($id)
    {
        $data= $this->blogServices->destroy($id);
        if($data){
            return $this->apiResponse($data,'Blog Deleted Successfully');
        }
        return $this->sendError('Blog Not Deleted');
    }


}
