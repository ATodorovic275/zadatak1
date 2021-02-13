<?php

namespace App\Http\Controllers;

use App\Models\AssignmentModel;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks', ['tasks' => $tasks]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'tasks' => 'required'
        ]);

        $user = $request->session()->get('userProject')['user']->id;
        $project = $request->session()->get('userProject')['project']->id;
        $projectAssignment = AssignmentModel::where([
            ['user_id', $user],
            ['project_id', $project]
        ])->first();

        $tasks = $request->input('tasks');

        try {
            $projectAssignment->tasks()->attach($tasks);
        } catch (\Exception $ex) {
            return $ex->getMessage();
        }
    }
}
