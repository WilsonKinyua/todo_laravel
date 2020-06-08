
@extends('layouts.app')

@section('title')
   Todo Homepage
@endsection

@section('content')
    
   <div class="row justify-content-center">
    <div class="col-md-6">
        <div class="container">
            <h1 class="text-center my-3">TODOS PAGE</h1>
            <div class="card card-default">
                <div class="card-header">
                    Todos
                </div>
                @if (session("success"))
                    <div class="alert alert-success">
                            {{ session("success") }}
                    </div>

                @endif @if (session("danger"))
                <div class="alert alert-danger">
                        {{ session("danger") }}
                </div>
            @endif
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($todos as $todo)
                        <li class="list-group-item">{{$todo->name}}
                           @if (!$todo->completed)
                           <a href="/todos/{{$todo->id }}/complete" class="btn btn-warning btn-sm float-right">Completed</a> 
                           @endif
                            <a href="{{'/todos/'. $todo->id}}" class="btn btn-primary btn-sm float-right mr-2">View</a> 
                        </li>    
                        
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection