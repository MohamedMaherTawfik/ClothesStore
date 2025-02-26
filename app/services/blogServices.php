<?php

namespace App\Services;

use App\Interfaces\blogInterface;
use App\Repository\blogRepository;

class  blogServices {
    private $blogRepository;

    public function __construct(blogInterface $blogRepository) {
        $this->blogRepository = $blogRepository;
    }

    public function index() {
        return $this->blogRepository->getBlogs();
    }

    public function show($id) {
        return $this->blogRepository->getBlog($id);
    }

    public function store($id,$data) {
        return $this->blogRepository->createBlog($id,$data);
    }

    public function update($id, $data) {
        $data= $this->blogRepository->updateBlog($id, $data);
        return $data;
    }

    public function destroy($id) {
        return $this->blogRepository->deleteBlog($id);
    }

    public function userBlogs($id) {
        return $this->blogRepository->userBlogs($id);
    }

    public function productBlogs($id) {
        return $this->blogRepository->productBlogs($id);
    }
}
