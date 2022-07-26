<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\JobOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
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

        $query = Image::with('job_offer');

        if (!empty($keyword)) {
            $query->whereHas('job_offer', function ($q) use($keyword) {
                $q->where('name', 'like', '%' . $keyword . '%');
            });
        }
        $images = $query->paginate(12);

        return view('admin.images.index', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $job_offers = JobOffer::select('id', 'title')->get();

        return view('admin.images.create', compact('job_offers'));
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
            'file_name' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageFile = $request->file('file_name');
        $filePath = isset($imageFile) ? $imageFile->store('jobImages', 'public') : '';

        Image::create([
            'job_offer_id' => $request->job_offer_id,
            'title' => $request->title,
            'file_name' => $filePath,
        ]);

        return redirect()
        ->route('admin.images.index')
        ->with('message', '画像を登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imageInfo = Image::findOrFail($id);

        return view('admin.images.edit', compact('imageInfo'));
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
        $imageInfo = Image::findOrFail($id);
        $imageInfo->update($request->all());

        return redirect()
        ->route('admin.images.index')
        ->with('message', '画像情報を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $filePath = 'public/'. $image->file_name;
        if(Storage::exists($filePath)){
            Storage::delete($filePath);
        }

        Image::findOrFail($id)->delete();

        return redirect()
        ->route('admin.images.index')
        ->with('message', '画像を削除しました');
    }
}
