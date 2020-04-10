@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="/todos" class="btn btn-success">Back</a>
                </div>
                

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h3>{{$todo->title}}</h3>
                    <p>{{$todo->description}}</p>
                    <hr>
                    <a href="/todos/{{$todo->id}}/edit">Edit</a>
                    {!!Form::open(['action'=>['TodosController@destroy',$todo->id,'method'=>'POST'],'class'=>'pull-right'])!!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('delete',['class'=>'btn btn-danger pull-right'])}}
                    {!!Form::close()!!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection