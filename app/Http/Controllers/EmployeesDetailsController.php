<?php

namespace App\Http\Controllers;

use App\Models\admin\Project;
use App\Models\Employe;
use App\Models\EmployeesDetails;
use Illuminate\Http\Request;
use App\Models\ProjectFsGeneralIncome;
use App\Models\ProjectFsGeneralIncomeIncremental;
use App\Models\ProjectFsGeneralIncomeIncrementalDetail;
use DateTime;
class EmployeesDetailsController extends Controller
{
    //

    public function employees_store_detial(Request $request){
       // dd($request->all());
        $data = $request->only([
            'value_incremental','year','employes_id',
        ]);
       // dd($data);
        foreach ($data['employes_id'] as $key => $item){

            $retenData=EmployeesDetails::query()->Create([

                'employes_id' =>$data['employes_id'][$key],
                'year' =>  $data['year'][$key],
                'incremental' => $data['value_incremental'][$key],
            ]);
    }

    $result = Employe::where('project_id',1)->get();
    return response()->json(['message'=>'success','data'=>$result,'success'=>'تم تخزين  النسبة البيانات بنجاح']);

}
public function employees_store_detial2(Request $request){
     //dd($request->all());
    //  $data = $request->only([
    //      'quantity','employes_id',
    //  ]);
    // //dd($data);

    //  foreach ($data['quantity'] as $key => $value ){
    // //   dd( $data['quantity'][$key]);
    //    //dd($key);
    //      EmployeesDetails::where('employes_id' , $data['employes_id'] )->update([
    //          'quantity' => $data['quantity'][$key] ,

    //      ]);
    $employes_id = $request->get('employes_id');
    $year = $request->get('year');
         $quantity = $request->get('quantity');
         $count_items = count($quantity);
        // dd($count_items);
         for($i = 0; $i<$count_items; $i++)
         {
            //dd($quantity[$i]);
          $pres=  EmployeesDetails::where('employes_id' , $employes_id[$i] )->where('year' , $year[$i] )->first();
          $pres->update([
                         'quantity' => $quantity[$i] ,

                     ]);
         }

//         dd($quantity);
$project = Project::where('id',1)->first();

$projectStartDate = new DateTime($project->start_date);

$operationDate = date('Y-m-d', strtotime("+".$project->development_duration." months", strtotime($project->start_date)));

//$operationDate = new DateTime($operationDate);
//$year= $operationDate->format('Y');
$year= date('Y', strtotime($operationDate));
$yearCurrent = date('Y', strtotime('12/31'));
$yearEnd = date('Y-m-d', strtotime('12/31/'.$year));

//$yearEnd = date('Y-m-d', strtotime('12/31'));
$datediff = strtotime($yearEnd) - strtotime($operationDate);

$remainingDays =  round($datediff / (60 * 60 * 24));

$remainingmonths =  round($datediff / (60 * 60 * 24*30));

       $employees = Employe::where('project_id',1)->get();

       $empDataQ = array();
       $empDataI = array();
       $empDataS = array();
       $empDataTo = array();
       $totleEmployeJobeToEndYear=0;
       foreach($employees as $employee){

        $employeesDetails = EmployeesDetails::where('employes_id' , $employee->id)->get();
        $EmployeJobeToEndYear =$employee->annual_salary*$employee->quantity*$remainingmonths;
        $totleEmployeJobeToEndYear +=$employee->annual_salary*$employee->quantity*$remainingmonths;

        $emp1 = [$employee->job];
        $emp2 = [ $employee->job];
        $emp3 = [ $employee->job,$EmployeJobeToEndYear];
        $emp4 = [];
        //$prev=$employee->annual_salary * 12;
      //dd($prev);
      $totleSalary =0;
      $prev = $employee->annual_salary ;
        foreach ($employeesDetails as $d  ){
            array_push($emp1, $d->quantity);

            array_push($emp2, $d->incremental);
            $prev = $prev * (($d->incremental/100) +1) ;

            $totle = $prev  * $d->quantity * 12;

            array_push($emp3, $totle);
            //array_push($emp4, $totleSalary);
           // dd($d->incremental);
        }
        // dd($emp3);
       // dd($emp4);
       // $newArray = array_slice($emp3, 0, 6);

        array_push($empDataQ,$emp1);
        array_push($empDataI,$emp2);
        array_push($empDataS,$emp3);


    }

   //dd($empDataS);
  // dd($empDataS);
    // foreach($empDataS as $key){
    //     $count_empDataS= count($empDataS);
    //     $count_key= count($key);
    //     //dd($key);
    //     for($t = 0; $t<$count_empDataS; $t++){
    //         $prevv=0;
    //         for($i = 1; $i<$count_key; $i++){

    //            $val[] =$key[$i] + $prevv[$i];
    //             }
    //             $prevv=$val[$t];

    //         }



    //     dd($prevv);
    // }
    $count_empDataS= count($empDataS);
    $sumSalary = array();
    foreach($empDataS[0] as $k => $v){
        $sumSalary[$k] = array_sum(array_column($empDataS, $k));
        $avarageSalary[$k] = array_sum(array_column($empDataS, $k)) /$count_empDataS;
    };
    $totleAvarageEmployeJobeToEndYear=$totleEmployeJobeToEndYear/$count_empDataS;
    array_push($sumSalary, $totleEmployeJobeToEndYear);
    $sumSalaryy = array_slice($sumSalary, 1, 6);
    array_push($avarageSalary, $totleAvarageEmployeJobeToEndYear);

    $avarageSalaryy = array_slice($avarageSalary, 1, 6);

//dd($avarageSalary);
       $totleEmployeMounth =0;
       $totleEmployeToEndYear=0;
       $totleEmployeYear=0;
      foreach($employees as $dataEmployes){
          $totleEmployeMounth += ($dataEmployes->annual_salary * $dataEmployes->quantity);
          $totleEmployeToEndYear += ($dataEmployes->annual_salary * $dataEmployes->quantity) * $remainingmonths;
          $totleEmployeYear += ($dataEmployes->annual_salary * $dataEmployes->quantity) * 12;

      };
      //array_push($empDataQ,$totleEmployeToEndYear);
    //   array_push($empDataI,$emp2);
    //   array_push($empDataS,$newArray);
     // dd($empDataQ);
     // dd($yearCurrent);
      //dd($totleEmployeMounth);
//dd($empDataQ);

//dd($avarageSalaryy);
//$operationDate = new DateTime($operationDate);
//$year= $operationDate->format('Y');


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
$totleIncomeAvaragee=0;
$totleIncomee=0;
$IncomeAvargePersent=0;
foreach($projectFsGeneralIncomeIncrementalDetail as $item =>$val){

    $IncomeAvargePersent +=$val['incremental'];

        $totleYear[$item]=
        ( (($val['incremental']/100 ) +1)) * $prev ;


    $prev =$totleYear[$item];

}
array_unshift($totleYear,$totleIncomeToEndYear);
for($i = 0; $i<6; $i++){
    $fs_salary_employs[]=$sumSalaryy[$i]/$totleYear[$i]*100;
}
//dd($fs_salary_employs);
//array_push($totleYear,$totleIncomeToEndYear);
//dd($fs_salary_employs);
// $totleIncomee=  array_sum($totleYear);
//dd($totleYear);
 return response()->json(['message'=>'success','data'=>$employees,'remainingmonths'=>$remainingmonths,
 'totleEmployeMounth'=>$totleEmployeMounth,'totleEmployeToEndYear'=>$totleEmployeToEndYear,
 'totleEmployeYear'=>$totleEmployeYear,'employeesDetailsQ'=>$empDataQ,'employeesDetailsI'=>$empDataI,
 'yearCurrent'=>$yearCurrent,'employeesDetailsS'=>$empDataS,'sumSalaryy'=>$sumSalaryy,
 'avarageSalaryy'=>$avarageSalaryy,'totleYear'=>$totleYear,'totleIncomeToEndYear'=>$totleIncomeToEndYear,
 'fs_salary_employs'=>$fs_salary_employs,
 'success'=>'تم تخزين  النسبة البيانات بنجاح']);

}
}
