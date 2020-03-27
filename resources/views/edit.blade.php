@extends('layouts.app')

@section('content')
<div class="container col-6">
<form method="POST" action="{{route('posts.update',['post'=>$post->id])}}" class="mb-4">
        @csrf
        @method('PUT')
        <h1 class="mt-5 text-center">Create New Post</h1>
        <div class="form-group mt-5">
        <label >Title</label>
        <input name="title" type="text" class="form-control" aria-describedby="emailHelp" value="{{$post->title}}">
         
        </div>
        <div class="form-group">
        <label for="exampleInputPassword1">Description</label>
        <textarea name="description" class="form-control">
            {{$post->description}}
        </textarea>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Post Creator</label>
            <select name="user_id" class="form-control">
                @foreach($users as $user)  
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
</div>
@endsection