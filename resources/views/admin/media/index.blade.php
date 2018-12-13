@extends('layouts.admin')

    @section('content')
        @if(Session::has('deleted_photo'))
            <div class="alert alert-danger">
                <i>{{ session('deleted_photo') }}</i>
            </div>

        @endif
        <h1>Media</h1>
        <form action="{{url("/delete/media") }}" method="post">
            <div class="form-group">
            {{--<input type="checkbox" class="form-control">--}}
                <select name="checkBoxArray" id="">
                    <option class="form-control" value="delete">Delete</option>
                </select>
                <input type="submit" class="btn bg-danger" value="delete" class="form-cotrol">
            </div>
            {{--{!! Form::token() !!}--}}
{{--            {{ csrf_field() }}--}}
{{--            {{ method_field('delete') }}--}}
        <div class="row">
            @if($photos)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th><input type="checkbox" id="options"></th>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Created at</th>
                        {{--<th>Email</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($photos as $photo)
                        <tr>
                            <td><input type="checkbox" class="checkboxes" name="checkBoxArray[]" value="{{ $photo->id }}"></td>
                            <td>{{ $photo->id }}</td>
                            <td><img width="200" src="{{ $photo->file }}" alt=""></td>
                            <td>{{ $photo->created_at ? $photo->created_at : 'no date' }}</td>
                            <td> {!! Form::open(['method'=>'delete','action'=>['AdminMediasController@destroy',$photo->id]]) !!}

                                <div class="form-group">
                                    {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                </div>
                                {!! Form::token() !!}
                                {!! Form::close() !!} </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            @endif
        </div>
    </form>
        <div class="row">
            <div class="col-sm-6 col-sm-offset-5">
                {{$photos->render() }}
            </div>
        </div>
@stop
@section('footer')
    <script>
    $(document).ready(function () {
        $('#options').click(function () {
            if(this.checked)
            {
                $('.checkboxes').each(function () {
                   this.checked = true;
                });
            }else {
                $('.checkboxes').each(function () {
                    this.checked = false;
                });
            }
        })
    });
    </script>
    @stop



