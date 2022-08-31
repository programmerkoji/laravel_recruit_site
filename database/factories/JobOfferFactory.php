<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\JobArea;
use App\Models\JobCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobOfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => Company::factory(),
            'job_category_id' => JobCategory::factory(),
            'job_area_id' => JobArea::factory(),
            'posting_start' => $this->faker->dateTimeBetween($startDate = '-1week', $endDate = '1week')->format('Y/m/d'),
            'posting_end' => $this->faker->dateTimeBetween($startDate = '2week', $endDate = '4week')->format('Y/m/d'),
            'title' => $this->faker->realText(50),
            'employment_status' => $this->faker->word(),
            'salary' => $this->faker->numberBetween(180000, 300000),
        ];
    }
}
