<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class AssignmentModel extends Pivot
{
    use HasFactory;

    protected $table = 'project_assignments';

    public function tasks()
    {
        return $this->belongsToMany(Task::class, 'user_tasks', 'project_assignment_id')->withTimestamps();
    }
}
