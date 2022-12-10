<?php

namespace Database\Seeders;

use App\Models\Auth\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users =  [
            [
                'name' => 'Ashab Uddin',
                'email' => 'ashab@gmail.com',
                'phone' => '01' . Str::random(9),
                'password' => Crypt::encrypt('12345678'),
                'role_id' => 1,
                'language' => 'en',
                'status' => 1,
            ],
            [
                'name' => 'Jahid Rony',
                'email' => 'jahid@gmail.com',
                'phone' => '01356' . Str::random(9),
                'password' => Crypt::encrypt('12345678'),
                'role_id' => 1,
                'language' => 'en',
                'status' => 1,
            ],
            [
                'name' => 'Rabib Hasan',
                'email' => 'rabib1@gmail.com',
                'phone' => '01735' . Str::random(9),
                'password' => Crypt::encrypt('12345678'),
                'role_id' => 1,
                'language' => 'en',
                'status' => 1,
            ],
            
            [
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'phone' => '01' . Str::random(9),
                'password' => Crypt::encrypt('12345678'),
                'role_id' => 2,
                'language' => 'en',
                'status' => 1,
            ],
            [
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'phone' => '01' . Str::random(9),
                'password' => Crypt::encrypt('12345678'),
                'role_id' => 3,
                'language' => 'en',
                'status' => 1,
            ],
            [
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'phone' => '01' . Str::random(9),
                'password' => Crypt::encrypt('12345678'),
                'role_id' => 4,
                'language' => 'en',
                'status' => 1,
            ],
            [
                'name' => Str::random(10),
                'email' => Str::random(10) . '@gmail.com',
                'phone' => '01' . Str::random(9),
                'password' => Crypt::encrypt('12345678'),
                'role_id' => 5,
                'language' => 'en',
                'status' => 1,
            ],
        ];


        foreach ($users as $key => $value) {

            User::create($value);
        }
    }
}
