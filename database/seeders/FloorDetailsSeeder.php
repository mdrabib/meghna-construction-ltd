<?php

namespace Database\Seeders;

use App\Models\Builder\FloorDetails;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FloorDetailsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $floorDetails =  [
            [
                'floor_no' => '1',
                'total_squire_feet' => '1250',
                'total_cost'=> 1250000,
                'total_budget' => 1200000,
                'created_by' => 7,
                'status' => 1,
            ],
            [
                'floor_no' => '2',
                'total_squire_feet' => '1350',
                'total_cost'=> 1350000,
                'total_budget' => 1300000,
                'created_by' => 7,
                'status' => 1,
            ],
            [
                'floor_no' => '3',
                'total_squire_feet' => '1150',
                'total_cost'=> 1150000,
                'total_budget' => 1100000,
                'created_by' => 7,
                'status' => 1,
            ],
            [
                'floor_no' => '4',
                'total_squire_feet' => '1150',
                'total_cost'=> 1050000,
                'total_budget' => 1000000,
                'created_by' => 7,
                'status' => 1,
            ],
            [
                'floor_no' => '5',
                'total_squire_feet' => '1150',
                'total_cost'=> 1050000,
                'total_budget' => 1000000,
                'created_by' => 7,
                'status' => 1,
            ],
        ];
        foreach ($floorDetails as $key => $value) {

            FloorDetails::create($value);
        }
    }
}
