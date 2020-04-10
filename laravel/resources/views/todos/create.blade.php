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
                     <h1>Create Todo</h1>
                    {!! Form::open(['action' => 'TodosController@store','method' => 'POST']) !!}
                        <div class="form-group">
                            {{Form::label('title','Title')}}
                            {{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('description','Descrption')}}
                            {{Form::textarea('description','',['class'=>'form-control','placeholder'=>'Descrption'])}}
                        </div>
                        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection