<?php

namespace App\Services;

use App\Models\Posts;
use App\Repositories\PostsRepository;
use Illuminate\Support\Facades\Redis;

class PostsService
{

    protected PostsRepository $postsRepository;
    protected RedisService $redisService;

    public function __construct(PostsRepository $postsRepository, RedisService $redisService)
    {
        $this->postsRepository = $postsRepository;
        $this->redisService = $redisService;
    }

    public function storePost(array $request) : Posts
    {
        $post = $this->postsRepository->create($request);
        $this->redisService->storeInQueue($request, RedisService::POST_CREATED);

        return $this->postsRepository->create($request);
    }

    public function updatePost(array $request) : bool
    {
        $this->redisService->storeInQueue($request, RedisService::POST_UPDATED);
        return $this->postsRepository->update($request);
    }

    public function deletePost(int $id) : bool
    {
        $this->redisService->storeInQueue(['id' => $id], RedisService::POST_DELETED);

        return $this->postsRepository->destroy($id);
    }

}
