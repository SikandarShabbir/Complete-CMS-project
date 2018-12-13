@extends('layouts.admin')
@section('content')
    @include('includes.tinyeditor')
    <h1> Hi! Update Post </h1>
    {{--<div class="container bg-success">--}}
    {{--<div class="row bg-succ ess">--}}
        <div class="col-md-4 bg-su ccess">
            {{--{{$post->photo->file}}--}}
            <img src="{{$post->photo?'/codehacking'.$post->photo->file : 'null'}}" alt="" class="img-responsive">
            {{--<h1>gjrmrrymfh jfjjf dgj</h1>--}}
        </div>
        <div class="col-md-8 bg-in fo">
        {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id ],'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('title','Title:') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_id','Category:') !!}
            {!! Form::select('category_id', $categories ,null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id','Photo:') !!}
            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('body','Description:') !!}
            {!! Form::textarea('body',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-6']) !!}
        </div>
        {!! Form::token() !!}
        {!! Form::close() !!}

        {!! Form::open(['method'=>'delete','action'=>['AdminPostsController@destroy',$post->id ]]) !!}
        <div class="form-group">
            {!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-sm-6']) !!}
        </div>
        {!! Form::token() !!}
        {!! Form::close() !!}
        </div>
    {{--</div>--}}
    {{--</div>--}}
    @include('includes.form_errors')
@stop