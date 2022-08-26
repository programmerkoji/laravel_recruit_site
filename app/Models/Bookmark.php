<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JobOffer;
use App\Models\User;

class Bookmark extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_offer_id',
    ];

    public function job_offer()
    {
        return $this->belongsTo(JobOffer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
