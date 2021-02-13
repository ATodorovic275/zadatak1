<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function projectAssignment()
    {
        return $this->belongsToMany(AssignmentModel::class, 'user_tasks')->withTimestamps();
    }
}
