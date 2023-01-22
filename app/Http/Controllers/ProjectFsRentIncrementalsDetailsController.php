<?php

namespace App\Http\Controllers;

use App\Models\ProjectFsRentIncrementalsDetails;
use App\Http\Requests\StoreProjectFsRentIncrementalsDetailsRequest;
use App\Http\Requests\UpdateProjectFsRentIncrementalsDetailsRequest;
use Illuminate\Support\Facades\Validator;

class ProjectFsRentIncrementalsDetailsController extends Controller
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
     * @param  \App\Http\Requests\StoreProjectFsRentIncrementalsDetailsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectFsRentIncrementalsDetailsRequest $request)
    {
        
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'value' => 'required',
            'year' => 'required',
            'incremental' => 'required',
        ], [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل يجب ان يحتوي على نص',
            'max' => 'هذا الحقل طويل للفاية',
            'min' => 'هذا الحقل قصير للغاية',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            
            $data = $request->only([
                'year', 'value', 'incremental', 'project_id',
            ]);


            $previos = ProjectFsRentIncrementalsDetails::where('project_id', $request->project_id)->delete();

            foreach ($data['year'] as $key => $year) {
                $test = ProjectFsRentIncrementalsDetails::query()->create([
                    'value' => $data['value'][$key],
                    'year' => $year,
                    'project_id' => $request->project_id,
                    'incremental' => $data['incremental'][$key],
                ]);
            }

            return response()->json([
                'status' => 1, 'success' => 'تمت الاضافة بنجاح',
                'data' => $data ,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectFsRentIncrementalsDetails  $projectFsRentIncrementalsDetails
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectFsRentIncrementalsDetails $projectFsRentIncrementalsDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectFsRentIncrementalsDetails  $projectFsRentIncrementalsDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectFsRentIncrementalsDetails $projectFsRentIncrementalsDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectFsRentIncrementalsDetailsRequest  $request
     * @param  \App\Models\ProjectFsRentIncrementalsDetails  $projectFsRentIncrementalsDetails
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectFsRentIncrementalsDetailsRequest $request, ProjectFsRentIncrementalsDetails $projectFsRentIncrementalsDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectFsRentIncrementalsDetails  $projectFsRentIncrementalsDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectFsRentIncrementalsDetails $projectFsRentIncrementalsDetails)
    {
        //
    }
}
