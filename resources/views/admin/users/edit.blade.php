    @extends("layouts.admin")
    @section('content')
        <h1>Hi! Edit Users</h1>
        <div class="row">
            <div class="col-sm-3">
             <img class="img-responsive img-rounded" height="100" src="{{$user->photo ?'/codehacking'. $user->photo->file : 'http://via.placeholder.com/150x150'}}" alt="">
                {{--<img src="" alt="">--}}
             </div>
        <div class="col-sm-9">
        {!! Form::model($user,['method'=>'patch','action'=>['AdminUsersController@update', $user->id ],'files'=>true]) !!}
        <div class="form-group">
            {!! Form::label('name','Name:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('email','Email:') !!}
            {!! Form::email('email',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('role_id','Role:') !!}
            {!! Form::select('role_id',[''=>'Choose Options'] + $roles , 0 ,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('is_active','Status:') !!}
            {!! Form::select('is_active', array(0 =>'Not Active',1 =>'Active'),null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('photo_id','Photo:') !!}
            {!! Form::file('photo_id',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password','Password:') !!}
            {!! Form::password('password',['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-2']) !!}
        </div>
        {!! Form::token() !!}
        {!! Form::close() !!}

            {!! Form::open(['method'=>'delete','action'=>['AdminUsersController@destroy', $user->id ]]) !!}
                <div class="form-group">
                    {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-sm-2 pull-right']) !!}
                </div>
                {!! Form::token() !!}
                {!! Form::close() !!}
        </div>
        </div>
        {{--<img src="../public/images/1532951904myPic.png" alt="">--}}

        @include('includes.form_errors')
    @stop

