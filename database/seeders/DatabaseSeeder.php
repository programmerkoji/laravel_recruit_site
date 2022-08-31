<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

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
        $this->call([
            AdminSeeder::class,
            CompanySeeder::class,
            JobCategorySeeder::class,
            JobAreaSeeder::class,
            JobOfferSeeder::class,
            ImageSeeder::class,
            UserSeeder::class,
        ]);
        // Company::factory(100)->create();
    }
}
