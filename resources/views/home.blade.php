@extends('layout')
@section('content')
    <div class="container"><div class="row">
        <div class="col-lg-12 mx-auto mt-5">
            <a name="" id="" class="btn btn-primary mb-3" href="{{route('assignment')}} " role="button">Assignment page</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Korisnik</th>
                        <th>Email</th>
                        <th>Projekat</th>
                        <th>Zadaci</th>
                    </tr>
                </thead>
                <tbody>
                
                    @foreach ($users as $key => $u)
                        <tr>
                            <td>{{$key+1}} </td>
                            <td>{{$u->user}}</td>
                            <td>
                                {{$u->email}}
                            </td>
                            <td>
                                {{$u->project}}
                            </td>
                            <td>
                               @foreach ($u->tasks as $task)
                                   {{$task->name}},
                               @endforeach
                            </td>
                        </tr>
                    @endforeach
                
               
                </tbody>
            </table>
        </div>
    </div></div>
@endsection