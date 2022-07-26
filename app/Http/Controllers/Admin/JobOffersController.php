<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobOffer;
use App\Models\Company;
use App\Models\JobCategory;
use App\Models\JobArea;
use Illuminate\Http\Request;
use Carbon\Carbon;

class JobOffersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $keyword = $request->keyword;

        $query = JobOffer::with('company')->select('id', 'title', 'company_id', 'posting_start', 'posting_end')->orderBy('created_at', 'desc');

        if (!empty($keyword)) {
            $query->where('title', 'like', '%' . $keyword . '%');
        }

        $job_offers = $query->paginate(10);

        $date = Carbon::today();

        return view('admin.job_offers.index', compact('job_offers', 'keyword', 'date'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::select('id', 'name')->get();
        $jobCategories = JobCategory::select('id', 'category_name')->get();
        $jobAreas = JobArea::select('id', 'area_name')->get();

        return view('admin.job_offers.create', compact('companies', 'jobCategories', 'jobAreas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => ['required', 'integer'],
            'job_category_id' => ['required', 'integer'],
            'job_area_id' => ['required', 'integer'],
            'posting_start' => ['required'],
            'posting_end' => ['required'],
            'title' => ['required', 'string'],
            'employment_status' => ['required', 'string'],
            'salary' => ['required', 'string'],
            'job_time' => ['required', 'string'],
            'job_content' => ['required', 'string'],
            'welfare' => ['required', 'string'],
            'holiday' => ['required', 'string'],
        ]);

        JobOffer::create($request->all());

        return redirect()
        ->route('admin.job_offers.index')
        ->with('message', '求人を登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jobOfferInfo = JobOffer::findOrFail($id);

        return view('admin.job_offers.show', compact('jobOfferInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobOfferInfo = JobOffer::findOrFail($id);
        $jobCategories = JobCategory::select('id', 'category_name')->get();
        $jobAreas = JobArea::select('id', 'area_name')->get();

        return view('admin.job_offers.edit', compact('jobOfferInfo', 'jobCategories', 'jobAreas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'employment_status' => ['required', 'string'],
            'salary' => ['required', 'string'],
            'job_time' => ['required', 'string'],
            'job_content' => ['required', 'string'],
            'welfare' => ['required', 'string'],
            'holiday' => ['required', 'string'],
        ]);

        $jobOfferInfo = JobOffer::findOrFail($id);
        $jobOfferInfo->update($request->all());

        return redirect()
        ->route('admin.job_offers.index')
        ->with('message', '求人を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        JobOffer::findOrFail($id)->delete();

        return redirect()
        ->route('admin.job_offers.index')
        ->with('message', '画像を削除しました');
    }
}
