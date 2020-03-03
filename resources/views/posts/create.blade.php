@extends('layouts.app')

@section('content')
<div class="row">
    @include('layouts.menu')
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Add Post <a class="btn btn-sm btn-info float-right" href="{{ route('posts.index') }}">Back</a></div>
            <div class="card-body">
                {!! Form::open(['action' => 'PostController@store','enctype'=>'multipart/form-data']) !!}
                    <div class="form-group">
                        {!! Form::label('title', 'Title') !!}
                        {!! Form::text('title', '', ['class' => 'form-control','placeholder'=>'Title']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('description', 'Description') !!}
                        {!! Form::textarea('description', '', ['class' => 'form-control','rows'=>'2','cols'=>'3']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('coverimage', 'Cover Image') !!}
                        {!! Form::file('coverimage', ['class' => 'form-control']) !!}
                    </div>
                    <button type="submit" class="btn btn-success">Add</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection