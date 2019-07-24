@extends('layouts.admin')


@section('content')

    <h1>Categories</h1>

    <div class="col-sm-6">

            {!! Form::Open(['method'=>'POST', 'action'=>'AdminCategoriesController@store']) !!}

                {{--{{csrf_field()}}--}}
                    <div class="form-group">
                        {!! Form::label('name', 'Category Name') !!}
                        {!! Form::text('name',null, ['class'=>'form-control']) !!}

                    </div>
                    <div class="form-group">
                        {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
                    </div>
            {!! Form::Close() !!}


    </div>

    <div class="col-sm-6">

        @if($categories)
         <table class="table table-condensed">
            <thead>
               <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Created At</th>
               </tr>
             </thead>
             <tbody>
             @foreach($categories as $category)
               <tr>
                 <td>{{$category->id}}</td>
                 <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
                 <td>{{$category->created_at ? $category->created_at->diffForHumans() : "No Date Found"}}</td>
               </tr>
             @endforeach
            </tbody>
          </table>
        @endif

    </div>
@stop