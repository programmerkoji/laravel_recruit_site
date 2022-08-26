<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobOffer;
use Carbon\Carbon;

class BookmarkController extends Controller
{
    public function store($jobOfferId)
    {
        $user = \Auth::user();
        if (!$user->is_bookmark($jobOfferId)) {
            $user->bookmark_job_offers()->attach($jobOfferId);
        }
        return back();
    }

    public function destroy($jobOfferId) {
        $user = \Auth::user();
        if ($user->is_bookmark($jobOfferId)) {
            $user->bookmark_job_offers()->detach($jobOfferId);
        }
        return back();
    }
}
