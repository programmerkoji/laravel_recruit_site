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
        'opening_time',
        'closing_time',
        'welfare',
        'job_content',
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
