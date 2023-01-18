<?php

namespace App\Http\Controllers;

use App\Models\LoanDetail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoanDetailController extends Controller
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
            'administrative_expenses' => 'required|numeric',
            'interest'=>'required|numeric',
            'start_date'=>'required',
        ], [
            'required' => 'هذا الحقل مطلوب',
            'numeric' => 'هذا الحقل  يجب ان يحتوي على رقم',
        ]);
        $data=$request->only(['administrative_expenses','interest','start_date']);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $loanDetail = LoanDetail::query()->where('project_id',1)->first();
            if (isset($loanDetail)){
                LoanDetail::where('project_id',1)->update([
                    'project_id' => 1,
                    'administrative_expenses' => $data['administrative_expenses'],
                    'interest' => $data['interest'],
                    'start_date' => $data['start_date'],
                ]);
                return response()->json(['status' => 1, 'success' => 'تم التعديل بنجاح']);
            }else{
                LoanDetail::query()->create([
                    'project_id' => 1,
                    'administrative_expenses' => $data['administrative_expenses'],
                    'interest' => $data['interest'],
                    'start_date' => $data['start_date'],
                ]);
                return response()->json(['status' => 1, 'success' => 'تمت الاضافة بنجاح']);
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoanDetail  $loanDetail
     * @return \Illuminate\Http\Response
     */
    public function show(LoanDetail $loanDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoanDetail  $loanDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(LoanDetail $loanDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LoanDetail  $loanDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LoanDetail $loanDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoanDetail  $loanDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoanDetail $loanDetail)
    {
        //
    }
}
