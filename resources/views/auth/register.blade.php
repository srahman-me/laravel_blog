
@extends('layouts.app')



@section('content')
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
    <h1>User Registration</h1>
    {{--<form action="/lpractice001/public/posts" method="POST">--}}

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {!! Form::Open(['method'=>'POST', 'action'=>'HomeController@store','files'=>true]) !!}

    {{csrf_field()}}
    <div class="form-group">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name',null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email') !!}
        {!! Form::email('email',null, ['class'=>'form-control']) !!}
    </div>
        <input type="hidden" name="role_id"  value="4">
        <input type="hidden" name="is_active"  value="1">
        {{--<div class="form-group">--}}
        {{--{!! Form::label('role_id', 'Role') !!}--}}
        {{--{!! Form::select('role_id',[''=>'Choose Role']+$roles,null, ['class'=>'form-control']) !!}--}}
    {{--</div>--}}

    {{--<div class="form-group">--}}
        {{--{!! Form::label('is_active', 'Active Status') !!}--}}
        {{--{!! Form::select('is_active',array(1=>'Active', 0=>'Not Active'),0, ['class'=>'form-control']) !!}--}}
    {{--</div>--}}

    <div class="form-group">
        {!! Form::label('photo_id', 'Photo') !!}
        {!! Form::file('photo_id',null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::Close() !!}
    </div>
    <div class="col-sm-2"></div>
@stop