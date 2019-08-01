@extends('layouts.blog-home')
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
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
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

@section('title')
    <h2><marquee>Welcome</marquee></h2>
    @stop
@section('content')

    @if($posts)
    <div class="row">

        <div class="leftcolumn">
            <div class="card">
            @foreach($posts as $post)
                <span  class="text-center">
                <h2><a href="{{url('/post',$post->id)}}">{{$post->title}}</a></h2>
                <h5><span class="label label-danger">By: {{$post->user->name}}</span></h5>
                <h5><span class="label label-primary">{{$post->category->name}}</span></h5>
                <h5><strong>Posted on: {{$post->created_at->diffForHumans()}}</strong></h5>
                </span>
                <img class="center-img" height="350" src="/laravel_project01/public/images/{{$post->photo->file}}" alt="">
                <div><br>{{str_limit($post->body, 250)}}
                        <a href="{{url('/post',$post->id)}}"><h4 class="text-center">Read More</h4></a>
                </div>
                    <br><br>
            @endforeach
            </div>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">{{$posts->render()}}</div>
            </div>
        </div>
        <div class="rightcolumn">
            <div class="card">
                <h2>About Me</h2>
                <div class="fakeimg" style="height:100px;">Image</div>
                <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
            </div>
            <div class="card">
                <h3>Popular Post</h3>
                <div class="fakeimg">Image</div><br>
                <div class="fakeimg">Image</div><br>
                <div class="fakeimg">Image</div>
            </div>
            <div class="card">
                <h3>Follow Me</h3>
                <p>Some text..</p>
            </div>
        </div>
    </div>
    @endif

@endsection


@section('footer')
    <h2 class="footertext">Footer</h2>
    @stop
