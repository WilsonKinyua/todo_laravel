@extends('layouts.app')

@section('title')

   Edit {{$todo->name}}
    
@endsection

@section('content')
    <h1 class="text-center my-5">Update Todos</h1>
    <div class="container">
        <div class="row justify-content-center">
                <div class="col-md-8">
                   <div class="card text-black bg-light">
                       <div class="card-header">
                           Please Create a Todo
                       </div>
                       <div class="container">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                           <ul class="list-group">
                             @foreach ($errors->all() as $error)
                              <li class="form-group-item">{{$error}}</li>
                             @endforeach
                           </ul>
                        </div>
                        @endif
                      </div>
                       <div class="card-body">
                        <form action="/todos/{{ $todo->id }}/update-todos" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Title: </label>
                                <input type="text" class="form-control" name="name" value="{{$todo->name}}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="body" cols="30" rows="10" class="form-control">{{$todo->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                       </div>
                   </div>
                </div>
        </div>
    </div>
    
@endsection