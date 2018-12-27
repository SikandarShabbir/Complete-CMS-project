    @extends('layouts.admin')
    @section('content')
    <h1>All Users</h1>
        @if(Session::has('deleted_user'))
            <div class="alert alert-danger">
                <i>{{ session('deleted_user') }}</i>
            </div>

        @endif
    <table class="table table-strip ed table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Created</th>
            <th>Updated</th>
        </tr>
        </thead>
        <tbody>
        {{--<pre>--}}
        {{--{{--}}
         {{--var_dump($users) }} {{ exit }}--}}
        @if($users)
            @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            {{--<td><img src="../public/images/1532885914aaa.jpg" alt=""></td>--}}
            <td><img height="100" src="{{$user->photo ? $user->photo->file : 'http://via.placeholder.com/150x150'}}" alt=""></td>
            <td><a href="{{ route('admin.users.edit', $user->id) }}">{{ $user->name }}</a></td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role['name'] }}</td>
            <td>{{ $user->is_active == 1?"Active": "Not Active" }}</td>
            <td>{{ $user->created_at?$user->created_at->diffForHumans():'null' }}</td>
            <td>{{ $user->updated_at?$user->updated_at->diffForHumans():'null' }}</td>
        </tr>
        @endforeach
            @else
            <p>No User</p>
        @endif

        </tbody>
    </table>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-5">
                {{$users->render() }}
            </div>
        </div>
        @stop
