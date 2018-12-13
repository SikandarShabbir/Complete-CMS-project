@extends('layouts.blog-post')
@section('content')
    {{--<h1>Welcome to posts</h1>--}}
    <!-- Title -->
    <h1>{{$post->title}}</h1>
{{--    {{ dd(asset('../blog-po st.css')) }}--}}
    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> Posted {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo ? $post->photo->file : null}}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{!! $post->body !!}</p>

    <hr>
    @if(Session::has('message'))
        {{ session('message') }}
    @endif
    <!-- Blog Comments -->
    @if(Auth::check())
        <div class="well">
            <h4>Leave a comment:</h4>
            {!! Form::open(['method'=>'post','action'=>'PostCommentController@store']) !!}
            <div class="form-group">
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                {!! Form::label('body','Body') !!}
                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>3]) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Comment', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::token() !!}
            {!! Form::close() !!}
        </div>
    @endif
    <hr>
    <!-- Comment -->

    @if (count($comments) > 0)

        @foreach ($comments as $comment)
            <!-- Comment -->
            {{--<div class="container bg-primary">--}}
                <div class="media">
                    <a class="pull-left" href="#">

        <img class="media-object" height="64" src="{{$comment->photo}}" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">{{$comment->author}}
                            <small>{{$comment->created_at->diffForHumans()}}</small>
                        </h4>
                        {{$comment->body}}
                    </div>
                    <div class="comment-reply-container ">
                        <button class="toggle-reply btn btn-primary pull-right">Reply</button>

                        <div class="comment-reply col-sm-6" style="display: none;">

                            {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}

                            <input type="hidden" name="comment_id" value="{{$comment->id}}">

                            <div class='form-group'>
                                {!! Form::label('body','Body:') !!}
                                {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}
                            </div>

                            <div class='form-group'>
                                {!! Form::submit('Submit reply',['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::token() !!}
                            {!! Form::close() !!}
                        </div>

                    </div>
                    {{--<div class="containe r" style="margin-top: 30px;">--}}
                <!-- Nested Comment -->
                          @if(count($comment->replies)>0)
                                @foreach ($comment->replies as $reply)

                                @if ($reply->is_active == 1)

                                <div id="nested-comment" class="media" style="padding-top: 50px;">
                                    <a class="pull-left" href="#">
                                        <img class="media-object" height="32" src="{{$reply->photo}}" alt="">
                                    </a>
                                    <div class="media-body">
                                        <h4 class="media-heading">{{$reply->author}}
                                            <small>{{$reply->created_at->diffForHumans()}}</small>
                                        </h4>
                                        {{$reply->body}}
                                    </div>

                                    <div class="comment-reply-container ">
                                        <button class="toggle-reply btn btn-primary pull-right">Reply</button>

                                        <div class="comment-reply col-sm-6" style="display: none;">

                                        {!! Form::open(['method'=>'POST','action'=>'CommentRepliesController@createReply']) !!}

                                        <input type="hidden" name="comment_id" value="{{$comment->id}}">

                                        <div class='form-group'>
                                            {!! Form::label('body','Body:') !!}
                                            {!! Form::textarea('body',null,['class'=>'form-control','rows'=>1]) !!}
                                        </div>

                                        <div class='form-group'>
                                            {!! Form::submit('Submit reply',['class'=>'btn btn-primary']) !!}
                                        </div>
                                            {!! Form::token() !!}
                                        {!! Form::close() !!}
                                    </div>

                                </div>
                             </div>
                            @else
                                    <h1 class="text-center">No Replies</h1>
                        <!-- End Nested Comment -->
                        @endif

                        @endforeach
                    @endif
                        {{--<button class="toggle-reply btn btn-primary pull-right">Reply</button>--}}

                    {{--</div>--}}



                </div>
            {{--</div>--}}

        @endforeach

    @endif

    <!-- End Comment -->

@stop

@section('scripts')

    <script>
        $(".comment-reply-container .toggle-reply").click(function () {
            $(this).next().slideToggle("slow");
        })
    </script>

@stop