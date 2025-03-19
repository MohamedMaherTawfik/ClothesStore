<?php

namespace App\Http\Controllers\api\reviews;

use App\Http\Controllers\api\admin\apiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\blogRequest;
use App\Services\blogServices;
use App\Http\Resources\ReviewResource;
use Illuminate\Support\Facades\Auth;

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
            return $this->apiResponse($data,__('messages.index_Message'));
        }
        return $this->sendError(__('messages.Error_index_Message'));
    }


    public function show($id)
    {
        $data= $this->blogServices->show($id);
        if($data){
            return $this->apiResponse(new ReviewResource($data),__('messages.show_Message'));
        }
        return $this->sendError(__('messages.Error_show_Message'));
    }

    public function store(blogRequest $request)
    {
        $data=$request->validated();
        if(!$data){
            return $this->sendError(__("messages.Error_store_Message"));
        }
        $created= $this->blogServices->store(request('id'),$data);
        return $this->apiResponse($created,__("messages.store_Message"));
    }

    public function update(blogRequest $request)
    {
        $data=$request->validated();
        if(!$data){
            return $this->sendError(__("messages.Error_update_Message"));
        }
        $updated= $this->blogServices->update(request('id'),$data);
        return $this->apiResponse(new ReviewResource($updated),__("messages.update_Message"));
    }

    public function destroy()
    {
        $data= $this->blogServices->destroy(request('id'));
        if($data){
            return $this->apiResponse($data,__("messages.destroy_Message"));
        }
        return $this->sendError(__("messages.Error_destroy_Message"));
    }

    public function userBlogs()
    {
        $data= $this->blogServices->userBlogs(Auth::user()->id);
        if($data){
            return $this->apiResponse($data,__('messages.userBlogs'));
        }
        return $this->sendError(__('messages.Error_userBlogs'));
    }

    public function productBlogs()
    {
        $data= $this->blogServices->productBlogs(request('id'));
        if($data){
            return $this->apiResponse($data,__('messages.userBlogs'));
        }
        return $this->sendError(__('messages.Error_userBlogs'));
    }

}
