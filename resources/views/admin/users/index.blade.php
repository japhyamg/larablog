@extends('layouts.app')

@section('content')
<div class="row">
    @include('layouts.menu')
    <div class="col-md-9">
        <div class="card">
            <div class="card-header">Users <a class="btn btn-sm btn-info float-right" href="{{ route('admin.users.create') }}">Add User</a></div>
            <div class="card-body">
              <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>User</th>
                      <th>Email</th>
                      <th>Roles</th>
                      <th>Joined</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if ($users)
                      @foreach ($users as $index => $user)
                          <tr>
                              <td scope="row">{{$index+1}}</td>
                              <td>{{$user->name}}</td>
                              <td>{{$user->email}}</td>
                              <td>{{implode(', ',$user->roles()->get()->pluck('name')->toArray())}}</td>
                              <td>{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                              <td>
                                  <a href="{{route("admin.users.edit",$user->id)}}" class="btn btn-sm btn-warning float-left mr-1">Edit</a>
                                  {!! Form::open(['route' => ['admin.users.destroy', $user],'method'=>'DELETE', 'class'=>'float-left']) !!}
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