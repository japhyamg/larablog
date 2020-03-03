@extends('layouts.app')

@section('content')
<div class="row">
    @include('layouts.menu')
    
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Add User <a class="btn btn-sm btn-info float-right" href="{{ route('admin.users.index') }}">Back</a></div>
            
            <div class="card-body">
                {!! Form::open(['route'=>'admin.users.store','method'=>'POST']) !!}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" >
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email"  >
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password"  >
                    </div>
                    <div class="form-group">
                        <label >Roles</label>
                        @foreach ($roles as $role)
                        <div class="form-check">
                            <input class="form-check-input" name="roles[]" type="checkbox" value="{{$role->id}}">
                            <label class="form-check-label" >
                                {{ucwords($role->name)}}
                            </label>
                        </div>
                    @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection