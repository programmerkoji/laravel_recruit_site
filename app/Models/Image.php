<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobOffer;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_offer_id',
        'file_name',
        'title',
    ];

    public function job_offer()
    {
        return $this->belongsTo(JobOffer::class);
    }
}
