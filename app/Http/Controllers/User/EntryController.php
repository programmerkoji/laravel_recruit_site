<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\EntryFormRequest;
use Illuminate\Http\Request;
use App\Models\JobOffer;
use App\Mail\ContactSendmail;
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
            //入力されたメールアドレスにメールを送信
            Mail::to($inputs['email'])->send(new ContactSendmail($inputs));
            //再送信を防ぐためにトークンを再発行
            $request->session()->regenerateToken();

            return view('user.thanks', compact('jobOfferInfo'));
        }
        // return view('user.thanks');
    }
}
