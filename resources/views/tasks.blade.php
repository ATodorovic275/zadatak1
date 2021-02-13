@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto mt-5">
                <h2 class="text-center">{{session('user')['user']->name}} - {{session('user')['project']->name}}</h2>
                <form action="{{route('tasks')}}" method="post">
                    @csrf
                    @foreach ($tasks as $task)
                    <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="task" id="task" value="{{$task->id}}">{{$task->name}}
                        </label>
                      </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection