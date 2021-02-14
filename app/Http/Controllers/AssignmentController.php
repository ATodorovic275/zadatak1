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

    public function store(Request $request)
    {
        $request->validate([
            'project' => 'not_in:0',
            'user' => 'not_in:0',
        ]);

        $userId = $request->input('user');
        $projectId = $request->input('project');

        try {
            $user = User::find($userId);
            $user->projects()->attach($projectId);

            $project = Project::find($projectId);

            $request->session()->put('userProject', ['user' => $user, 'project' => $project]);

            return redirect()->route('tasks-form');
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
