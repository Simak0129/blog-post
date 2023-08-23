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

    public function update(array $data) : bool
    {
        $post = self::find($data['id']);

        return $post->update($data);
    }

    public function destroy($id): bool
    {
        return Posts::destroy($id);
    }

}
