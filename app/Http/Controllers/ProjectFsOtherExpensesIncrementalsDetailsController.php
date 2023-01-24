<?php

namespace App\Http\Controllers;

use App\Models\ProjectFsOtherExpensesIncrementalsDetails;
use App\Http\Requests\StoreProjectFsOtherExpensesIncrementalsDetailsRequest;
use App\Http\Requests\UpdateProjectFsOtherExpensesIncrementalsDetailsRequest;
use App\Models\admin\Project;
use App\Models\ProjectFsOtherExpensesIncrementals;
use DateTime;

class ProjectFsOtherExpensesIncrementalsDetailsController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectFsOtherExpensesIncrementalsDetailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectFsOtherExpensesIncrementalsDetailsRequest $request,$pro_id)
    {
        $counRequest = count($request->all());
        // dd($request->all());
        if ($counRequest == 1) {
            $result = ProjectFsOtherExpensesIncrementals::where('project_id', $pro_id)->delete();
            $previos = ProjectFsOtherExpensesIncrementalsDetails::where('project_id',$pro_id)->delete();
            $projectFsOtherExpensesIncremental = ProjectFsOtherExpensesIncrementals::query()->updateOrCreate([
                'project_id'   => $pro_id,
            ], [
                'project_id' => $pro_id,
                'incremental' => $request->one_value_incremental_other_expenses,
            ]);
            // dd($request->all());
            $result = ProjectFsOtherExpensesIncrementalsDetails::where('other_expenses_id', $projectFsOtherExpensesIncremental->id)->delete();

            foreach (years($pro_id)['years'] as $year) {
                ProjectFsOtherExpensesIncrementalsDetails::query()->create([
                    'project_id' => $pro_id,
                    'other_expenses_id' => $projectFsOtherExpensesIncremental->id,
                    'year' => $year,
                    'incremental' => $projectFsOtherExpensesIncremental->incremental,
                ]);
            }
        } else {
            // dd($request->all());
            $data = $request->only([
                'year', 'id', 'one_value_incremental_other_expenses', 'value_incremental_other_expenses' , 'project_id'
            ]);
            // dd($data);
            $previos = ProjectFsOtherExpensesIncrementalsDetails::where('project_id',$pro_id)->delete();
            foreach ($data['year'] as $key => $year) {
                ProjectFsOtherExpensesIncrementalsDetails::create([
                    'other_expenses_id' => $data['id'],
                    'year' => $year,
                    'project_id' => $pro_id,
                    'incremental' => $data['value_incremental_other_expenses'][$key],
                ]);
            }

            }
            $project = Project::where('id', $pro_id)->first();

            $projectStartDate = new DateTime($project->start_date);

            $operationDate = date('Y-m-d', strtotime("+" . $project->development_duration . " months", strtotime($project->start_date)));

            $year = date('Y', strtotime($operationDate));

            $yearEnd = date('Y-m-d', strtotime('12/31/' . $year));

            $datediff = strtotime($yearEnd) - strtotime($operationDate);

            $remainingDays =  round($datediff / (60 * 60 * 24));

            $remainingmonths =  round($datediff / (60 * 60 * 24 * 30));
            $data = ProjectFsOtherExpensesIncrementalsDetails::where('project_id', $pro_id)->get();
            $totleIncomeMounth = 0;
            $totleIncomeToEndYear = 0;
            $totleIncomeYear = 0;
            foreach ($data as $dataa) {
                $totleIncomeMounth += ($dataa->value * $dataa->quantity);
                $totleIncomeToEndYear += ($dataa->value * $dataa->quantity) * $remainingmonths;
                $totleIncomeYear += ($dataa->value * $dataa->quantity) * 12;
            };


        return response()->json([
                'message' => 'success', 'data' => $data, 'status' => 1 ,
                'remainingmonths' => $remainingmonths, 'totleIncomeMounth' => $totleIncomeMounth, 'totleIncomeToEndYear' => $totleIncomeToEndYear, 'totleIncomeYear' => $totleIncomeYear,
                'success' => 'تم تخزين البيانات بنجاح'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectFsOtherExpensesIncrementalsDetails  $projectFsOtherExpensesIncrementalsDetails
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectFsOtherExpensesIncrementalsDetails $projectFsOtherExpensesIncrementalsDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectFsOtherExpensesIncrementalsDetails  $projectFsOtherExpensesIncrementalsDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectFsOtherExpensesIncrementalsDetails $projectFsOtherExpensesIncrementalsDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectFsOtherExpensesIncrementalsDetailsRequest  $request
     * @param  \App\Models\ProjectFsOtherExpensesIncrementalsDetails  $projectFsOtherExpensesIncrementalsDetails
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectFsOtherExpensesIncrementalsDetailsRequest $request, ProjectFsOtherExpensesIncrementalsDetails $projectFsOtherExpensesIncrementalsDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectFsOtherExpensesIncrementalsDetails  $projectFsOtherExpensesIncrementalsDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectFsOtherExpensesIncrementalsDetails $projectFsOtherExpensesIncrementalsDetails)
    {
        //
    }
}
