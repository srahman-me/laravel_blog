@extends('layouts.admin')


@section('content')

    @if(Session::has('deleted_post'))
        <h2 class="bg-danger">{{Session('deleted_post')}}</h2>
    @endif
    <h1>Posts</h1>

    <table class="table table-condensed">
        <thead>
        <tr>
            <th>Post Id</th>
            <th>Image</th>
            <th>Owner</th>
            <th>Post Title</th>
            <th>Category Id</th>
            <th>Post Body</th>
            <th>Created At</th>
            <th>Updated At</th>

        </tr>
        </thead>
        <tbody>
        @if($posts)
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img height="50" width="100" src="/laravel_project01/public/images/{{$post->photo ? $post->photo->file : 'https://via.placeholder.com/150'}}" alt=""></td>
                    <td>{{$post->user->name}}</td>
                    <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                    <td>{{$post->category_id ? $post->category->name : 'Uncategorized'}}</td>
                    <td>{{str_limit($post->body, 15)}}</td>
                    <td>{{$post->created_at->diffForHumans()}}</td>
                    <td>{{$post->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@stop