@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">To do list: <a href="/todos/create" class="btn btn-success">Add new</a></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (count($todos) > 0)    
                        <table class="table table-striped">
                                <tr>
                                    <th> Title</th>
                                    <th>Description</th>
                                    <th>Date Created</th>
                                </tr>
                            @foreach ($todos as $todo)
                                <tr>
                                    <td>
                                    <a href="/todos/{{$todo->id}}">{{$todo->title}}</a>
                                    </td>

                                    <td>
                                        {{$todo->description}}
                                    </td>
                                    
                                    <td>
                                        {{$todo->created_at}}
                                    </td>

                                    
                                </tr>
                                    
                            @endforeach
                        </table>
                    @else
                        No Todos available
                    @endif    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection