<?php

namespace App\Http\Controllers;

use App\Models\FsAccountReceivable;
use App\Http\Controllers\Controller;
use App\Models\admin\Project;
use App\Models\FsWorkingCapital;
use App\Models\ProjectExpGeneralIncome;
use App\Models\ProjectFsGeneralIncome;
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
    public function create($pro_id)
    {
        $project = Project::where('id',$pro_id)->first();

        $fsAccountReceivable=FsAccountReceivable::where('project_id',$pro_id)->get();
        $fsWorkingCapital=FsWorkingCapital::where('project_id',$pro_id)->get();
        $fsWorkingCapitalPeriod=$fsWorkingCapital->where('type','!=','spare')->pluck('period')->toArray();
        $fsWorkingCapitalSpare=$fsWorkingCapital->where('project_id',$pro_id)->where('type','spare')->pluck('period')->first();
        //dd($fsWorkingCapitalSpare);
        $sumOfWorkingCapital=0;
        foreach($fsWorkingCapital->where('type','cogs') as $workingCapital){
            $sumOfWorkingCapital +=   $workingCapital->period * incomeData($project->id)['totleIncomeMounth'];
        }
        foreach($fsWorkingCapital->where('type','rent') as $workingCapital){
            $sumOfWorkingCapital +=   ($workingCapital->period / 12) * projectFsRent($project->id)['totalRent'];
        }
        foreach($fsWorkingCapital->where('type','salary') as $workingCapital){
            $sumOfWorkingCapital +=  ($workingCapital->period)*employe($project->id)['totleEmployeMounth'];
        }
        foreach($fsWorkingCapital->where('type','marketing') as $workingCapital){
            $sumOfWorkingCapital +=   ($workingCapital->period/12)*marketingCost($project->id)['marketingTotle'];
        }
        foreach($fsWorkingCapital->where('type','admin-expenses') as $workingCapital){
            $sumOfWorkingCapital +=   ($workingCapital->period/12)*administrativeExpenses($project->id)['administrativeExpensesTotle'];
        }

          $reserveOfWorkingCapital =$sumOfWorkingCapital*($fsWorkingCapitalSpare/100);
          $totleOfWorkingCapital =$reserveOfWorkingCapital+ $sumOfWorkingCapital ;

          // dd($sumOfWorkingCapital);

        // foreach ($fsWorkingCapital as $value){
        //     $sumOfWorkingCapital=($sumOfWorkingCapital)+($value*200);
        // }

        return view('admin.FsAccountReceivable.create')->with([
            'fsAccountReceivable'=>$fsAccountReceivable,
            'fsWorkingCapital'=>$fsWorkingCapital,
            'totleOfWorkingCapital'=>$totleOfWorkingCapital,
            'sumOfWorkingCapital'=>$sumOfWorkingCapital,
            'reserveOfWorkingCapital'=>$reserveOfWorkingCapital,
            'fsWorkingCapitalSpare'=>$fsWorkingCapitalSpare,
            'project'=>$project
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$pro_id)
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
        $data['project_id'] = $pro_id;

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $fsAccountReceivable = FsAccountReceivable::query()->where('project_id',$pro_id)->first();
           if (isset($fsAccountReceivable)){
               FsAccountReceivable::where('project_id',$pro_id)->update([
                   'account_receivable'=>$request->account_receivable,
                   'account_payable'=>$request->account_payable,
                   'inventory'=>$request->inventory,
                   'project_id'=>$pro_id
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
