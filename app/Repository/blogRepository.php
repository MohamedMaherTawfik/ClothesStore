<?php

namespace App\Repository;

use App\Models\blogs;
use App\Interfaces\blogInterface;
use App\Models\products;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class blogRepository implements blogInterface{
    public function getBlogs(){
        return blogs::all();
    }

    public function getBlog($id){
        return blogs::find($id);
    }

    public function createBlog($id,$data){
        $data= blogs::create([
            'user_id' => Auth::user()->id,
            'blog'=>$data['blog'],
            'products_id'=>$id
        ]);
        if(!$data) return false;
        return $data;
    }

    public function updateBlog($id, $data){
        $updated = blogs::find($id);
        $updated->update($data);
        if(!$updated) return false;
        return $updated;
    }

    public function deleteBlog($id){
        $delete = blogs::find($id);
        $delete->delete();
        if(!$delete) return false;
        return $delete;
    }

    public function userBlogs($id){
        return User::with('blogs')->find($id);
    }

    public function productBlogs($id){
        return products::with('blog')->find($id);

    }
}
