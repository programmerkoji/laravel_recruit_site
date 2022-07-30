<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompaniesController extends Controller
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
        $companies = Company::select('id', 'name', 'address', 'stuff_name')->get();

        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
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
            'name' => ['required', 'string', 'max:50'],
            'post_code' => ['required', 'string'],
            'address' => ['required', 'string'],
            'tel' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:companies'],
        ]);

        Company::create($request->all());

        return redirect()
        ->route('admin.companies.index')
        ->with('message', '企業を登録しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $companyInfo = Company::findOrFail($id);

        return view('admin.companies.show', compact('companyInfo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $companyInfo = Company::findOrFail($id);

        return view('admin.companies.edit', compact('companyInfo'));
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
            'name' => ['required', 'string', 'max:50'],
            'post_code' => ['required', 'string'],
            'address' => ['required', 'string'],
            'tel' => ['required', 'string'],
            'email' => ['required', 'string', 'email'],
        ]);

        $companyInfo = Company::findOrFail($id);
        $companyInfo->update($request->all());

        return redirect()
        ->route('admin.companies.index')
        ->with('message', '企業情報を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
