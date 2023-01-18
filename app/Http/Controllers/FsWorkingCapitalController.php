<?php

namespace App\Http\Controllers;

use App\Models\FsWorkingCapital;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FsWorkingCapitalController extends Controller
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

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
//            'cogs[period]' => ['required', 'integer'],
//            'rent[period]' => ['required', 'integer'],
//            'salary[period]' => ['required', 'integer'],
//            'marketing[period]' => ['required', 'integer'],
//            'admin-expenses[period]' => ['required', 'integer'],
        ], [
            'required' => 'هذا الحقل مطلوب',
            'integer' => 'هذا الحقل يجب ان يحتوي على رقم',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $fsWorking=DB::table('fs_working_capitals')->get()->count();
            $fsWorkingCapital = FsWorkingCapital::query()->where('project_id',1)->get();
//            $fsWorkingCapital = FsWorkingCapital::query()->where('project_id',1)->first();

            if ($fsWorking>0){
                $countItem=$fsWorkingCapital->count();
                for ($i=1;$i<=$countItem;$i++) {
                    foreach ($request->all() as $key => $value) {
                        $fsWorkingUpdate = FsWorkingCapital::where('type',$value['type'])->first();
                        $fsWorkingUpdate->update([
                            'type' => $value['type'],
                            'project_id' => 1,
                            'period' => $value['period'],
                        ]);
                    }
                }
            }else{
                foreach ($request->all() as $key => $value) {
                    FsWorkingCapital::create([
                        'type' => $value['type'],
                        'project_id' => 1,
                        'period' => $value['period'],
                    ]);
                }
            }
            return response()->json(['status' => 1, 'success' => 'تمت الاضافة بنجاح']);
         }

//
//        if (!$validator->passes()) {
//            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
//        } else {
//
//            $fsWorkingCapital = FsWorkingCapital::query()->where('project_id',1)->delete();
//                foreach ($request->all() as $key => $value) {
//                    FsWorkingCapital::create([
//                        'type' => $value['type'],
//                        'project_id' => 1,
//                        'period' => $value['period'],
//                    ]);
//                }
//
//            return response()->json(['status' => 1, 'success' => 'تمت الاضافة بنجاح']);
//        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FsWorkingCapital  $fsWorkingCapital
     * @return \Illuminate\Http\Response
     */
    public function show(FsWorkingCapital $fsWorkingCapital)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FsWorkingCapital  $fsWorkingCapital
     * @return \Illuminate\Http\Response
     */
    public function edit(FsWorkingCapital $fsWorkingCapital)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FsWorkingCapital  $fsWorkingCapital
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FsWorkingCapital $fsWorkingCapital)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FsWorkingCapital  $fsWorkingCapital
     * @return \Illuminate\Http\Response
     */
    public function destroy(FsWorkingCapital $fsWorkingCapital)
    {
        //
    }
}
