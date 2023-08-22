<?php

namespace App\Services;

use App\Repositories\BlogRepository;

class BlogService
{

    protected BlogRepository $blogRepository;


    public function __construct(BlogRepository $blogRepository)
    {
        $this->blogRepository = $blogRepository;
    }

    public function getDataById()
    {
        // @todo
    }

}
