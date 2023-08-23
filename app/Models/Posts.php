<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    public $timestamps = false;

    protected $fillable = ['title', 'author', 'publication_year'];
}
