<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    public function create()
    {
        $users = User::all();
        $projects = Project::all();

        return view('assignment', ['projects' => $projects, 'users' => $users]);
    }
}
