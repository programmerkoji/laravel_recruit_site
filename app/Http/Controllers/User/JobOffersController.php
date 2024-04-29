<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JobOffer;
use App\Models\JobArea;
use App\Models\JobCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JobOffersController extends Controller
{
    public function index(Request $request)
    {
        $areas = $request->area;
        $categories = $request->category;
        $keyword = $request->keyword;

        $areaDatas = JobArea::whereIn('id', $areas ?? [])->get();
        $categoryDatas = JobCategory::whereIn('id', $categories ?? [])->get();

        $query = JobOffer::with(['company', 'job_category', 'job_area', 'image'])->postingPeriod()->orderBy('posting_start', 'desc');

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
                $q->orWhere('title', 'like', '%' . $keyword . '%');
            })->orWhereHas('company', function ($q) use ($keyword) {
                $q->where('name', 'like', '%' . $keyword . '%');
            })->orWhereHas('job_category', function ($q) use ($keyword) {
                $q->where('category_name', 'like', '%' . $keyword . '%');
            })->orWhereHas('job_area', function ($q) use ($keyword) {
                $q->where('area_name', 'like', '%' . $keyword . '%');
            });
        }
        $job_offers = $query->paginate(10)->withQueryString();

        $job_areas = JobOffer::getAreas();

        $job_categories = JobOffer::getCategories();

        return view('user.index', compact('job_offers', 'keyword', 'job_areas', 'job_categories', 'areaDatas', 'categoryDatas'));
    }

    public function show($id)
    {
        $jobOfferInfo = JobOffer::findOrFail($id);

        return view('user.show', compact('jobOfferInfo'));
    }

    public function bookmark_job_offers(Request $request)
    {
        $areas = $request->area;
        $categories = $request->category;

        $areaDatas = JobArea::whereIn('id', $areas ?? [])->get();
        $categoryDatas = JobCategory::whereIn('id', $categories ?? [])->get();

        $job_offers = \Auth::user()->bookmark_job_offers()->postingPeriod()->orderBy('posting_start', 'desc')->paginate(10);

        $job_areas = JobOffer::getAreas();

        $job_categories = JobOffer::getCategories();

        return view('user.bookmarks', compact('job_offers', 'job_areas', 'job_categories', 'areaDatas', 'categoryDatas'));
    }
}
