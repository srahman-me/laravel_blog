@extends('layouts.admin')


@section('content')
    <h1>Update Users</h1>
    {{--<form action="/lpractice001/public/posts" method="POST">--}}
    <div class="row">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-sm-3">
            <img src="/laravel_project01/public/images/{{$user->photo? $user->photo->file : 'http://via.placeholder.com/400'}}" alt="" class="img-responsive img-rounded">
        </div>

        <div class="col-sm-9">
            {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update',$user->id],'files'=>true]) !!}

            {{--{{csrf_field()}}--}}
            <div class="form-group">
                {!! Form::label('name', 'Name') !!}
                {!! Form::text('name',null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email',null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('role_id', 'Role') !!}
                {!! Form::select('role_id',$roles,null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Active Status') !!}
                {!! Form::select('is_active',array(1=>'Active', 0=>'Not Active'),null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo') !!}
                {!! Form::file('photo_id',null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update User', ['class'=>'btn btn-primary col-sm-6']) !!}
            </div>
            {!! Form::Close() !!}

                                            {{--Delete User--}}
            {{--<form action="/lpractice001/public/posts" method="POST">--}}

            {!! Form::Open(['method'=>'DELETE', 'action'=>['AdminUsersController@destroy',$user->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete User', ['class'=>'btn btn-danger col-sm-6']) !!}
            </div>
            {!! Form::Close() !!}

        </div>

    </div>

@stop