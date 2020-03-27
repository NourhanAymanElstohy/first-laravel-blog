<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();

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
    public function store()
    {
        $request = request();

        Post::create([
            'title' => $request->title,
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

    public function update()
    {
        $postId = request()->post;
        $post = Post::find($postId);

        $data = request()->only(['title', 'description', 'user_id']);
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
