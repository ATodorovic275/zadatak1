<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        // $users = User::with(['projects'])->get();
        // $users = User::with(['projects'])->where('users.id', '8')->get();

        $users = DB::table('users')
            ->select(['users.name as user', 'users.email', 'projects.name as project', 'project_assignments.id as pAssignment'])
            ->join('project_assignments', 'users.id', 'project_assignments.user_id')
            ->join('projects', 'project_assignments.project_id', 'projects.id')
            // ->join('user_tasks', 'project_assignments.user_id', 'user_tasks.id')
            // ->join('tasks', 'user_tasks.task_id', 'users.id')
            // ->where('users.id', '8')
            ->get();

        // dd($users);
        foreach ($users as $user) {
            $idProjectAssignment = $user->pAssignment;
            $tasks = DB::table('tasks')
                ->select('tasks.name')
                ->join('user_tasks', 'tasks.id', 'user_tasks.task_id')
                ->join('project_assignments', 'user_tasks.project_assignment_id', 'project_assignments.id')
                ->where('project_assignments.id', $idProjectAssignment)
                ->get();
            // dd($tasks);
            $user->tasks = $tasks;
            // dd($idProjectAssignment);
            // $tasks = DB
        }
        // dd($users);

        return view('home', ['users' => $users]);
    }
}
