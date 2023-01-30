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
//        echo years_selling_and_marketing_expenses_of_revenue();
       $project=Project::findOrFail($pro_id);
        $marketing=fetch_marketing_details($pro_id);
        $numberOfyears=numberOfyears($pro_id);
        $firstYearEarnings=first_year_earnings($pro_id);
        $annualGrowthRateOfRevenuesDuringTheStudyPeriod=annual_growth_rate_of_revenues_during_the_study_period($pro_id);
        $TotalAnnualRevenuesDuringTheStudyPeriod=Table_of_total_annual_revenues_during_the_study_period($pro_id);
        $incomeData=incomeData($pro_id);
        $firstYearJob=first_year_job($pro_id);
        $changeNumberOfEmployee=change_number_of_employee($pro_id);
        $change_incremental_of_employee=change_incremental_of_employee($pro_id);
        $changeSalariesOfEmployee=change_salaries_of_employee($pro_id);
        $sumSummaryOfChangeOfSalaries=sum_summary_of_change_of_salaries($pro_id);
        $firstYearExpensesIncremental=first_year_expenses_incremental($pro_id);
        $totalFirstYearExpensesIncremental=Total_first_year_expenses_incremental($pro_id);
        $growthOfExpensesIncremental=growth_of_expenses_incremental($pro_id);
        $TotalExpensesIncremental=Total_expenses_incremental($pro_id);
        $firstYearAdministrativeExpenses=first_year_Administrative_expenses($pro_id);
        $growthOfAdministrativeExpenses=growth_of_Administrative_expenses($pro_id);
        $ToltalOfAdministraitiveExpenses=Toltal_Of_Administraitive_expenses($pro_id);
        $firstYearRent=first_year_rent($pro_id);
        $TotalOfRent=Total_of_rent($pro_id);
        $firstYearUtilitiesTable=first_year_utilities_table($pro_id);
        $totalOfUtilitiesTable=total_of_utilities_table($pro_id);
        return view('admin.report.index')->with([
            'project'=>$project,
            'incomeData'=>$incomeData,
            'marketing'=>$marketing,
            'firstYearEarnings'=>$firstYearEarnings,
            'numberOfyears'=>$numberOfyears,
            'annualGrowthRateOfRevenuesDuringTheStudyPeriod'=>$annualGrowthRateOfRevenuesDuringTheStudyPeriod,
            'TotalAnnualRevenuesDuringTheStudyPeriod'=>$TotalAnnualRevenuesDuringTheStudyPeriod,
            'firstYearJob'=>$firstYearJob,'changeNumberOfEmployee'=>$changeNumberOfEmployee,
            'change_incremental_of_employee'=>$change_incremental_of_employee,
            'changeSalariesOfEmployee'=>$changeSalariesOfEmployee,
            'sumSummaryOfChangeOfSalaries'=>$sumSummaryOfChangeOfSalaries,
            'firstYearExpensesIncremental'=>$firstYearExpensesIncremental,
            'totalFirstYearExpensesIncremental'=>$totalFirstYearExpensesIncremental,
            'growthOfExpensesIncremental'=>$growthOfExpensesIncremental,
            'TotalExpensesIncremental'=>$TotalExpensesIncremental,
            'firstYearAdministrativeExpenses'=>$firstYearAdministrativeExpenses,
            'growthOfAdministrativeExpenses'=>$growthOfAdministrativeExpenses,
            'ToltalOfAdministraitiveExpenses'=>$ToltalOfAdministraitiveExpenses,
            'firstYearRent'=>$firstYearRent,
            'TotalOfRent'=>$TotalOfRent,
            'firstYearUtilitiesTable'=>$firstYearUtilitiesTable,
            'totalOfUtilitiesTable'=>$totalOfUtilitiesTable,
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
