@extends('layouts.admin')


@section('content')
    <h1>Update Posts</h1>
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
            <img src="/laravel_project01/public/images/{{$post->photo ? $post->photo->file : 'http://via.placeholder.com/400'}}" alt="" class="img-responsive img-rounded">
        </div>

        <div class="col-sm-9">
            {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update',$post->id],'files'=>true]) !!}
                                     {{--{{csrf_field()}}--}}

            <div>
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title',null, ['class'=>'form-control']) !!}
            </div>
            <br>

            <div class="form-group">
                {!! Form::label('category_id', 'Category') !!}
                {!! Form::select('category_id', $categories,null, ['class'=>'form-control'])!!}
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
                {!! Form::submit('Update Post', ['class'=>'btn btn-primary col-sm-6']) !!}
            </div>

            {!! Form::Close() !!}



                            {{--Delete User--}}
                            {{--<form action="/lpractice001/public/posts" method="POST">--}}

            {!! Form::Open(['method'=>'DELETE', 'action'=>['AdminPostsController@destroy',$post->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-sm-6']) !!}
            </div>
            {!! Form::Close() !!}

        </div>

    </div>

@stop