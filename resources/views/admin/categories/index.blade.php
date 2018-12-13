@extends('layouts.admin')
@section('content')

<h1>Hello Categories</h1>
<div class="row">
    <div class="col-sm-6">
      {!! Form::open(['method'=>'post','action'=>'AdminCategoryController@store']) !!}
          <div class="form-group">
              {!! Form::label('name','Name:') !!}
              {!! Form::text('name',null,['class'=>'form-control']) !!}
          </div>
         <div class="form-group">
              {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
          </div>
          {!! Form::token() !!}
          {!! Form::close() !!}
    </div>
    <div class="col-sm-6">
    <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Created at</th>
          </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
          <tr>
            <td>{{ $category->id }}</td>
            <td><a href="{{ route('admin.categories.edit', $category->id) }}">{{ $category->name }}</a></td>
            <td>{{ $category->created_at ? $category->created_at->diffForHumans():'no date'}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
</div>




@stop