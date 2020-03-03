<div class="col-md-3">
    <ul class="list-group">
        @can('manage-users')
            <li class="list-group-item">
                <a class=" " href="{{ route('admin.users.index') }}">Users</a>                
            </li>
        @endcan
        @can('manage-posts')
            <li class="list-group-item">
                <a class=" " href="{{ url('/posts') }}">Posts</a>                   
            </li>
        @endcan
    </ul>
</div>