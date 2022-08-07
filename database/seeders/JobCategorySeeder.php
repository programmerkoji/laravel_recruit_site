<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_categories')->insert([
            [
                'category_name' => 'Webディレクター',
            ],
            [
                'category_name' => 'Webデザイナー',
            ],
            [
                'category_name' => 'WordPressエンジニア',
            ],
            [
                'category_name' => 'Webライター',
            ],
            [
                'category_name' => 'Webマーケター',
            ],
        ]);
    }
}
