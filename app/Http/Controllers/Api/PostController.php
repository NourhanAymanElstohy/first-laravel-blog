<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return PostResource::collection(
            Post::all()
        );
    }

    public function show($post)
    {
        return new PostResource(
            Post::find($post)
        );
    }

    public function store(StorePostRequest $request)
    {
        return new PostResource(
            Post::create([
                'title' => $request->title,
                'description' => $request->description,
                'user_id' => $request->user_id,
            ])
        );
    }
}
