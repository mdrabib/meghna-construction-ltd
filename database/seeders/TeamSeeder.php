<?php

namespace Database\Seeders;

use App\Models\Management\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */ 
    // team_name 	team_leader 	worker_id 	builder_options_id
    public function run()
    {
        $team=[
            [
                'team_name' => 'Jamuna',
                'team_leader' => '1',
                'worker_id' => '1',
                'builder_options_id' => '1',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'team_name' => 'Megna',
                'team_leader' => '2',
                'worker_id' => '2',
                'builder_options_id' => '2',
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'team_name' => 'Podma',
                'team_leader' => '3',
                'worker_id' => '3',
                'builder_options_id' => '3',
                'status' => 1,
                'created_by' => 1,
            ],
        ];
        foreach($team as $key => $value){
            Team::create($value);
        }
    }
}
