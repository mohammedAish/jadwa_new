<?php

namespace App\Http\Controllers;

use App\Models\ProjectFsOtherExpenses;
use App\Http\Requests\StoreProjectFsOtherExpensesRequest;
use App\Http\Requests\UpdateProjectFsOtherExpensesRequest;
use Illuminate\Support\Facades\Validator;

class ProjectFsOtherExpensesController extends Controller
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
     * @param  \App\Http\Requests\StoreProjectFsOtherExpensesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectFsOtherExpensesRequest $request)
    {
            $test = $request->validate([
                'title.*' => 'required',
                'value.*' => 'required',
            ]);
            $item = ProjectFsOtherExpenses::where('project_id' , $request->project_id)->delete();
            foreach ($test['title'] as $key => $item) {
                $data = ProjectFsOtherExpenses::create([
                    'title' => $test['title'][$key],
                    'value' => $test['value'][$key],
                    'project_id' => $request->project_id,

                ]);
            }

            return response()->json([
                'status' => 1, 'success' => 'تمت الاضافة بنجاح',
                'data' => $data,
            ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectFsOtherExpenses  $projectFsOtherExpenses
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectFsOtherExpenses $projectFsOtherExpenses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectFsOtherExpenses  $projectFsOtherExpenses
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectFsOtherExpenses $projectFsOtherExpenses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectFsOtherExpensesRequest  $request
     * @param  \App\Models\ProjectFsOtherExpenses  $projectFsOtherExpenses
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectFsOtherExpensesRequest $request, ProjectFsOtherExpenses $projectFsOtherExpenses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectFsOtherExpenses  $projectFsOtherExpenses
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectFsOtherExpenses $projectFsOtherExpenses)
    {
        //
    }
}
