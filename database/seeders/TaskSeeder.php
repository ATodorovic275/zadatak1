<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tasks = 5;
        for ($i = 1; $i <= $tasks; $i++) {
            Task::create(['name' => 'Task ' . $i]);
        }
    }
}
