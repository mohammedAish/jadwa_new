<?php

namespace App\Http\Controllers;

use App\Models\ProjectFsUtilities;
use App\Http\Requests\StoreProjectFsUtilitiesRequest;
use App\Http\Requests\UpdateProjectFsUtilitiesRequest;
use App\Models\ProjectFsUtilitiesDetails;
use Illuminate\Support\Facades\Validator;

class ProjectFsUtilitiesController extends Controller
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
     * @param  \App\Http\Requests\StoreProjectFsUtilitiesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectFsUtilitiesRequest $request)
    {
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
        ], [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل يجب ان يحتوي على نص',
            'max' => 'هذا الحقل طويل للفاية',
            'min' => 'هذا الحقل قصير للغاية',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $utilities = ProjectFsUtilities::where('project_id', $request->project_id)->delete();
            $utilities_details = ProjectFsUtilitiesDetails::where('project_id', $request->project_id)->delete();
            if (isset($request->no_utilities)) {
                $data = ProjectFsUtilities::create([
                    'project_id' => $request->project_id,
                    'type' => 'none',
                ]);
            }
            if (!isset($request->no_utilities)) {
                $test = $request->validate([
                    'title_utilities.*' => 'required',
                    'value_utilities.*' => 'required',
                ]);
                $data = ProjectFsUtilities::create([
                    'project_id' => $request->project_id,
                    'type' => 'custom',
                ]);

                foreach ($test['title_utilities'] as $key => $item) {
                    ProjectFsUtilitiesDetails::create([
                        'utilities_id' => $data->id,
                        'title' => $test['title_utilities'][$key],
                        'value' => $test['value_utilities'][$key],
                        'project_id' => $request->project_id,

                    ]);
                }
            }
            return response()->json([
                'status' => 1, 'success' => 'تمت الاضافة بنجاح',
                'data' => $data,
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectFsUtilities  $projectFsUtilities
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectFsUtilities $projectFsUtilities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectFsUtilities  $projectFsUtilities
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectFsUtilities $projectFsUtilities)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectFsUtilitiesRequest  $request
     * @param  \App\Models\ProjectFsUtilities  $projectFsUtilities
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectFsUtilitiesRequest $request, ProjectFsUtilities $projectFsUtilities)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectFsUtilities  $projectFsUtilities
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectFsUtilities $projectFsUtilities)
    {
        //
    }
}
