@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">{{$post->title}} <a class="btn btn-sm btn-info float-right" href="{{ url('/posts') }}">Back</a></div>
            <div class="card-body">
                <img src="/storage/{{$post->coverimage}}" alt="" class="img-fluid">
                <p>{{$post->description}}</p>
            </div>
            <div class="card-footer">
                <p class="d-flex justify-content-between"><span>Posted By: {{$post->user->name}}</span> <span>Posted: {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}} </span> </p>
            </div>
        </div>
    </div>
</div>
@endsection