@extends('layouts.admin')


@section('content')

    @if($photos)
      <table class="table table-condensed">
        <thead>
           <tr>
            <th>ID</th>
            <th>File</th>
            <th>Created At</th>
            <th>Action</th>
           </tr>
        </thead>

        <tbody>

            @foreach($photos as $photo)
               <tr>
                 <td>{{$photo->id}}</td>
                 <td><img height="50" width="50" src="/laravel_project01/public/images/{{$photo->file}}" alt=""></td>
                 <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : 'No Date Found'}}</td>

                 <td>

                         {!! Form::Open(['method'=>'DELETE', 'action'=>['AdminMediasController@destroy', $photo->id]]) !!}
                                 <div class="form-group">
                                     {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                 </div>
                         {!! Form::Close() !!}

                 </td>
               </tr>
             @endforeach

        </tbody>
      </table>
    @endif
@stop

