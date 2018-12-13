@extends('layouts.admin')
@section('content')

    <h1>Hello Categories</h1>
    <div class="row">
        <div class="col-sm-6">
            {!! Form::model($category,['method'=>'PATCH','action'=>['AdminCategoryController@update',$category->id]]) !!}
            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Update Category', ['class'=>'btn btn-primary text-center col-sm-4']) !!}
            </div>
            {!! Form::token() !!}
            {!! Form::close() !!}

            {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoryController@update',$category->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete Category', ['class'=>'btn btn-danger text-center pull-right col-sm-4']) !!}
            </div>
            {!! Form::token() !!}
            {!! Form::close() !!}
        </div>
        {{--<div class="col-sm-6">--}}
        {{--<table class="table table-striped">--}}
        {{--<thead>--}}
        {{--<tr>--}}
        {{--<th>Id</th>--}}
        {{--<th>Name</th>--}}
        {{--<th>Created at</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}
        {{--@foreach($categories as $category)--}}
        {{--<tr>--}}
        {{--<td>{{ $category->id }}</td>--}}
        {{--<td>{{ $category->name }}</td>--}}
        {{--<td>{{ $category->created_at ? $category->created_at->diffForHumans():'no date'}}</td>--}}
        {{--</tr>--}}
        {{--@endforeach--}}
        {{--</tbody>--}}
        {{--</table>--}}
        {{--</div>--}}
    </div>




@stop