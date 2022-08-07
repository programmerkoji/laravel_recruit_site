<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobOffer;

class JobCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
    ];

    public function job_offer()
    {
        return $this->hasOne(JobOffer::class);
    }
}
