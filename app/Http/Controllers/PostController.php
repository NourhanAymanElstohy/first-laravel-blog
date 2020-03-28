<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // dd($posts);
        // $slug = SlugService::createSlug(Post::class, 'slug', $posts->title);
        return view('index', [
            'posts' => $posts,

        ]);
    }

    public function create()
    {
        $users = User::all();
        return view('create', [
            'users' => $users,
        ]);
    }
    public function show()
    {
        $postId = request()->post;
        $post = Post::find($postId);

        return view('show', [
            'post' => $post,

        ]);
    }
    public function store(StorePostRequest $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        Post::create([
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'user_id' => $request->user_id,
        ]);
        return redirect()->route('posts.index');
    }

    public function edit()
    {
        $postId = request()->post;

        $post = Post::find($postId);
        $users = User::all();

        return view('edit', [
            'post' => $post,
            'users' => $users,
        ]);
    }

    public function update(UpdatePostRequest $request)
    {
        $postId = $request->post;
        $post = Post::find($postId);
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);

        $data = $request->only(['title', 'description', 'user_id']);
        $data += array('slug' => $slug);

        $post->update($data);

        return redirect()->route('posts.index');
    }

    public function destroy()
    {
        $postId = request()->post;
        $post = Post::find($postId);

        $post->delete();
        return redirect()->route('posts.index');
    }
}

//storage url === to get file name
// php make:response == responsible interface
