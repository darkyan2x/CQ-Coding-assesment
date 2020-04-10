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
                     <h1>Edit Post</h1>
                    {!! Form::open(['action' => ['TodosController@update', $todo->id],'method' => 'POST']) !!}
                        <div class="form-group">
                            {{Form::label('title','Title')}}
                            {{Form::text('title',$todo->title,['class'=>'form-control','placeholder'=>'Title'])}}
                        </div>

                        <div class="form-group">
                            {{Form::label('description','Descrption')}}
                            {{Form::textarea('description',$todo->description,['class'=>'form-control','placeholder'=>'Descrption'])}}
                        </div>
                        {{Form::hidden('_method','PUT')}}
                        {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection