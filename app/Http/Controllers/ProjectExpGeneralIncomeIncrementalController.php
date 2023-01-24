<?php

namespace App\Http\Controllers;

use App\Models\admin\Project;
use App\Models\ProjectExpGeneralIncome;
use App\Models\ProjectExpGeneralIncomeIncremental;
use App\Models\ProjectExpGeneralIncomeIncrementalDetail;
use App\Models\ProjectFsGeneralIncome;
use DateTime;
use Illuminate\Http\Request;

class ProjectExpGeneralIncomeIncrementalController extends Controller
{
    public function project_exp_general_income_icremental_store(Request $request, $pro_id){
       // dd($request->all());
                $request->validate([
                    'one_value_incremental' => 'required',

                ]);
                ProjectExpGeneralIncomeIncremental::query()->updateOrCreate([
                    'project_id'   =>  $pro_id,
                ],[
                    'project_id' =>  $pro_id,
                    'incremental' => $request->one_value_incremental,


                ]);

                $result = ProjectExpGeneralIncomeIncremental::where('project_id', $pro_id)->first();
                return response()->json(['message'=>'success','data'=>$result,'success'=>'تم تخزين  النسبة البيانات بنجاح']);

             }
             public function project_exp_general_income_icremental_detail_store(Request $request, $pro_id)
             {
                //dd($request->all());
                $counRequest = count($request->all());
                if( $counRequest == 1){
                    $result = ProjectExpGeneralIncomeIncremental::where('project_id',1)->delete();

                    $project_exp_income_incremental_id=ProjectExpGeneralIncomeIncremental::query()->updateOrCreate([
                        'project_id'   => $pro_id,
                    ],[
                        'project_id' =>  $pro_id,
                        'incremental' => $request->one_value_incremental,


                    ]);
                    $result = ProjectExpGeneralIncomeIncrementalDetail::where('project_exp_income_incremental_id',$project_exp_income_incremental_id->id)->delete();
                    foreach(years($pro_id)['years'] as $year){
                        ProjectExpGeneralIncomeIncrementalDetail::query()->create([
                            'project_exp_income_incremental_id' => $project_exp_income_incremental_id->id,
                            'year' => $year,
                            'incremental' =>$request->one_value_incremental,
                        ]);
                    }
                }else{

                 $data = $request->only([
                    'year' , 'id' , 'value_incremental',
                 ]);

                 $year = $request->get('year');
                 $id_incremental = $request->get('id');
                // dd($id_incremental);
                 $incremental = $request->get('value_incremental');
                 $previos=ProjectExpGeneralIncomeIncrementalDetail::where('project_exp_income_incremental_id',$id_incremental)->get();
                 //dd($previos);
                      $count_items = count($previos);
                     // dd($count_items);
                     if($count_items != 0 ){
                      for($i = 0; $i<$count_items; $i++)
                      {


                 $pres=  ProjectExpGeneralIncomeIncrementalDetail::where('project_exp_income_incremental_id' , $id_incremental)->where('year' , $year[$i] )->first();
                  $pres->update([
                    'year' => $year[$i] ,
                    'incremental' => $incremental[$i] ,

                             ]);


                                    }
                                } else{
                                    $data = $request->only([
                                        'value_incremental','year',
                                    ]);

                                    foreach ($data['year'] as $key => $year){
                                        ProjectExpGeneralIncomeIncrementalDetail::query()->create([
                                            'project_exp_income_incremental_id' =>$id_incremental,
                                            'year' => $year,
                                            'incremental' =>$data['value_incremental'][$key],
                                        ]);
                                    }


                            }



                }



         //        $data = GeneralProjectIncomeIncremental::query()->where('project_id',1)->with('income')->orderBy('year')->get();

         $project = Project::where('id', $pro_id)->first();

         $projectStartDate = new DateTime($project->start_date);

         $operationDate = date('Y-m-d', strtotime("+".$project->development_duration." months", strtotime($project->start_date)));

        //$operationDate = new DateTime($operationDate);
        //$year= $operationDate->format('Y');
        $year= date('Y', strtotime($operationDate));

        $yearEnd = date('Y-m-d', strtotime('12/31/'.$year));

        //$yearEnd = date('Y-m-d', strtotime('12/31'));
        $datediff = strtotime($yearEnd) - strtotime($operationDate);

        $remainingDays =  round($datediff / (60 * 60 * 24));

        $remainingmonths =  round($datediff / (60 * 60 * 24*30));
         $dataFs = ProjectFsGeneralIncome::query()->where('project_id', $pro_id)->get();
        $totleIncomeMounthFS =0;
        $totleIncomeToEndYearFS=0;
        $totleIncomeYearFS=0;
       foreach($dataFs as $dataaFS){
           $totleIncomeMounthFS += ($dataaFS->value * $dataaFS->quantity);
           $totleIncomeToEndYearFS += ($dataaFS->value * $dataaFS->quantity) * $remainingmonths;
           $totleIncomeYearFS += ($dataaFS->value * $dataaFS->quantity) * 12;

       };

         $data = ProjectExpGeneralIncome::with('fsIncome')->where('project_id', $pro_id)->get();
         $totleIncomeMounth =0;
         $totleIncomeToEndYear=0;
         $totleIncomeYear=0;
         $expValeEN=0;
         $expValeY=0;
        foreach($data as $dataa){

            $dataa->quantity = ($dataa->quantity==0)?1:$dataa->quantity;

                        if($dataa->expensis_type =='0'){
                            $expVale = $dataa->value  ;
                        } if($dataa->expensis_type =='1'){
                            $fsIncome=ProjectFsGeneralIncome::where('id',$dataa->fsIncome_id)->first();
                            $expVale=($dataa->value)* ($fsIncome->value/100) ;
                        }
                        if($dataa->expensis_type =='2'){
                            $expVale=($dataa->value/100) *$totleIncomeMounthFS ;
                            $expValeEN=($dataa->value/100) *$totleIncomeToEndYearFS ;
                            $expValeY=($dataa->value/100) *$totleIncomeYearFS ;
                        }
                       // dd($expValeEN);


            $totleIncomeMounth += $dataa->quantity * $expVale;
            $totleIncomeToEndYear = ($totleIncomeMounth * $remainingmonths) ;
            $totleIncomeYear = ($totleIncomeMounth  * 12);

        };




                 return response()->json(['message'=>'success','data'=>$data,
                 'remainingmonths'=>$remainingmonths,'totleIncomeMounth'=>$totleIncomeMounth
                 ,'totleIncomeToEndYear'=>$totleIncomeToEndYear,'totleIncomeYear'=>$totleIncomeYear,
                 'totleIncomeMounthFS'=>$totleIncomeMounthFS
                 ,'totleIncomeToEndYearFS'=>$totleIncomeToEndYearFS,'totleIncomeYearFS'=>$totleIncomeYearFS,
                 'success'=>'تم تخزين البيانات بنجاح']);


             }

             public function project_exp_general_income_icremental_detail_get( $pro_id){

                $projectExpGeneralIncome = ProjectExpGeneralIncomeIncremental::query()->where('project_id', $pro_id)->first();
                $data =ProjectExpGeneralIncomeIncrementalDetail::where('project_exp_income_incremental_id',$projectExpGeneralIncome->id)->get();
                return response()->json(['message'=>'success','data'=>$data,'projectExpGeneralIncome'=>$projectExpGeneralIncome,'success'=>'تم تخزين البيانات بنجاح']);

             }

}
