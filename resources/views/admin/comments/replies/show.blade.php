@extends('layouts.admin')
@section('content')
    {{--<h1>Hello world!</h1>--}}
    @if(count($replies)>0)
            {{-- {{dd($replies)}} --}}
            {{-- {{dd($replies->id)}} --}}
            {{-- {{dd(url('/'))}} --}}
        <h1>Replies to the post</h1>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>Post</th>
            </tr>
            </thead>
            <tbody>
            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td><img width="100" height="100" src="{{(url('/').substr($reply->photo, 2))}}" alt="noting"></td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="{{ route('home.post',$reply->comment->post->slug) }}">view post</a></td>
                    <td>
                        @if($reply->is_active == 1)
                            {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Un Approve', ['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::token() !!}
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method'=>'PATCH','action'=>['CommentRepliesController@update',$reply->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                            </div>
                            {!! Form::token() !!}
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>
                        {!! Form::open(['method'=>'DELETE','action'=>['CommentRepliesController@destroy',$reply->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::token() !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            
            </tbody>
        </table>
        @else
                <h1 class="text-center">No Replies</h1>
            @endif

@endsection
