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
                'job_category_id' => 1,
                'job_area_id' => 4,
                'posting_start' => '2022/08/18',
                'posting_end' => '2022/08/31',
                'is_publish' => true,
                'title' => '人材募集',
                'employment_status' => '正社員',
                'salary' => '25万円',
                'job_time' => '9:00〜18:00',
                'job_content' => '仕事内容01',
                'welfare' => '有給',
                'holiday' => '土日祝',
                'qualification' => '普通自動車運転免許',
                'recruitment_count' => 5,
                'free_text' => 'テスト投稿です。',
                'created_at' => '2022/08/01 11:11:11',
            ],
            [
                'company_id' => 2,
                'job_category_id' => 2,
                'job_area_id' => 10,
                'posting_start' => '2022/08/26',
                'posting_end' => '2022/09/08',
                'is_publish' => true,
                'title' => '人材募集02',
                'employment_status' => '正社員、パート',
                'salary' => '25万円、パート：時給1,000円',
                'job_time' => '9:00〜18:00',
                'job_content' => '仕事内容02',
                'welfare' => '有給',
                'holiday' => '土日祝',
                'qualification' => '普通自動車運転免許',
                'recruitment_count' => 5,
                'free_text' => 'テスト投稿です。02',
                'created_at' => '2022/08/01 11:11:11',
            ],
            [
                'company_id' => 1,
                'job_category_id' => 3,
                'job_area_id' => 18,
                'posting_start' => '2022/08/12',
                'posting_end' => '2022/08/25',
                'is_publish' => true,
                'title' => '人材募集03',
                'employment_status' => '契約社員',
                'salary' => '25万円',
                'job_time' => '10:00〜19:00',
                'job_content' => '仕事内容03',
                'welfare' => '有給',
                'holiday' => '土日祝',
                'qualification' => '普通自動車運転免許',
                'recruitment_count' => 5,
                'free_text' => 'テスト投稿です。03',
                'created_at' => '2022/08/01 11:11:11',
            ],
            [
                'company_id' => 1,
                'job_category_id' => 3,
                'job_area_id' => 18,
                'posting_start' => '2022/08/1',
                'posting_end' => '2022/08/14',
                'is_publish' => true,
                'title' => '人材募集03',
                'employment_status' => '契約社員',
                'salary' => '25万円',
                'job_time' => '10:00〜19:00',
                'job_content' => '仕事内容03',
                'welfare' => '有給',
                'holiday' => '土日祝',
                'qualification' => '普通自動車運転免許',
                'recruitment_count' => 5,
                'free_text' => 'テスト投稿です。03',
                'created_at' => '2022/08/01 11:11:11',
            ],
        ]);
    }
}
