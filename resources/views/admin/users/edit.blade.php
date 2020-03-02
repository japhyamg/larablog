@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">Edit User - {{$user->name}} </div>
            <div class="card-body d-flex justify-content-center">
                <div class="col-md-6">
                    {!! Form::open(['route'=>['admin.users.update',$user->id],'method'=>'PUT']) !!}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" value="{{$user->name}}" >
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="{{$user->email}}" >
                        </div>
                        <div class="form-group">
                            <label >Roles</label>
                            @foreach ($roles as $role)
                            <div class="form-check">
                                <input class="form-check-input" name="roles[]" type="checkbox" value="{{$role->id}}"
                                @if ($user->roles->pluck('id')->contains($role->id))
                                    checked
                                @endif
                                >
                                <label class="form-check-label" >
                                    {{ucwords($role->name)}}
                                </label>
                            </div>
                        @endforeach
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection