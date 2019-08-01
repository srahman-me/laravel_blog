@extends('layouts.admin')

@section('content')
    @if(count($replies)>0)
        {{--<h1>Replies of Comments from "{{$post->title}}"</h1>--}}
        <h1>Replies</h1>
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>View Post</th>
                <th>Un/Approve</th>
                <th>Action</th>
            </tr>
            </thead>
            @foreach($replies as $reply)
                <tbody>
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="{{route('home.post',$reply->comment->post->id)}}">View Post</a></td>
                    <td>
                        @if($reply->is_active ==1)
                            {!! Form::open(['method'=>'PATCH', 'action'=>['CommentsRepliesController@update',$reply->id]])!!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
                            </div>
                            {!! Form::Close() !!}

                        @else

                            {!! Form::open(['method'=>'PATCH', 'action'=>['CommentsRepliesController@update',$reply->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                            </div>
                            {!! Form::Close() !!}


                        @endif
                    </td>

                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['CommentsRepliesController@destroy',$reply->id]]) !!}
                        <div class="form-group">
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>
                        {!! Form::Close() !!}
                    </td>
                </tr>
                </tbody>

            @endforeach
        </table>
    @else
        <h1 class="text-center">No Replies</h1>
    @endif
@stop


@section('footer')

@stop