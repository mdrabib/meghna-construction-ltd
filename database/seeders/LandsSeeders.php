<?php

namespace Database\Seeders;

use App\Models\Lands\Land;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LandsSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // id 	created_at 	updated_at 	project_id 	land_area 	plot_area_counter 	building_area 	Building_area_counter 	building_height 	Building_height_counter 	house_no 	block 	road_no 	document_id 	design_id 	total_budget 	total_cost 	country_id 	division_id 	district_id 	status 	created_by 	updated_by 	deleted_at 	
        $lands =  [
            [
                'project_id' => '1',
                'land_area' => 3000,
                'plot_area_counter' => 'Squire Feet',
                'building_area' => 2500,
                'Building_area_counter' => 'Squire Feet',
                'building_height' => 150,
                'Building_height_counter' => 'Mitter',
                'house_no' => '5',
                'block' => 'B',
                'country_id' => 20,
                'division_id' => 2,
                'district_id' => 2,
                'created_by' => 1,
                'status' => 1,
            ],
            [
                'project_id' => '2',
                'land_area' => 1500,
                'plot_area_counter' => 'Squire Feet',
                'building_area' => 100,
                'Building_area_counter' => 'Squire Feet',
                'building_height' => 150,
                'Building_height_counter' => 'Mitter',
                'house_no' => '5',
                'block' => 'B',
                'country_id' => 20,
                'division_id' => 2,
                'district_id' => 2,
                'created_by' => 1,
                'status' => 1,
            ],
            [
                'project_id' => '3',
                'land_area' => 2200,
                'plot_area_counter' => 'Squire Feet',
                'building_area' => 200,
                'Building_area_counter' => 'Squire Feet',
                'building_height' => 150,
                'Building_height_counter' => 'Mitter',
                'house_no' => '5',
                'block' => 'B',
                'country_id' => 20,
                'division_id' => 2,
                'district_id' => 2,
                'created_by' => 1,
                'status' => 1,
            ],
            [
                'project_id' => '4',
                'land_area' => 2000,
                'plot_area_counter' => 'Squire Feet',
                'building_area' => 1800,
                'Building_area_counter' => 'Squire Feet',
                'building_height' => 34,
                'Building_height_counter' => 'Mitter',
                'house_no' => '5',
                'block' => 'B',
                'country_id' => 20,
                'division_id' => 2,
                'district_id' => 2,
                'created_by' => 1,
                'status' => 1,
            ],
            [
                'project_id' => '5',
                'land_area' => 2500,
                'plot_area_counter' => 'Squire Feet',
                'building_area' => 2300,
                'Building_area_counter' => 'Squire Feet',
                'building_height' => 80,
                'Building_height_counter' => 'Mitter',
                'house_no' => '5',
                'block' => 'B',
                'country_id' => 20,
                'division_id' => 2,
                'district_id' => 2,
                'created_by' => 1,
                'status' => 1,
            ],
        ];
        foreach ($lands as $key => $value) {

            Land::create($value);
        }
    }
}
