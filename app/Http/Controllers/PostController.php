<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = [
            [
                'id' => 1,
                'title' => 'firstPost',
                'createdAt' => '23/2/2020'
            ],
            [
                'id' => 2,
                'title' => 'secondPost',
                'createdAt' => '24/3/2020'
            ],
            [
                'id' => 3,
                'title' => 'thirdPost',
                'createdAt' => '25/4/2020'
            ]
        ];
        return view('index', [
            'myPostsKey' => $posts,
        ]);
    }
}
