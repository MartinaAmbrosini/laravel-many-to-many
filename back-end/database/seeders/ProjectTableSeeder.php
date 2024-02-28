<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use App\Models\Project;


class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::factory()
            ->count(20)
            ->make()
            ->each(function ($projects) {

                $types = Type::inRandomOrder()->first();
                $projects->type()->associate($types);

                $projects->save();
            });
    }
}
