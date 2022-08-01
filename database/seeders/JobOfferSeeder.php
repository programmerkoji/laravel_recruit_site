<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JobOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_offers')->insert([
            [
                'company_id' => 1,
                'title' => '人材募集',
                'employment_status' => 1,
                'salary' => '25万円',
                'opening_time' => '9:00',
                'closing_time' => '18:00',
                'welfare' => '有給',
                'job_content' => '仕事内容01',
                'holiday' => '土日祝',
                'qualification' => '普通自動車運転免許',
                'recruitment_count' => 5,
                'is_publish' => true,
                'free_text' => 'テスト投稿です。',
                'created_at' => '2022/08/01 11:11:11',
            ],
            [
                'company_id' => 2,
                'title' => '人材募集02',
                'employment_status' => 1,
                'salary' => '25万円',
                'opening_time' => '9:00',
                'closing_time' => '18:00',
                'welfare' => '有給',
                'job_content' => '仕事内容02',
                'holiday' => '土日祝',
                'qualification' => '普通自動車運転免許',
                'recruitment_count' => 5,
                'is_publish' => false,
                'free_text' => 'テスト投稿です。02',
                'created_at' => '2022/08/01 11:11:11',
            ],
            [
                'company_id' => 1,
                'title' => '人材募集03',
                'employment_status' => 1,
                'salary' => '25万円',
                'opening_time' => '9:00',
                'closing_time' => '18:00',
                'welfare' => '有給',
                'job_content' => '仕事内容03',
                'holiday' => '土日祝',
                'qualification' => '普通自動車運転免許',
                'recruitment_count' => 5,
                'is_publish' => true,
                'free_text' => 'テスト投稿です。03',
                'created_at' => '2022/08/01 11:11:11',
            ],
        ]);
    }
}
