@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header justify-content-between">All Posts <a class="btn btn-sm btn-info float-right" href="{{ url('/posts/create') }}">Add Post</a></div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                <table class="table">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Date Publised</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @if ($posts)
                        @foreach ($posts as $index => $post)
                            <tr>
                                <td scope="row">1</td>
                                <td><a href="http://">{{$post->title}}</a></td>
                                <td>{{$post->created_at}}</td>
                                <td>
                                    <a href="{{url('/posts/'.$post->id)}}" class="btn btn-sm btn-primary">View</a>
                                    <a href="{{url('/posts/'.$post->id).'/edit'}}" class="btn btn-sm btn-warning">Edit</a>
                                    {!! Form::open(['action' => ['PostController@destroy', $post->id],'method'=>'DELETE']) !!}
                                    <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</button>
                                    {!! Form::close() !!}
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