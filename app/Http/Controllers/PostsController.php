<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeletePostRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Services\PostsService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class PostsController extends Controller
{

    protected PostsService $postsService;
    public function __construct(PostsService $postsService)
    {
        $this->postsService = $postsService;
    }

    public function store(StorePostRequest $request) : JsonResponse
    {
        $this->postsService->storePost($request->all());

        return response()->json([
            'message' => 'Post is successfully stored!'
        ], Response::HTTP_CREATED);
    }

    public function update(UpdatePostRequest $request) : JsonResponse
    {
        $this->postsService->updatePost($request->all());

        return response()->json([
            'message' => 'Post is successfully updated!'
        ], Response::HTTP_OK);
    }

    public function destroy(DeletePostRequest $request) : JsonResponse
    {
        $this->postsService->deletePost($request->get('id'));

        return response()->json([
            'message' => 'Post is successfully deleted!'
        ], Response::HTTP_OK);
    }

}
