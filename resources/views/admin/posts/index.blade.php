@extends('layouts.admin')
@section('content')

    <h1> Hello Posts </h1>
   {{--{{ dd(Auth::user()->posts()->$posts)}}--}}
    @if($posts)
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                {{--<th>Photo</th>--}}
                <th>Owner</th>
                <th>Category</th>
                <th>Title</th>
                <th>Body</th>
                <th>Post</th>
                <th>Comments</th>
                <th>Created at</th>
                <th>Updated at</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
{{--                    <td><img width="100" src="{{ $post->photo ? $post->photo->file:"https://via.placeholder.com/250x150&text=Image" }}" alt=""></td>--}}
                    <td><a href="{{ route('admin.posts.edit',$post->id) }}">{{ $post->user->name }}</a></td>
                    <td>{{ $post->category ? $post->category->name : 'Uncategroized' }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{!! $post->body !!}</td>
                    <td><a href="{{ route('home.post',$post->slug) }}">view post</a></td>
                    <td><a href="{{ route('admin.comments.show',$post->id) }}">view comments</a></td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                    <td>{{ $post->updated_at->diffForHumans() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif
    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render() }}
        </div>
    </div>
@stop