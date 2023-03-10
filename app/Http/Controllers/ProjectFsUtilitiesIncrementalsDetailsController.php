<?php

namespace App\Http\Controllers;

use App\Models\ProjectFsUtilitiesIncrementalsDetails;
use App\Http\Requests\StoreProjectFsUtilitiesIncrementalsDetailsRequest;
use App\Http\Requests\UpdateProjectFsUtilitiesIncrementalsDetailsRequest;
use App\Models\admin\Project;
use App\Models\ProjectFsUtilitiesIncrementals;
use DateTime;
use Illuminate\Support\Facades\Validator;

class ProjectFsUtilitiesIncrementalsDetailsController extends Controller
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
     * @param  \App\Http\Requests\StoreProjectFsUtilitiesIncrementalsDetailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectFsUtilitiesIncrementalsDetailsRequest $request,$pro_id)
    {

        $counRequest = count($request->all());
        // dd($request->all());
        if ($counRequest == 1) {
            $result = ProjectFsUtilitiesIncrementals::where('project_id', $pro_id)->delete();
            $previos = ProjectFsUtilitiesIncrementalsDetails::where('project_id',$pro_id)->delete();
            $projectFsUtilitiesIncremental = ProjectFsUtilitiesIncrementals::query()->updateOrCreate([
                'project_id'   => $pro_id,
            ], [
                'project_id' => $pro_id,
                'incremental' => $request->one_value_incremental_utilities,
            ]);
            // dd($projectFsUtilitiesIncremental);
            $result = ProjectFsUtilitiesIncrementalsDetails::where('utilities_id', $projectFsUtilitiesIncremental->id)->delete();
            foreach (years($pro_id)['years'] as $year) {
                ProjectFsUtilitiesIncrementalsDetails::query()->create([
                    'project_id' => $pro_id,
                    'Utilities_id' => $projectFsUtilitiesIncremental->id,
                    'year' => $year,
                    'incremental' => $projectFsUtilitiesIncremental->incremental,
                ]);
            }
        } else {
            // dd($request->all());
            $data = $request->only([
                'year', 'id', 'one_value_incremental_utilities', 'value_incremental_utilities' , 'project_id'
            ]);
            // dd($data);
            $previos = ProjectFsUtilitiesIncrementalsDetails::where('project_id',$pro_id)->delete();
            foreach ($data['year'] as $key => $year) {
                ProjectFsUtilitiesIncrementalsDetails::create([
                    'utilities_id' => $data['id'],
                    'year' => $year,
                    'project_id' => $pro_id,
                    'incremental' => $data['value_incremental_utilities'][$key],
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
            $data = ProjectFsUtilitiesIncrementals::where('project_id', $pro_id)->get();
            $totleIncomeMounth = 0;
            $totleIncomeToEndYear = 0;
            $totleIncomeYear = 0;
            foreach ($data as $dataa) {
                $totleIncomeMounth += ($dataa->value * $dataa->quantity);
                $totleIncomeToEndYear += ($dataa->value * $dataa->quantity) * $remainingmonths;
                $totleIncomeYear += ($dataa->value * $dataa->quantity) * 12;
            };


        return response()->json([
                'message' => 'success', 'data' => $data,'status' => 1,
                'remainingmonths' => $remainingmonths, 'totleIncomeMounth' => $totleIncomeMounth, 'totleIncomeToEndYear' => $totleIncomeToEndYear, 'totleIncomeYear' => $totleIncomeYear,
                'success' => '???? ?????????? ???????????????? ??????????'
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectFsUtilitiesIncrementalsDetails  $projectFsUtilitiesIncrementalsDetails
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectFsUtilitiesIncrementalsDetails $projectFsUtilitiesIncrementalsDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectFsUtilitiesIncrementalsDetails  $projectFsUtilitiesIncrementalsDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectFsUtilitiesIncrementalsDetails $projectFsUtilitiesIncrementalsDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectFsUtilitiesIncrementalsDetailsRequest  $request
     * @param  \App\Models\ProjectFsUtilitiesIncrementalsDetails  $projectFsUtilitiesIncrementalsDetails
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectFsUtilitiesIncrementalsDetailsRequest $request, ProjectFsUtilitiesIncrementalsDetails $projectFsUtilitiesIncrementalsDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectFsUtilitiesIncrementalsDetails  $projectFsUtilitiesIncrementalsDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectFsUtilitiesIncrementalsDetails $projectFsUtilitiesIncrementalsDetails)
    {
        //
    }
}
