<?php

namespace App\Http\Controllers;

use App\Models\FsAccountReceivable;
use App\Http\Controllers\Controller;
use App\Models\FsWorkingCapital;
use Illuminate\Http\Request;

class FsAccountReceivableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fsAccountReceivable=FsAccountReceivable::where('project_id',1)->get();
        $fsWorkingCapital=FsWorkingCapital::where('project_id',1)->get();
        $fsWorkingCapitalPeriod=$fsWorkingCapital->where('type','!=','spare')->pluck('period')->toArray();
        $fsWorkingCapitalSpare=$fsWorkingCapital->where('type','spare')->pluck('period');
        $sumOfWorkingCapital=0;
        foreach ($fsWorkingCapitalPeriod as $key=>$value){
            $sumOfWorkingCapital=($sumOfWorkingCapital)+($value*200);
        }
        return view('admin.FsAccountReceivable.create')->with([
            'fsAccountReceivable'=>$fsAccountReceivable,
            'fsWorkingCapital'=>$fsWorkingCapital,
            'sumOfWorkingCapital'=>$sumOfWorkingCapital,
            'fsWorkingCapitalSpare'=>$fsWorkingCapitalSpare
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
        $validator = \Validator::make($request->all(), [
            'account_receivable' => ['required', 'integer'],
            'account_payable' => ['required', 'integer'],
            'inventory' => ['required', 'integer'],
        ],[
            'required' => 'هذا الحقل مطلوب',
            'integer' => 'هذا الحقل يجب ان يحتوي على رقم',
        ]);
        $data = $request->only([
            'account_receivable','account_payable','inventory'
        ]);
        $data['project_id'] = 1;

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $fsAccountReceivable = FsAccountReceivable::query()->where('project_id',1)->first();
           if (isset($fsAccountReceivable)){
               FsAccountReceivable::where('project_id',1)->update([
                   'account_receivable'=>$request->account_receivable,
                   'account_payable'=>$request->account_payable,
                   'inventory'=>$request->inventory,
                   'project_id'=>1
               ]);
           }else{

               FsAccountReceivable::query()->create($data);
           }

            return response()->json(['status' => 1, 'success' => 'تمت الاضافة بنجاح']);
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FsAccountReceivable  $fsAccountReceivable
     * @return \Illuminate\Http\Response
     */
    public function show(FsAccountReceivable $fsAccountReceivable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FsAccountReceivable  $fsAccountReceivable
     * @return \Illuminate\Http\Response
     */
    public function edit(FsAccountReceivable $fsAccountReceivable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FsAccountReceivable  $fsAccountReceivable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FsAccountReceivable $fsAccountReceivable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FsAccountReceivable  $fsAccountReceivable
     * @return \Illuminate\Http\Response
     */
    public function destroy(FsAccountReceivable $fsAccountReceivable)
    {
        //
    }
}
