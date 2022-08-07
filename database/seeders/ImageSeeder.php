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
                'company_id' => 1,
                'file_name' => 'jobImages/sample1.jpg',
                'title' => '企業1の画像',
            ],
            [
                'company_id' => 2,
                'file_name' => 'jobImages/sample2.jpg',
                'title' => '企業2の画像',
            ],
            [
                'company_id' => 1,
                'file_name' => 'jobImages/sample3.jpg',
                'title' => '企業1の画像02',
            ],
            [
                'company_id' => 3,
                'file_name' => 'jobImages/sample4.jpg',
                'title' => '企業3の画像',
            ],
            [
                'company_id' => 2,
                'file_name' => 'jobImages/sample5.jpg',
                'title' => '企業2の画像02',
            ],
        ]);
    }
}
