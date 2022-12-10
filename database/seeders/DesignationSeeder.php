<?php

namespace Database\Seeders;

use App\Models\Builder\Designation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $designations =  [
            [
                'designation' => 'Senior Real Estate Specialist® (SRES®)',
                'identify' => 'senior_real_estate_specialist',
                'status' => 1,
            ],
        ];


        foreach ($designations as $key => $value) {

            Designation::create($value);
        }
    }
}
