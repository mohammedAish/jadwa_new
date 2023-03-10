<?php

namespace App\Http\Controllers;

use App\Models\ProjectFsGeneralIncome;
use Illuminate\Http\Request;
Use Alert;
use App\Models\admin\Project;
use App\Models\ProjectFsGeneralIncomeIncremental;
use App\Models\ProjectFsGeneralIncomeIncrementalDetail;
use DateTime;
use PhpParser\Node\Expr\Empty_;

class ProjectFsGeneralIncomeController extends Controller
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
    public function project_fs_general_income_store(Request $request,$pro_id)
    {
    //dd($request->all());
        $request->validate([
            'items.*' => 'required',
            'value.*' => 'required',
            'quantity.*' => 'required',
        ]);
        $data = $request->only([
            'item','value','quantity',
        ]);

        $item_id = $request->get('item_id');
        $item = $request->get('item');
       // dd($item);
        $value = $request->get('value');
        $quantity = $request->get('quantity');
             $count_items = count($item);
            // dd($count_items);
             for($i = 0; $i<$count_items; $i++)
             {
                //dd($item_id[$i]);
               // dd($pres);
                if($item_id[$i] != 0){
               //$pres= ProjectFsGeneralIncome::findOrFail($item_id[$i]);
              // dd( $item[$i]);
              ProjectFsGeneralIncome::whereId($item_id[$i])->update([
                    'item' => $item[$i] ,
                    'value' => $value[$i] ,
                    'quantity' => $quantity[$i] ,

                             ]);
                        }else{
                                         ProjectFsGeneralIncome::create([
                                            'project_id' => $pro_id,
                                             'item' => $item[$i] ,
                                            'value' => $value[$i] ,
                                            'quantity' => $quantity[$i] ,
                                                                    ]);

                        };
             }
        // $result = ProjectFsGeneralIncome::where('project_id',$pro_id)->delete();
        // foreach ($data['item'] as $key => $item){
        //     if (!is_null($item)){
        //         ProjectFsGeneralIncome::query()->create([
        //             'project_id' => $pro_id,
        //             'item' => $data['item'][$key],
        //             'value' => $data['value'][$key],
        //             'quantity' => $data['quantity'][$key],

        //         ]);
        //     }

        // }

        return response()->json(['message'=>'success','success'=>'???? ?????????? ???????????????? ??????????']);

    }
    function project_fs_general_income_update(Request $request,$pro_id,$id){
        //dd($id);
        $projectFsGeneralIncome=ProjectFsGeneralIncome::findOrFail($id);

        $data = $request->only([
            'item','value','quantity',
        ]);

        //$result = ProjectFsGeneralIncome::where('project_id',1)->delete();
        foreach ($data['item'] as $key => $item){
            if (!is_null($item)){
                ProjectFsGeneralIncome::whereId($id)->update([
                    'project_id' => $pro_id,
                    'item' => $data['item'][$key],
                    'value' => $data['value'][$key],
                    'quantity' => $data['quantity'][$key],

                ]);
            }

        }

        return response()->json(['message'=>'success','success'=>'???? ?????????? ???????????????? ??????????']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectFsGeneralIncome  $projectFsGeneralIncome
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectFsGeneralIncome $projectFsGeneralIncome)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectFsGeneralIncome  $projectFsGeneralIncome
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectFsGeneralIncome $projectFsGeneralIncome)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectFsGeneralIncome  $projectFsGeneralIncome
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectFsGeneralIncome $projectFsGeneralIncome)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectFsGeneralIncome  $projectFsGeneralIncome
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectFsGeneralIncome $projectFsGeneralIncome)
    {
        //
    }

    public function project_fs_general_income_delete_item($pro_id,$id){
        dd('s');
                $result = ProjectFsGeneralIncome::where('id',$id)->first()->delete();

                return response()->json(['message'=>'success','success'=>'????  ?????????? ??????????']);


            }

            public function project_fs_general_income_icremental_total_revenue($pro_id)
            {
                $project = Project::where('id',$pro_id)->first();

                $projectStartDate = new DateTime($project->start_date);

                $operationDate = date('Y-m-d', strtotime("+".$project->development_duration." months", strtotime($project->start_date)));

               //$operationDate = new DateTime($operationDate);
               //$year= $operationDate->format('Y');

               $yearEnd = date('Y-m-d', strtotime('12/31'));
               $yearCurrent = date('Y', strtotime('12/31'));

               $datediff = strtotime($yearEnd) - strtotime($operationDate);
               $remainingDays =  round($datediff / (60 * 60 * 24));

               $remainingmonths =  round($datediff / (60 * 60 * 24*30));
               $remainingFromYear =  $remainingmonths/12;
                $data = ProjectFsGeneralIncome::query()->where('project_id',$pro_id)->get();
                $totleIncomeMounth =0;
                $totleIncomeToEndYear=0;
                $totleIncomeYear=0;
               foreach($data as $dataa){
                   $totleIncomeMounth += ($dataa->value * $dataa->quantity);
                   $totleIncomeToEndYear += ($dataa->value * $dataa->quantity) * $remainingmonths;
                   $totleIncomeYear += ($dataa->value * $dataa->quantity) * 12;

               };
                $projectFsGeneralIncomeIncremental = ProjectFsGeneralIncomeIncremental::where('project_id',$pro_id)->first();
                $projectFsGeneralIncomeIncrementalDetail =ProjectFsGeneralIncomeIncrementalDetail::where('project_fs_income_incremental_id',$projectFsGeneralIncomeIncremental->id)->get()->toArray();
               $prev=$totleIncomeYear;
               $totleIncomeAvaragee=0;
               $totleIncomee=0;
               $IncomeAvargePersent=0;
                foreach($projectFsGeneralIncomeIncrementalDetail as $item =>$val){
                    $IncomeAvargePersent +=$val['incremental'];

                        $totleYear[$val['year']]=
                        ( (($val['incremental']/100 ) +1)) * $prev ;


                    $prev =$totleYear[$val['year']];

                }
              $totleIncomee=  array_sum($totleYear);
              $totleIncomeAvaragee =$totleIncomee/(5+$remainingFromYear);
              $IncomeAvargePersent = $IncomeAvargePersent /5;


                $projectFsYear =ProjectFsGeneralIncomeIncrementalDetail::where('project_fs_income_incremental_id',$projectFsGeneralIncomeIncremental->id)->get(['year'])->toArray();;
                return response()->json(['message'=>'success','totleYear'=>$totleYear,'yearCurrent'=>$yearCurrent,
                'totleIncomeToEndYear'=>$totleIncomeToEndYear,'totleIncomee'=>$totleIncomee,
                'totleIncomeAvaragee'=>$totleIncomeAvaragee,
                'IncomeAvargePersent'=>$IncomeAvargePersent,'success'=>'???? ?????????? ???????????????? ??????????']);

               // $data = ProjectFsGeneralIncome::query()->where('project_id',1)->with('increments')->get();
            }

}
