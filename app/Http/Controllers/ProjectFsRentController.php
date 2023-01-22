<?php

namespace App\Http\Controllers;

use App\Models\ProjectFsRent;
use App\Http\Requests\StoreProjectFsRentRequest;
use App\Http\Requests\UpdateProjectFsRentRequest;
use App\Models\ProjectFsRentDetails;
use App\Models\ProjectFsRentIncrementalsDetails;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Exists;

class ProjectFsRentController extends Controller
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
     * @param  \App\Http\Requests\StoreProjectFsRentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectFsRentRequest $request)
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
            $counRequest = count($request->all());
            $rent = ProjectFsRent::where('project_id', $request->project_id)->delete();
            $rent_details = ProjectFsRentDetails::where('project_id', $request->project_id)->delete();

            if (isset($request->no_rent)) {
                $data = ProjectFsRent::create([
                    'project_id' => $request->project_id,
                    'type' => 'none',
                ]);
            }

            if (!isset($request->no_rent)) {
                $request->validate([
                    'rent_type' => 'required',
                ]);
                if ($request->rent_type == 1) {
                    $request->validate([
                        'rental_cost' => 'required',
                        'growth_rate_rent' => 'required',
                    ]);
                   
                    $data = ProjectFsRent::create([
                        'project_id' => $request->project_id,
                        'type' => 'amount',
                        'growth_rate_rent' => $request->growth_rate_rent,
                        'value' => $request->rental_cost,
                    ]);
                    foreach (years()['years'] as $year) {
                        ProjectFsRentIncrementalsDetails::query()->create([
                            'project_id' => 1,
                            'rent_id' => $data->id,
                            'year' => $year,
                            'incremental' => $data->growth_rate_rent,
                        ]);
                    }
                }
                if ($request->rent_type == 3) {
                    $test = $request->validate([
                        'title.*' => 'required',
                        'value_rent.*' => 'required',
                        'growth_rent.*' => 'required',
                    ]);
                    $data = ProjectFsRent::create([
                        'project_id' => $request->project_id,
                        'type' => 'custom',
                    ]);

                    foreach ($test['title'] as $key => $item) {
                        ProjectFsRentDetails::create([
                            'rent_id' => $data->id,
                            'title' => $test['title'][$key],
                            'value' => $test['value_rent'][$key],
                            'growth_rent' => $test['growth_rent'][$key],
                            'project_id' => $request->project_id,

                        ]);
                    }
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
     * @param  \App\Models\ProjectFsRent  $projectFsRent
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectFsRent $projectFsRent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectFsRent  $projectFsRent
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectFsRent $projectFsRent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectFsRentRequest  $request
     * @param  \App\Models\ProjectFsRent  $projectFsRent
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectFsRentRequest $request, ProjectFsRent $projectFsRent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectFsRent  $projectFsRent
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectFsRent $projectFsRent)
    {
        //
    }
}
