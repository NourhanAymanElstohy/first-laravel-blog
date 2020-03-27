@extends('layouts.app')

@section('content')

<div class="container m-5 ">
    <div class="card ">
        <div class="card-header text-center bg-primary text-light">
            Post info
        </div>
        <div class="card-body">
            <h5 class="card-title"><b>Title:</b> {{$post->title}}</h5>
            <p class="card-text"><b>Description:</b><br> {{$post->description}}</p>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-header text-center bg-success text-light">
           Post Creator info
        </div>
        <div class="card-body">
            <h5 class="card-title"><b>Name:</b> {{$post->user->name}}</h5>
            <p class="card-text"><b>Email:</b><br> {{$post->user->email}}</p>
            <p class="card-text"><b>CreatedAt:</b><br>{{$post->user->getCreatedAtAttribute()}}</p>
        </div>
    </div>
</div>    

@endsection