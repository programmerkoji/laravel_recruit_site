<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_areas')->insert([
            [
                'area_name' => '千代田区',
            ],
            [
                'area_name' => '中央区',
            ],
            [
                'area_name' => '港区',
            ],
            [
                'area_name' => '新宿区',
            ],
            [
                'area_name' => '文京区',
            ],
            [
                'area_name' => '台東区',
            ],
            [
                'area_name' => '墨田区',
            ],
            [
                'area_name' => '江東区',
            ],
            [
                'area_name' => '品川区',
            ],
            [
                'area_name' => '目黒区',
            ],
            [
                'area_name' => '太田区',
            ],
            [
                'area_name' => '世田谷区',
            ],
            [
                'area_name' => '渋谷区',
            ],
            [
                'area_name' => '中野区',
            ],
            [
                'area_name' => '杉並区',
            ],
            [
                'area_name' => '豊島区',
            ],
            [
                'area_name' => '北区',
            ],
            [
                'area_name' => '荒川区',
            ],
            [
                'area_name' => '板橋区',
            ],
            [
                'area_name' => '練馬区',
            ],
            [
                'area_name' => '足立区',
            ],
            [
                'area_name' => '葛飾区',
            ],
            [
                'area_name' => '江戸川区',
            ],
        ]);
    }
}
