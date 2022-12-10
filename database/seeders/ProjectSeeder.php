<?php

namespace Database\Seeders;

use App\Models\Projects\Project;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $project =  [
            [
                'project_name' => 'Sunmar',
                'start_date'=> Carbon::now(),
                'end_date' => Carbon::now(),
                'stage_id' => 1,
                'user_id' => 1,
                'created_by' => 1,
                'status' => 1,
            ],
            [
                'project_name' => 'CPDL',
                'start_date'=> Carbon::now(),
                'end_date' => Carbon::now(),
                'stage_id' => 1,
                'user_id' => 1,
                'created_by' => 1,
                'status' => 1,
            ],
            [
                'project_name' => 'Finlay Squire',
                'start_date'=> Carbon::now(),
                'end_date' => Carbon::now(),
                'stage_id' => 1,
                'user_id' => 1,
                'created_by' => 1,
                'status' => 1,
            ],
            [
                'project_name' => 'SP Tower',
                'start_date'=> Carbon::now(),
                'end_date' => Carbon::now(),
                'stage_id' => 1,
                'user_id' => 1,
                'created_by' => 1,
                'status' => 1,
            ],
            [
                'project_name' => 'Nurjahan Vila',
                'start_date'=> Carbon::now(),
                'end_date' => Carbon::now(),
                'stage_id' => 1,
                'user_id' => 1,
                'created_by' => 1,
                'status' => 1,
            ],
        ];
        foreach ($project as $key => $value) {

            Project::create($value);
        }
    }
}
