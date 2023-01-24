<?php

namespace App\Http\Controllers;

use App\Models\ProjectFsGeneralExpensesIncrementals;
use App\Http\Requests\StoreProjectFsGeneralExpensesIncrementalsRequest;
use App\Http\Requests\UpdateProjectFsGeneralExpensesIncrementalsRequest;
use App\Models\admin\Project;
use App\Models\ProjectFsGeneralAdministrativeExpenses;
use App\Models\ProjectFsGeneralExpensesIncrementalsDetails;
use DateTime;

class ProjectFsGeneralExpensesIncrementalsController extends Controller
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
     * @param  \App\Http\Requests\StoreProjectFsGeneralExpensesIncrementalsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectFsGeneralExpensesIncrementalsRequest $request,$pro_id)
    {
        $counRequest = count($request->all());
        // dd($counRequest);
        if ($counRequest == 1) {
            $result = ProjectFsGeneralExpensesIncrementals::where('project_id', 1)->delete();
            $previos = ProjectFsGeneralExpensesIncrementalsDetails::where('project_id','1')->delete();
            $projectFsGeneralIncomeIncremental = ProjectFsGeneralExpensesIncrementals::query()->updateOrCreate([
                'project_id'   => $pro_id,
            ], [
                'project_id' => $pro_id,
                'incremental' => $request->one_value_incremental,
            ]);
            // dd($projectFsGeneralIncomeIncremental);
            $result = ProjectFsGeneralExpensesIncrementalsDetails::where('general_expenses_id', $projectFsGeneralIncomeIncremental->id)->delete();
            foreach (years($pro_id)['years'] as $year) {
                ProjectFsGeneralExpensesIncrementalsDetails::query()->create([
                    'project_id' => $pro_id,
                    'general_expenses_id' => $projectFsGeneralIncomeIncremental->id,
                    'year' => $year,
                    'incremental' => $projectFsGeneralIncomeIncremental->incremental,
                ]);
            }
        } else {
            $data = $request->only([
                'year', 'id', 'one_value_incremental', 'value_incremental' , 'project_id'
            ]);
            // dd($data);
            $previos = ProjectFsGeneralExpensesIncrementalsDetails::where('project_id',$pro_id)->delete();
            foreach ($data['year'] as $key => $year) {
                ProjectFsGeneralExpensesIncrementalsDetails::create([
                    'general_expenses_id' => $data['id'],
                    'year' => $year,
                    'project_id' => $pro_id,
                    'incremental' => $data['value_incremental'][$key],
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
            $data = ProjectFsGeneralExpensesIncrementals::where('project_id', $pro_id)->get();
            $totleIncomeMounth = 0;
            $totleIncomeToEndYear = 0;
            $totleIncomeYear = 0;
            foreach ($data as $dataa) {
                $totleIncomeMounth += ($dataa->value * $dataa->quantity);
                $totleIncomeToEndYear += ($dataa->value * $dataa->quantity) * $remainingmonths;
                $totleIncomeYear += ($dataa->value * $dataa->quantity) * 12;
            };


        return response()->json([
                'message' => 'success', 'data' => $data,
                'remainingmonths' => $remainingmonths, 'totleIncomeMounth' => $totleIncomeMounth, 'totleIncomeToEndYear' => $totleIncomeToEndYear, 'totleIncomeYear' => $totleIncomeYear,
                'success' => 'تم تخزين البيانات بنجاح'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectFsGeneralExpensesIncrementals  $projectFsGeneralExpensesIncrementals
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectFsGeneralExpensesIncrementals $projectFsGeneralExpensesIncrementals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectFsGeneralExpensesIncrementals  $projectFsGeneralExpensesIncrementals
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectFsGeneralExpensesIncrementals $projectFsGeneralExpensesIncrementals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectFsGeneralExpensesIncrementalsRequest  $request
     * @param  \App\Models\ProjectFsGeneralExpensesIncrementals  $projectFsGeneralExpensesIncrementals
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectFsGeneralExpensesIncrementalsRequest $request, ProjectFsGeneralExpensesIncrementals $projectFsGeneralExpensesIncrementals)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectFsGeneralExpensesIncrementals  $projectFsGeneralExpensesIncrementals
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectFsGeneralExpensesIncrementals $projectFsGeneralExpensesIncrementals)
    {
        //
    }
}
