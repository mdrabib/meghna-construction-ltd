<?php

namespace Database\Seeders;

use App\Models\worker;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $worker=[
            [
                'name' => 'Kamal',
                'nid_birth_Cirtificate' => '895469875',
                'dob' => Carbon::now(),
                'status' => 1,
                'created_by' => 1,
            ],
            [
                'name' => 'Riyaj',
                'nid_birth_Cirtificate' => '578223648',
                'dob' => Carbon::now(),
                'status' => 1,
                'created_by' => 2,
            ],
            [
                'name' => 'Shahabuddin',
                'nid_birth_Cirtificate' => '685947892',
                'dob' => Carbon::now(),
                'status' => 1,
                'created_by' => 3,
            ],
        ];
        foreach($worker as $key => $value){

            worker::create($value);
        }
    }
}
