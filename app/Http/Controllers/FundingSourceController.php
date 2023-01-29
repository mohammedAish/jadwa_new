<?php

namespace App\Http\Controllers;

use App\Models\CapitalStructure;
use App\Models\FundingSource;
use App\Http\Controllers\Controller;
use App\Models\admin\Project;
use App\Models\LoanDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\FsStartupCost;
use App\Models\BalanceProjects;
use App\Models\FsWorkingCapital;

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
    public function create($pro_id)
    {
        $project=Project::findOrFail($pro_id);

        $fundingSources=FundingSource::where('project_id',$pro_id)->get();
        $capitalStructures=CapitalStructure::where('project_id',$pro_id)->get();
        $loanDetails=LoanDetail::where('project_id',$pro_id)->get();
        $startupCosts = FsStartupCost::where('project_id',$pro_id)->get();
        $sumCost=0;
        foreach ($startupCosts as $cost){
            $sumCost+=$cost->cost;
        }

       $currentYear = date('Y', strtotime('12/31'));

        $dataYearCurrent = BalanceProjects::where('project_id',$pro_id)->where('purchase_year',$currentYear)->get();
      $sumTotleCostCurrent=0;
        foreach($dataYearCurrent as $dataYearCurrents){
        $sumTotleCostCurrent +=$dataYearCurrents->cost * $dataYearCurrents->quantity;
    }

        $estimatedCostProject =$sumCost + fsWorkingCapital($pro_id)['totleOfWorkingCapital']+$sumTotleCostCurrent;
       return view('admin.FundingSource.create')->with([
           'fundingSources'=>$fundingSources,
           'capitalStructures'=>$capitalStructures,
           'loanDetails'=>$loanDetails,
           'project'=>$project,
           'estimatedCostProject' => $estimatedCostProject,
       ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$pro_id)
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
            $fundingSource = FundingSource::query()->where('project_id',$pro_id)->first();
            if (isset($fundingSource)){
                FundingSource::where('project_id',$pro_id)->update([
                    'project_id' => 1,
                    'minimum_cash' => $data['minimum_cash'],
                    'interest_rate' => $data['interest_rate'],
                ]);
            }else{
                FundingSource::query()->create([
                    'project_id' => 1,
                    'minimum_cash' => $data['minimum_cash'],
                    'interest_rate' => $data['interest_rate'],
                ]);
                }

        }

      //dd($estimatedCostProject);
        return response()->json(['status' => $pro_id, 'success' => 'تم  بنجاح']);


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
