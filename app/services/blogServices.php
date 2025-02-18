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

    public function store($data) {
        return $this->blogRepository->createBlog($data);
    }

    public function update($id, $data) {
        return $this->blogRepository->updateBlog($id, $data);
    }

    public function destroy($id) {
        return $this->blogRepository->deleteBlog($id);
    }

    public function userBlogs($id) {
        return $this->blogRepository->userBlogs($id);
    }
}
