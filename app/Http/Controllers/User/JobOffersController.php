<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JobOffer;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JobOffersController extends Controller
{
    public function index(Request $request)
    {
        $areas = $request->area;
        $categories = $request->category;
        $keyword = $request->keyword;
        $sort = $request->sort;

        $date = Carbon::today();

        $query = JobOffer::with(['company', 'job_category', 'job_area', 'image'])
        ->whereDate('posting_start', '<=' , $date)
        ->whereDate('posting_end', '>=' , $date)
        ->orderBy('posting_start', 'desc');

        if (!empty($areas)) {
            $query->whereHas('job_area', function ($q) use($areas) {
                $q->whereIn('id', $areas);
            });
        }
        if (!empty($categories)) {
            $query->whereHas('job_category', function ($q) use($categories) {
                $q->whereIn('id', $categories);
            });
        }
        if (!empty($keyword)) {
            $query->where(function ($q) use($keyword) {
                $q->where('job_content', 'like', '%' . $keyword . '%');
                $q->orWhere('free_text', 'like', '%' . $keyword . '%');
            });
        }
        $job_offers = $query->paginate(10);

        $job_areas = JobOffer::with(['job_area'])
        ->whereDate('posting_start', '<=' , $date)
        ->whereDate('posting_end', '>=' , $date)
        ->groupBy('job_area_id')
        ->get('job_area_id');

        $job_categories = JobOffer::with(['job_category'])
        ->whereDate('posting_start', '<=' , $date)
        ->whereDate('posting_end', '>=' , $date)
        ->groupBy('job_category_id')
        ->get('job_category_id');

        $employment_status = JobOffer::where('is_publish', true)
        ->groupBy('employment_status')
        ->get('employment_status');

        return view('user.index', compact('job_offers', 'keyword', 'job_areas', 'job_categories', 'employment_status'));
    }

    public function show($id)
    {
        $jobOfferInfo = JobOffer::findOrFail($id);

        return view('user.show', compact('jobOfferInfo'));
    }
}
