@extends('layouts.admin')
@section('content')
    {{--<h1>Hello world!</h1>--}}
    @if(count($comments)>0)

    <h1>All Comments</h1>
    <table class="table table-striped">
        <thead>
          <tr>
            <th>ID</th>
            <th>Photo</th>
            <th>Author</th>
            <th>Email</th>
            <th>Body</th>
            <th>Post</th>
            <th>Replies</th>
          </tr>
        </thead>
        <tbody>
            @foreach($comments as $comment)
          <tr>
            <td>{{$comment->id}}</td>
            <td><img width="100" src="{{$comment->photo}}" alt=""></td>
            <td>{{$comment->author}}</td>
            <td>{{$comment->email}}</td>
            <td>{{$comment->body}}</td>
            <td><a href="{{ route('home.post',$comment->post->slug) }}">view post</a></td>
            <td><a href="{{ route('admin.comment.replies.show',$comment->id) }}">view Replies</a></td>
              <td>
                  @if($comment->is_active == 1)
                    {!! Form::open(['method'=>'PATCH','action'=>['PostCommentController@update',$comment->id]]) !!}
                      <input type="hidden" name="is_active" value="0">
                          <div class="form-group">
                                  {!! Form::submit('Un Approve', ['class'=>'btn btn-primary']) !!}
                              </div>
                              {!! Form::token() !!}
                              {!! Form::close() !!}
                      @else
                      {!! Form::open(['method'=>'PATCH','action'=>['PostCommentController@update',$comment->id]]) !!}
                      <input type="hidden" name="is_active" value="1">
                      <div class="form-group">
                          {!! Form::submit('Approve', ['class'=>'btn btn-success']) !!}
                      </div>
                      {!! Form::token() !!}
                      {!! Form::close() !!}
                  @endif
              </td>
              <td>
                  {!! Form::open(['method'=>'DELETE','action'=>['PostCommentController@destroy',$comment->id]]) !!}
                  <div class="form-group">
                      {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                  </div>
                  {!! Form::token() !!}
                  {!! Form::close() !!}
              </td>
          </tr>
          @endforeach
            @else
                <h1 class="text-center" style="margin-top: 200px;"><strong>No Comments</strong> yet -Go to post and give a comment</h1>
        @endif
        </tbody>
      </table>
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$comments->render() }}
        </div>
    </div>


@endsection
