<?php

namespace App\Http\Controllers;

use App\Models\CapitalStructure;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CapitalStructureController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(), [
            'self_financing' => 'required|numeric',
        ], [
            'required' => 'هذا الحقل مطلوب',
            'numeric' => 'هذا الحقل  يجب ان يحتوي على رقم',
        ]);
        $data=$request->only(['self_financing']);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $capitalStructure = CapitalStructure::query()->where('project_id',1)->first();
            if (isset($capitalStructure)){
              CapitalStructure::where('project_id',1)->update([
                    'project_id' => 1,
                    'self_financing' => $data['self_financing'],
                ]);
                return response()->json(['status' => 1, 'success' => 'تم التعديل بنجاح']);
            }else{
                CapitalStructure::query()->create([
                    'project_id' => 1,
                    'self_financing' => $data['self_financing'],
                ]);
                return response()->json(['status' => 1, 'success' => 'تمت الاضافة بنجاح']);
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CapitalStructure  $capitalStructure
     * @return \Illuminate\Http\Response
     */
    public function show(CapitalStructure $capitalStructure)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CapitalStructure  $capitalStructure
     * @return \Illuminate\Http\Response
     */
    public function edit(CapitalStructure $capitalStructure)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CapitalStructure  $capitalStructure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CapitalStructure $capitalStructure)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CapitalStructure  $capitalStructure
     * @return \Illuminate\Http\Response
     */
    public function destroy(CapitalStructure $capitalStructure)
    {
        //
    }
}
