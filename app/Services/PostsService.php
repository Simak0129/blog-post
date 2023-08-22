<?php

namespace App\Services;

use App\Repositories\PostsRepository;

class PostsService
{

    protected PostsRepository $postsRepository;

    public function __construct(PostsRepository $postsRepository)
    {
        $this->postsRepository = $postsRepository;
    }

    public function getDataById() {

    }

}
