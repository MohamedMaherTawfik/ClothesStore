<?php

namespace App\Interfaces;

interface blogInterface{
    public function getBlogs();
    public function getBlog($id);
    public function createBlog($id,$data);
    public function updateBlog($id, $data);
    public function deleteBlog($id);
    public function userBlogs($id);
    public function productBlogs($id);
}
