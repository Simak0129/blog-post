<?php

namespace App\Repositories;

use App\Models\Posts;
use Illuminate\Database\Eloquent\Model;

class PostsRepository
{

    public function find($id): ?Model
    {
        return Posts::find($id);
    }

    public function create(array $attributes): Posts
    {
        return Posts::create($attributes);
    }

    public function update(array $data) : Model
    {
        $post = self::find($data['id']);
        $post->update($data);

        return $post;
    }

    public function destroy($id): Model
    {
        $post = self::find($id);
        $post->delete();

        return $post;
    }

}
