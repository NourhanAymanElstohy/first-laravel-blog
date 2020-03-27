@extends('layouts.app')

@section('content')
<div class="container">
  <div class="align-items-center mb-5 mt-5">
    <a href="{{route('posts.create')}}" class="btn btn-success btn-sm ">Create New Post</a>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Description</th>
        <th scope="col">Created By</th>
        <th scope="col">created At</th>
        <th scope="col" class="text-center">Actions</th>
      </tr>
    </thead>
  <tbody>
   @foreach ($posts as $post)
    <tr>
      <th scope="row">{{$post->id}}</th>
      <td>{{$post->title}}</td>
      <td>{{$post->description}}</td>
      <td>{{$post->created_at->format('d-m-Y')}}</td>
      <td>{{$post->user ? $post->user->name :'not exist!'}}</td>
    
        <td>
          <div class="row">
            <a href="{{route('posts.show',['post' => $post->id])}}" class="btn btn-primary btn-sm mr-2">View</a>
            <a href="{{route('posts.edit',['post' => $post->id])}}" class="btn btn-success btn-sm mr-2">Edit</a>
            <form method="POST" action="{{route('posts.destroy',['post' => $post->id])}}">
              @csrf  
              @method('DELETE')
              <button class="btn btn-secondary btn-sm " onclick="return confirm ('are you sure?')">Delete</button>
            </form>
          </div>
        </td>
    </tr>
    @endforeach
  </tbody>
</table>
    </div>
@endsection
