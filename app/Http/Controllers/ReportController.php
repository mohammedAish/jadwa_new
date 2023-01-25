<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\admin\Project;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pro_id)
    {

       $project=
//        echo years_selling_and_marketing_expenses_of_revenue();
//        $project=Project::findOrFail($pro_id);
        $marketing=fetch_marketing_details($pro_id);
        $numberOfyears=numberOfyears($pro_id);
        $annualGrowthRateOfRevenuesDuringTheStudyPeriod=annual_growth_rate_of_revenues_during_the_study_period($pro_id);
        return view('admin.report.index')->with([
            'marketing'=>$marketing,
            'numberOfyears'=>$numberOfyears,
        'annualGrowthRateOfRevenuesDuringTheStudyPeriod'=>$annualGrowthRateOfRevenuesDuringTheStudyPeriod,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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
