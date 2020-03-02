@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-2">
                <a href="/" class="btn btn-sm btn-info">Back</a>
            </div>
            <div class="card">
                <img src="/storage/{{$post->coverimage}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$post->title}}</h5>
                  <p class="card-text">{{$post->description}}</p>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <p><span>Posted By: {{$post->user->name}}</span> <br> <span>Posted: {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</span> </p>
                        <p>3likes 1dislike</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection