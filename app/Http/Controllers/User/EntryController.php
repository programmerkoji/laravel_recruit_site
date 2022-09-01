<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntryFormRequest;
use Illuminate\Http\Request;
use App\Models\JobOffer;
use App\Mail\UserEntrymail;
use App\Mail\ToCompanyMail;
use App\Models\Entry;
use Illuminate\Support\Facades\Mail;

class EntryController extends Controller
{
    public function index($id)
    {
        $jobOfferInfo = JobOffer::findOrFail($id);

        return view('user.entry', compact('jobOfferInfo'));
    }

    public function confirm(EntryFormRequest $request, $id)
    {
        $jobOfferInfo = JobOffer::findOrFail($id);
        $entry = $request->all();

        return view('user.confirm', compact('jobOfferInfo', 'entry'));
    }

    public function send(EntryFormRequest $request, $id)
    {
        $jobOfferInfo = JobOffer::findOrFail($id);

        $action = $request->input('action');

        $inputs = $request->except('action');

        if($action !== 'submit') {
            return redirect()->route('user.entry', ['job_offer' => $jobOfferInfo->id])->withInput($inputs);
        } else {
            Mail::to($inputs['email'])->send(new UserEntrymail($inputs, $jobOfferInfo));
            Mail::to($jobOfferInfo->company->email)->send(new ToCompanyMail($inputs, $jobOfferInfo));

            Entry::create($request->all());

            //再送信を防ぐためにトークンを再発行
            $request->session()->regenerateToken();

            return view('user.thanks', compact('jobOfferInfo'));
        }
    }
}
