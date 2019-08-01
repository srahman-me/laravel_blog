@extends('layouts.single-blog-post')
@section('title')
    <title>{{$post->title}}</title>
    @stop

@section('navbar')

    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/home') }}">
                    Laravel
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a target="_blank" href="{{ url('/login') }}">Login</a></li>
                        <li><a target="_blank" href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                @if(Auth::check())
                                    @if(Auth::user()->isAdmin())
                                    <li>
                                        <a href="/laravel_project01/public/admin"> Dashboard</a>
                                    </li>
                                    @endif
                                @endif
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@stop

@section('content')
    <h2>{{$post->title}}</h2>
    <h5><span class="label label-danger">By: {{$post->user->name}}</span></h5>
    <h5><span>Posted: {{$post->created_at->diffForHumans()}}</span></h5>
    <h5><span class="label label-primary">{{$post->category->name}}</span></h5><br>
    <img class="center-img" height="350" src="/laravel_project01/public/images/{{$post->photo->file}}" alt="">
    <p><br>{{$post->body}}</p>
    <br>
    @if(Session::has('comment_message'))

        {{Session('comment_message')}}

        @endif

    @if(Auth::check())
        {!! Form::Open(['method'=>'POST', 'action'=>'PostCommentsController@store']) !!}

                <input type="hidden" name="post_id" value="{{$post->id}}">
                <div class="form-group">
                    {!! Form::label('body', 'Leave a comment') !!}
                    {!! Form::textarea('body',null, ['class'=>'form-control', 'rows'=> 3]) !!}

                </div>
                <div class="form-group">
                    {!! Form::submit('Comment', ['class'=>'btn btn-primary']) !!}
                </div>
        {!! Form::Close() !!}
        @else
    @endif

    <br>



    @if(count($comments) > 0)
        <p><span class="badge">{{count($comments)}}</span> Comments:</p><br>


    <div class="text-center label-success">
            @if(Session::has('reply_message'))

                {{Session('reply_message')}}
            @endif
    </div>
    <br>
    <div class="row">
        @foreach($comments as $comment)
        <div class="col-sm-2 text-center">
            <img src="/laravel_project01/public/images/{{$comment->photo}}" class="img-circle" height="65" width="65" alt="Avatar">
        </div>
        <div class="col-sm-10">
            <h4><strong>{{$comment->author}}</strong>
                <small> {{$comment->created_at->diffForHumans()}}</small>
            </h4>
            <div>
                {{$comment->body}}<br> <br>
                {{--{!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy',$comment->id]]) !!}--}}
                {{--<div class="form-group">--}}
                    {{--{!! Form::submit('Delete comment', ['class'=>'btn btn-danger  btn-sm']) !!}--}}
                {{--</div>--}}
                {{--{!! Form::Close() !!}--}}
            </div>

            {{--Replies--}}

            @if(count($comment->replies)>0)

            <p><span class="badge"></span> <strong>Replies:</strong></p>
            @foreach($comment->replies as $reply)
            @if($reply->is_active ==1)
                {{--<p><span class="badge">{{count($comment->replies)}}</span> Replies:</p><br>--}}
                <div class="col-sm-2 text-center">
                    <img src="/laravel_project01/public/images/{{$reply->photo}}" class="img-circle" height="65" width="65" alt="Avatar">
                </div>
                <div class="col-sm-10">
                    <h4><strong>{{$reply->author}}</strong> <small>{{$reply->created_at->diffForHumans()}}</small></h4>
                    <p>{{$reply->body}}</p><br>

                    {{--{!! Form::open(['method'=>'DELETE', 'action'=>['CommentsRepliesController@destroy',$reply->id]]) !!}--}}
                    {{--<div class="form-group">--}}
                        {{--{!! Form::submit('X Reply', ['class'=>'btn btn-danger btn-xs']) !!}--}}
                    {{--</div>--}}
                    {{--{!! Form::Close() !!}--}}
                </div>

            @endif

            @endforeach

            @endif

            @if(Auth::check())
            <div class="comment-reply col-xs-10">
                {!! Form::Open(['method'=>'POST', 'action'=>'CommentsRepliesController@createReply']) !!}
                <div class="form-group">

                    <input type="hidden" name="comment_id" value="{{$comment->id}}">
                    {!! Form::label('', 'Reply-') !!}
                    {!! Form::textarea('body',null, ['class'=>'form-control','rows'=>1]) !!}

                </div>
                <div class="form-group">
                    {!! Form::submit('Reply', ['class'=>'btn btn-primary pull-right']) !!}
                </div>
                {!! Form::Close() !!}
            </div>
            @endif
            {{--Replies Ends--}}
        </div>

        @endforeach
        @if(Auth::check())
            @else
                <h3 class="text-center">(Log in to comment)</h3>
        @endif
            @else
            <h3 class="text-center"> (No Comments)</h3>
                @if(Auth::check())
                    @else
                        <h3 class="text-center">(Log in to comment)</h3>
                @endif
    @endif
    </div>

@stop


@section('scripts')


@stop


@section('footer')
    <div class="col-sm-5">

    </div>
    <div class="col-sm-2">
        <h3>Footer</h3>
    </div>
    <div class="col-sm-5">

    </div>
@stop

