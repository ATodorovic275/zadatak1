@extends('layout') @section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-6 mx-auto mt-5">
            <h2 class="text-center">Assignment</h2>

            <form action="{{route('assignment')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="projects">Projects</label>
                            <select
                                class="form-control"
                                name="project"
                                id="project"
                            >
                                @foreach ($projects as $project)
                                <option value="{{$project->id}} ">
                                    {{$project->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="users">Users</label>
                            <select
                                class="form-control"
                                name="user"
                                id="user"
                            >
                                @foreach ($users as $user)
                                <option value="{{$user->id}} ">
                                    {{$user->name}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button
                            type="submit"
                            class="btn btn-primary assign-btn"
                        >
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
