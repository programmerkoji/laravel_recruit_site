<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'name' => '株式会社テスト',
                'post_code' => '123-4567',
                'address' => 'テスト市テスト町1-1',
                'tel' => '03-1234-5678',
                'email' => 'test@test.com',
                'foundation' => '2000-01-01',
                'ceo_name' => 'テスト太郎',
                'stuff_name' => 'テスト担当',
                'capital' => '10000000',
                'employee_number' => '30',
                'note' => 'テスト投稿です。',
            ],
            [
                'name' => '株式会社テスト02',
                'post_code' => '234-5678',
                'address' => 'テスト市テスト町2-2',
                'tel' => '06-1234-5678',
                'email' => 'test02@test.com',
                'foundation' => '2000-01-01',
                'ceo_name' => 'テスト太郎02',
                'stuff_name' => 'テスト担当02',
                'capital' => '10000000',
                'employee_number' => '10',
                'note' => 'テスト投稿です。02',
            ],
            [
                'name' => '株式会社テスト03',
                'post_code' => '345-6789',
                'address' => 'テスト市テスト町3-3',
                'tel' => '03-3456-7890',
                'email' => 'test03@test.com',
                'foundation' => '2000-03-03',
                'ceo_name' => 'テスト太郎03',
                'stuff_name' => 'テスト担当03',
                'capital' => '1000000',
                'employee_number' => '5',
                'note' => null,
            ],
            [
                'name' => '株式会社テスト04',
                'post_code' => '345-6789',
                'address' => 'テスト市テスト町3-3',
                'tel' => '03-3456-7890',
                'email' => 'test04@test.com',
                'foundation' => '2000-03-03',
                'ceo_name' => 'テスト太郎03',
                'stuff_name' => 'テスト担当04',
                'capital' => '1000000',
                'employee_number' => '5',
                'note' => null,
            ],
            [
                'name' => '株式会社テスト05',
                'post_code' => '345-6789',
                'address' => 'テスト市テスト町3-3',
                'tel' => '03-3456-7890',
                'email' => 'test05@test.com',
                'foundation' => '2000-03-03',
                'ceo_name' => 'テスト太郎05',
                'stuff_name' => 'テスト担当05',
                'capital' => '1000000',
                'employee_number' => '5',
                'note' => null,
            ],
            [
                'name' => '株式会社テスト06',
                'post_code' => '345-6789',
                'address' => 'テスト市テスト町3-3',
                'tel' => '03-3456-7890',
                'email' => 'test06@test.com',
                'foundation' => '2000-03-03',
                'ceo_name' => 'テスト太郎06',
                'stuff_name' => 'テスト担当06',
                'capital' => '1000000',
                'employee_number' => '5',
                'note' => null,
            ],
        ]);
    }
}
