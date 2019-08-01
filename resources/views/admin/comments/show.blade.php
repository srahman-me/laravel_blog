@extends('layouts.admin')

@section('content')
    @if(count($comments)>0)
        <h1>Comments from: <a href="{{route('home.post',$post->id)}}">{{$post->title}}</a></h1>
        <table class="table table-condensed">
            <thead>
            <tr>
                <th>Id</th>
                <th>Author</th>
                <th>Email</th>
                <th>Body</th>
                <th>View Replies</th>
                <th>Un/Approve</th>
                <th>Action</th>
            </tr>
            </thead>
            @foreach($comments as $comment)
                <tbody>
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td><a href="{{route('admin.comment.replies.show',$comment->id)}}">View Replies</a></td>

                    <td>
                        @if($comment->is_active ==1)
                            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update',$comment->id]])!!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Un-approve', ['class'=>'btn btn-success']) !!}
                            </div>
                            {!! Form::Close() !!}

                        @else

                            {!! Form::open(['method'=>'PATCH', 'action'=>['PostCommentsController@update',$comment->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Approve', ['class'=>'btn btn-info']) !!}
                            </div>
                            {!! Form::Close() !!}


                        @endif
                    </td>

                    <td>
                        {!! Form::open(['method'=>'DELETE', 'action'=>['PostCommentsController@destroy',$comment->id]]) !!}
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
        <h1 class="text-center">No Comments</h1>
    @endif
@stop


@section('footer')

@stop