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
    public function project_exp_general_income_icremental_store(Request $request){
        //dd($request->all());
                $request->validate([
                    'one_value_incremental' => 'required',

                ]);
                ProjectExpGeneralIncomeIncremental::query()->updateOrCreate([
                    'project_id'   => 1,
                ],[
                    'project_id' => '1',
                    'incremental' => $request->one_value_incremental,


                ]);

                $result = ProjectExpGeneralIncomeIncremental::where('project_id',1)->first();
                return response()->json(['message'=>'success','data'=>$result,'success'=>'تم تخزين  النسبة البيانات بنجاح']);

             }
             public function project_exp_general_income_icremental_detail_store(Request $request)
             {

                $counRequest = count($request->all());
                if( $counRequest == 1){
                    $result = ProjectExpGeneralIncomeIncremental::where('project_id',1)->delete();

                    $project_exp_income_incremental_id=ProjectExpGeneralIncomeIncremental::query()->updateOrCreate([
                        'project_id'   => 1,
                    ],[
                        'project_id' => '1',
                        'incremental' => $request->one_value_incremental,


                    ]);
                    $result = ProjectExpGeneralIncomeIncrementalDetail::where('project_exp_income_incremental_id',$project_exp_income_incremental_id->id)->delete();
                    foreach(years()['years'] as $year){
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
                 $previos=ProjectExpGeneralIncomeIncrementalDetail::where('project_exp_income_incremental_id',$data['id'])->delete();

                // dd($data['id']);
                 foreach ($data['year'] as $key => $year){
         //            echo 'ID : ' . $data['id'][$key] . ' : ' . $year . ' : ' . $data['incremental'][$key] . '<br>';
                     ProjectExpGeneralIncomeIncrementalDetail::query()->create([
                         'project_exp_income_incremental_id' => $data['id'],
                         'year' => $year,
                         'incremental' => $data['value_incremental'][$key],
                     ]);

                 }
                }



         //        $data = GeneralProjectIncomeIncremental::query()->where('project_id',1)->with('income')->orderBy('year')->get();

         $project = Project::where('id',1)->first();

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
         $dataFs = ProjectFsGeneralIncome::query()->where('project_id',1)->get();
        $totleIncomeMounthFS =0;
        $totleIncomeToEndYearFS=0;
        $totleIncomeYearFS=0;
       foreach($dataFs as $dataaFS){
           $totleIncomeMounthFS += ($dataaFS->value * $dataaFS->quantity);
           $totleIncomeToEndYearFS += ($dataaFS->value * $dataaFS->quantity) * $remainingmonths;
           $totleIncomeYearFS += ($dataaFS->value * $dataaFS->quantity) * 12;

       };

         $data = ProjectExpGeneralIncome::with('fsIncome')->where('project_id',1)->get();
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

             public function project_exp_general_income_icremental_detail_get(){

                $projectExpGeneralIncome = ProjectExpGeneralIncomeIncremental::query()->where('project_id',1)->first();
                $data =ProjectExpGeneralIncomeIncrementalDetail::where('project_exp_income_incremental_id',$projectExpGeneralIncome->id)->get();
                return response()->json(['message'=>'success','data'=>$data,'projectExpGeneralIncome'=>$projectExpGeneralIncome,'success'=>'تم تخزين البيانات بنجاح']);

             }

}
