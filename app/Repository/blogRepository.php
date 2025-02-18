<?php

namespace App\Repository;

use App\Models\blogs;
use App\Interfaces\blogInterface;
use Illuminate\Support\Facades\Auth;

class blogRepository implements blogInterface{
    public function getBlogs(){
        return blogs::all();
    }

    public function getBlog($id){
        return blogs::find($id);
    }

    public function createBlog($data){
        return blogs::create([
            'user_id' => Auth::user()->id,
            'blog'=>$data['blog'],
        ]);
    }

    public function updateBlog($id, $data){
        return blogs::where('id', $id)->update($data);
    }

    public function deleteBlog($id){
        return blogs::where('id', $id)->delete();
    }

    public function userBlogs($id){
        return blogs::with('user')->where('user_id', $id)->get();
    }
}
