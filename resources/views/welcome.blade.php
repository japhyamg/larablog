@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            @if ($posts)
                @foreach ($posts as $index => $post)
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="/storage/{{$post->coverimage}}" class="card-img" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                            <h5 class="card-title"><a href="/post/{{$post->slug}}">{{$post->title}}</a></h5>
                            <p class="card-text text-truncate">{{$post->description}}</p>
                            <p class="card-text"><small class="text-muted">Posted: {{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</small></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                {{ $posts->links() }}
            @else
                <p>No Post available</p>
            @endif
            
        </div>
    </div>
</div>
@endsection