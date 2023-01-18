<?php

namespace App\Http\Controllers;

use App\Models\CapitalStructure;
use App\Models\FundingSource;
use App\Http\Controllers\Controller;
use App\Models\LoanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FundingSourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fundingSources=FundingSource::where('project_id',1)->get();
        $capitalStructures=CapitalStructure::where('project_id',1)->get();
        $loanDetails=LoanDetail::where('project_id',1)->get();
       return view('admin.FundingSource.create')->with([
           'fundingSources'=>$fundingSources,
           'capitalStructures'=>$capitalStructures,
           'loanDetails'=>$loanDetails,
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(), [
//            'minimum_cash' => 'required|numeric',
//            'interest_rate' => 'required|numeric',
        ], [
            'required' => 'هذا الحقل مطلوب',
            'numeric' => 'هذا الحقل  يجب ان يحتوي على رقم',
        ]);
        $data=$request->only(['minimum_cash','interest_rate']);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $fundingSource = FundingSource::query()->where('project_id',1)->first();
            if (isset($fundingSource)){
                FundingSource::where('project_id',1)->update([
                    'project_id' => 1,
                    'minimum_cash' => $data['minimum_cash'],
                    'interest_rate' => $data['interest_rate'],
                ]);
                return response()->json(['status' => 1, 'success' => 'تم التعديل بنجاح']);
            }else{
                FundingSource::query()->create([
                    'project_id' => 1,
                    'minimum_cash' => $data['minimum_cash'],
                    'interest_rate' => $data['interest_rate'],
                ]);
                return response()->json(['status' => 1, 'success' => 'تمت الاضافة بنجاح']);
                }

        }

       }





    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FundingSource  $fundingSource
     * @return \Illuminate\Http\Response
     */
    public function show(FundingSource $fundingSource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FundingSource  $fundingSource
     * @return \Illuminate\Http\Response
     */
    public function edit(FundingSource $fundingSource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FundingSource  $fundingSource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FundingSource $fundingSource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FundingSource  $fundingSource
     * @return \Illuminate\Http\Response
     */
    public function destroy(FundingSource $fundingSource)
    {
        //
    }
}
