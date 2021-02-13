@extends('layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto mt-5">
                
                <h2 class="text-center">{{session('userProject')['user']->name}} - {{session('userProject')['project']->name}}</h2>
                
                <form action="{{route('tasks')}}" method="post">
                    @csrf
                    @foreach ($tasks as $task)
                    <div class="form-check">
                        <label class="form-check-label">
                          <input type="checkbox" class="form-check-input" name="tasks[]" id="task" value="{{$task->id}}">{{$task->name}}
                        </label>
                      </div>
                    @endforeach
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
                @if ($errors->any())
                <div class="alert alert-danger mt-3">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            </div>
        </div>
    </div>
@endsection