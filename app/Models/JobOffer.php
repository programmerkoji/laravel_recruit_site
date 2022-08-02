<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;

class JobOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_id',
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
}
