<?php

namespace App\Services;

use App\Models\Posts;
use App\Repositories\PostsRepository;
use Illuminate\Database\Eloquent\Model;

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
        $this->redisService->storeInQueue($post, RedisService::POST_CREATED);

        return $post;
    }

    public function updatePost(array $request) : Model
    {
        $post = $this->postsRepository->update($request);
        $this->redisService->storeInQueue($post, RedisService::POST_UPDATED);

        return $post;
    }

    public function deletePost(int $id) : Model
    {
        $post = $this->postsRepository->destroy($id);
        $this->redisService->storeInQueue($post, RedisService::POST_DELETED);

        return $post;
    }

}
