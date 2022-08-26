<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\JobCategory;
use App\Models\JobArea;
use App\Models\Image;
use App\Models\Bookmark;

class JobOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
        'job_category_id',
        'job_area_id',
        'posting_start',
        'posting_end',
        'is_publish',
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
        'free_text',
    ];

    protected $dates = [
        'posting_start',
        'posting_end',
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

    public function bookmarks()
    {
        return $this->hasMany(Bookmark::class);
    }

    public static function getAreas()
    {
        $job_areas = JobOffer::with(['job_area'])
        ->postingPeriod()
        ->groupBy('job_area_id')
        ->get('job_area_id');

        return $job_areas;
    }

    public static function getCategories()
    {
        $job_categories = JobOffer::with(['job_category'])
        ->postingPeriod()
        ->groupBy('job_category_id')
        ->get('job_category_id');

        return $job_categories;
    }

    public function scopePostingPeriod($query)
    {
        $query->whereDate('posting_start', '<=' , today())
        ->whereDate('posting_end', '>=' , today());
    }
}
