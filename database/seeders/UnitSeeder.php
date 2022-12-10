<?php

namespace Database\Seeders;

use App\Models\Builder\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit =  [
            [
                'name' => 'Rod',
                'quantity' => 1,
                'quantity_name' => 'kg',
                'created_by' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Sand',
                'quantity' => 50,
                'quantity_name' => 'feet',
                'created_by' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Cement',
                'quantity' => 50,
                'quantity_name' => 'kg',
                'created_by' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Light',
                'quantity' => 1,
                'quantity_name' => 'pice',
                'created_by' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Bambo',
                'quantity' => 1,
                'quantity_name' => 'pice',
                'created_by' => 1,
                'status' => 1,
            ],
        ];
        foreach ($unit as $key => $value) {

            Unit::create($value);
        }
    }
}
