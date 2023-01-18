<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\admin\Project;
use App\Models\FsStartupCost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FsStartupCostController extends Controller
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
        $project=Project::findOrFail(1);
        $stratupCosts = FsStartupCost::where('project_id',1)->get();

        return view('admin.FsStartupCost.create')->with(
            ['stratupCosts'=>$stratupCosts,
                'project'=>$project,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'name.*' => 'required|string',
            'cost.*' => 'required|numeric',
        ], [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل يجب ان يحتوي على نص',
            'numeric' => 'هذا الحقل  يجب ان يحتوي على رقم',
        ]);
        $data=$request->only(['id','name','cost']);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $fsStartup = \DB::table('fs_startup_costs')->where('project_id', 1)->get()->count();
            if ($fsStartup > 0) {
                foreach ($data['id'] as $key => $item) {
                    $fsStartupUpdate = FsStartupCost::where('id', $data['id'][$key])->first();
                    if (!is_null('name')) {
                        FsStartupCost::where('id', $data['id'][$key])->updateOrCreate([
                            'project_id' => 1,
                        ], [
                            'name' => $data['name'][$key],
                            'cost' => $data['cost'][$key],
                        ]);
                    }
                }
            } else {
                foreach ($data['id'] as $key => $item) {
                    if (!is_null('name')) {
                        FsStartupCost::query()->create([
                            'project_id' => 1,
                            'name' => $data['name'][$key],
                            'cost' => $data['cost'][$key],
                        ]);
                    }
                }
            }
            return response()->json(['status' => 1, 'success' => 'تمت الاضافة بنجاح']);
        }
    }

    public function fetchStartupCost(Request $request){
        $startupCosts = FsStartupCost::where('project_id',1)->get();
        $sumCost=0;
        foreach ($startupCosts as $cost){
            $sumCost+=$cost->cost;
        }
        return response()->json([
            'startupCosts' => $startupCosts,
            'sumCost'=>$sumCost,
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FsStartupCost  $fsStartupCost
     * @return \Illuminate\Http\Response
     */
    public function show(FsStartupCost $fsStartupCost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FsStartupCost  $fsStartupCost
     * @return \Illuminate\Http\Response
     */
    public function edit(FsStartupCost $fsStartupCost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FsStartupCost  $fsStartupCost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FsStartupCost $fsStartupCost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FsStartupCost  $fsStartupCost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $fsStartupCost = FsStartupCost::findOrFail($request->id);
        $fsStartupCost->delete();
        return response()->json(true, 200);
//        return response()->json(['message'=>'success','success'=>'تم  الحذف بنجاح']);
    }
}
