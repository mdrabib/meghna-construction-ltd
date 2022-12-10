<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        // User::factory()->create([
        //     'name'=>''
        // ]);

        $this->call([
            // DesignationSeeder::class,
            UserSeeder::class,
            CountrySeeder::class,
            DivisionsSeeder::class,
            DistrictSeeder::class,
            ProjectSeeder::class,
            LandsSeeders::class,
            FloorDetailsSeeder::class,
            UnitSeeder::class,
            WorkerSeeder::class,
            BuilderOptionSeeder::class,
            TeamSeeder::class,
        ]);
    }
}
