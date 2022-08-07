<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JobOffer;
use App\Models\Company;
use Illuminate\Http\Request;

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
    public function index()
    {
        $job_offers = JobOffer::with('company')->select('id', 'title', 'company_id', 'is_publish')->get();

        return view('admin.job_offers.index', compact('job_offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::select('id', 'name')->get();

        return view('admin.job_offers.create', compact('companies'));
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
            'is_publish' => ['required', 'boolean'],
            'company_id' => ['required', 'integer'],
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

        return view('admin.job_offers.edit', compact('jobOfferInfo'));
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
            'is_publish' => ['required', 'boolean'],
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
