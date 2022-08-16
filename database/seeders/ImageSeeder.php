<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            [
                'job_offer_id' => 1,
                'file_name' => 'jobImages/sample1.jpg',
                'title' => '求人1の画像',
            ],
            [
                'job_offer_id' => 2,
                'file_name' => 'jobImages/sample2.jpg',
                'title' => '求人2の画像',
            ],
            [
                'job_offer_id' => 3,
                'file_name' => 'jobImages/sample3.jpg',
                'title' => '求人3の画像',
            ],
        ]);
    }
}
