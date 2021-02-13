<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = 5;
        for ($i = 1; $i <= $projects; $i++) {
            Project::create(['name' => 'Project ' . $i]);
        }
    }
}
