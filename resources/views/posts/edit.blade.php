@extends('layouts.app')

@section('content')
<div class="row">
    @include('layouts.menu')
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Edit Post <a class="btn btn-sm btn-info float-right" href="{{ route('posts.index') }}">Back</a></div>
            <div class="card-body">
                {!! Form::open(['action' => ['PostController@update', $post->id],'method'=>'PUT', 'enctype'=>'multipart/form-data']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', $post->title, ['class' => 'form-control','placeholder'=>'Title']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::textarea('description', $post->description, ['class' => 'form-control','rows'=>'2','cols'=>'3']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('coverimage', 'Cover Image') !!}
                        {!! Form::file('coverimage', ['class' => 'form-control']) !!}
                        <br>
                        <img src="/storage/{{$post->coverimage}}" alt="" class="img-fluid">
                    </div>
                    <button type="submit" class="btn btn-success">Update</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection