<?php

namespace App\Http\Controllers;

use App\Models\admin\Project;
use App\Models\ProjectExpGeneralIncome;
use App\Models\ProjectExpGeneralIncomeIncremental;
use App\Models\ProjectExpGeneralIncomeIncrementalDetail;
use App\Models\ProjectFsGeneralIncome;
use App\Models\ProjectFsGeneralIncomeIncremental;
use App\Models\ProjectFsGeneralIncomeIncrementalDetail;
use DateTime;
use Illuminate\Http\Request;

class ProjectExpGeneralIncomeIncrementalDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allـearnings()
    {
        $project = Project::where('id',1)->first();

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
                $data = ProjectFsGeneralIncome::query()->where('project_id',1)->get();
                $totleIncomeMounth =0;
                $totleIncomeToEndYear=0;
                $totleIncomeYear=0;
               foreach($data as $dataa){
                   $totleIncomeMounth += ($dataa->value * $dataa->quantity);
                   $totleIncomeToEndYear += ($dataa->value * $dataa->quantity) * $remainingmonths;
                   $totleIncomeYear += ($dataa->value * $dataa->quantity) * 12;

               };
                $projectFsGeneralIncomeIncremental = ProjectFsGeneralIncomeIncremental::where('project_id',1)->first();
                $projectFsGeneralIncomeIncrementalDetail =ProjectFsGeneralIncomeIncrementalDetail::where('project_fs_income_incremental_id',$projectFsGeneralIncomeIncremental->id)->get()->toArray();
               $prev=$totleIncomeYear;
               $totleIncomeAvarageeFs=0;
               $totleIncomee=0;
               $IncomeAvargePersent=0;
                foreach($projectFsGeneralIncomeIncrementalDetail as $item =>$val){
                    $IncomeAvargePersent +=$val['incremental'];

                        $totleYearFs[$val['year']]=
                        ( (($val['incremental']/100 ) +1)) * $prev ;


                    $prev =$totleYearFs[$val['year']];

                }
                $totleIncomeeFS=  array_sum($totleYearFs);
                $totleIncomeAvarageeFs =$totleIncomeeFS/(5+$remainingFromYear);
                //dd($totleIncomeAvarageeFs);


                $dataFs = ProjectFsGeneralIncome::query()->where('project_id',1)->get();
                $totleIncomeMounthFS =0;
                $totleIncomeToEndYearFS=0;
                $totleIncomeYearFS=0;
               foreach($dataFs as $dataaFS){
                   $totleIncomeMounthFS += ($dataaFS->value * $dataaFS->quantity);
                   $totleIncomeToEndYearFS += ($dataaFS->value * $dataaFS->quantity) * $remainingmonths;
                   $totleIncomeYearFS += ($dataaFS->value * $dataaFS->quantity) * 12;

               };
                $data_exp = ProjectExpGeneralIncome::with('fsIncome')->where('project_id',1)->get();
                $totleIncomeMounth_exp  =0;
                $totleIncomeToEndYear_exp =0;
                $totleIncomeYear_exp =0;
                $expValeEN=0;
                $expValeY=0;
               foreach($data_exp as $dataa){

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


                   $totleIncomeMounth_exp  += $dataa->quantity * $expVale;
                   $totleIncomeToEndYear_exp  = ($totleIncomeMounth_exp  * $remainingmonths) ;
                   $totleIncomeYear_exp  = ($totleIncomeMounth_exp   * 12);

               };


               $rojectExpGeneralIncomeIncremental = ProjectExpGeneralIncomeIncremental::where('project_id',1)->first();
               $projectExpGeneralIncomeIncrementalDetail =ProjectExpGeneralIncomeIncrementalDetail::where('project_exp_income_incremental_id',$rojectExpGeneralIncomeIncremental->id)->get()->toArray();
              $prev_exp =$totleIncomeYear_exp ;
              $totleIncomeAvaragee_exp =0;
              $totleIncomeeExp =0;
              $IncomeAvargePersent_exp =0;
               foreach($projectExpGeneralIncomeIncrementalDetail as $item =>$val){
                   $IncomeAvargePersent_exp  +=$val['incremental'];

                       $totleYear_exp [$val['year']]=
                       ( (($val['incremental']/100 ) +1)) * $prev_exp ;


                   $prev_exp  =$totleYear_exp [$val['year']];

               }
               $totleIncomeeExp=  array_sum($totleYear_exp);
               $totleIncomeAvaragee_exp =$totleIncomeeExp/(5+$remainingFromYear);

            
            //    array_push($totleYear_exp, $yearCurrent);

            //    dd($totleYear_exp);
               //dd($totleYear_exp);
              // $result = [$totleYear_exp - $totleYearFs];
            //  dd($result);
                return response()->json(['message'=>'success','totleYearFs'=>$totleYearFs
                ,'totleYear_exp'=>$totleYear_exp,'yearCurrent'=>$yearCurrent,
                'totleIncomeToEndYearFS'=>$totleIncomeToEndYearFS,'totleIncomeToEndYear_exp'=>$totleIncomeToEndYear_exp,
                'totleIncomeeExp'=>$totleIncomeeExp,'totleIncomeeFS'=>$totleIncomeeFS,
                'totleIncomeAvaragee_exp'=>$totleIncomeAvaragee_exp,'totleIncomeAvarageeFs'=>$totleIncomeAvarageeFs,
           'success'=>'تم  البيانات بنجاح']);
    }
}
