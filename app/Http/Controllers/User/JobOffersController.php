<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JobOffer;
use App\Models\image;
use App\Models\Company;
use App\Models\JobCategory;
use App\Models\JobArea;
use Illuminate\Http\Request;

class JobOffersController extends Controller
{
    public function index()
    {
        $job_offers = JobOffer::with(['company', 'job_category', 'job_area', 'image'])->where('is_publish', true)->get();
        $job_areas = JobOffer::with(['job_area'])->where('is_publish', true)->groupBy('job_area_id')->get('job_area_id');
        $job_categories = JobOffer::with(['job_category'])->where('is_publish', true)->groupBy('job_category_id')->get('job_category_id');
        $employment_status = JobOffer::where('is_publish', true)->groupBy('employment_status')->get('employment_status');

        return view('user.index', compact('job_offers', 'job_areas', 'job_categories', 'employment_status'));
    }
}
