<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\JobCategory;
use App\Models\JobArea;
use App\Models\Image;

class JobOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'job_category_id',
        'job_area_id',
        'title',
        'employment_status',
        'salary',
        'email',
        'job_time',
        'job_content',
        'welfare',
        'holiday',
        'qualification',
        'recruitment_count',
        'is_publish',
        'free_text',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function job_category()
    {
        return $this->belongsTo(JobCategory::class);
    }

    public function job_area()
    {
        return $this->belongsTo(JobArea::class);
    }
}
