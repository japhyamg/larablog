@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between"> 
                <div>Dashboard</div>
                <div>
                    @can('manage-users')
                        <a class="btn btn-sm btn-info mr-1" href="{{ route('admin.users.index') }}">Users</a>
                    @endcan
                    <a class="btn btn-sm btn-info " href="{{ url('/posts') }}">Posts</a>
                </div>
            </div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                You are logged in!
            </div>
        </div>
    </div>
</div>
@endsection
