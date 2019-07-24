@extends('layouts.admin')


@section('content')

    <h1>Create Posts</h1>

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
        {!! Form::Open(['method'=>'POST', 'action'=>'AdminPostsController@store','files'=>true]) !!}

            {{--{{csrf_field()}}--}}
                    <div>
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title',null, ['class'=>'form-control']) !!}
                    </div>
    <br>

                    <div class="form-group">
                        {!! Form::label('category_id', 'Category') !!}
                        {!! Form::select('category_id',array(1=>'PHP',0=>'Laravel'),null, ['class'=>'form-control'])!!}
                    </div>

                    <div class="form-group">
                       {!! Form::label('photo_id', 'Photo') !!}
                        {!! Form::file('photo_id',null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                       {!! Form::label('body', 'Description') !!}
                       {!! Form::textarea('body',null, ['class'=>'form-control','rows' => 3]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
                    </div>

        {!! Form::Close() !!}
    </div>


@stop