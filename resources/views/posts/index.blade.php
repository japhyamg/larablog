@extends('layouts.app')

@section('content')
<div class="row">
    @include('layouts.menu')
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">All Posts <a class="btn btn-sm btn-info float-right" href="{{ route('posts.create') }}">Add Post</a></div>
            <div class="card-body">
              <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Title</th>
                      <th>Date Published</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($posts)
                      @foreach ($posts as $index => $post)
                          <tr>
                              <td scope="row">{{$index+1}}</td>
                              <td><a href="{{route("posts.show",$post->id)}}">{{$post->title}}</a></td>
                              <td>{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</td>
                              <td>
                                  <a href="{{route("posts.show",$post->id)}}" class="btn btn-sm btn-primary">View</a>
                                  @if($post->user->id == auth()->user()->id)
                                  <a href="{{route("posts.edit",$post->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                  {!! Form::open(['action' => ['PostController@destroy', $post->id],'method'=>'DELETE']) !!}
                                  <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                  {!! Form::close() !!}
                                  @endif
                              </td>
                          </tr>
                      @endforeach
                    @else
                      <tr>
                          <td scope="row" width="100%">No Post Available</td>
                          <td></td>
                          <td></td>
                          <td></td>
                      </tr> 
                    @endif
                  </tbody>
              </table>
            </div>
        </div>
    </div>
</div>
@endsection