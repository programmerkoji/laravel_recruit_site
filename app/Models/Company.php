<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\JobOffer;
use App\Models\Image;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'post_code',
        'address',
        'tel',
        'email',
        'foundation',
        'ceo_name',
        'stuff_name',
        'capital',
        'employee_number',
        'note',
    ];

    public function job_offer()
    {
        return $this->hasMany(JobOffer::class);
    }

    public function image()
    {
        return $this->hasMany(Image::class);
    }
}
