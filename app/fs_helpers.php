<?php

use App\Models\admin\Project;
use App\Models\Employe;
use App\Models\ProjectExpGeneralIncome;
use App\Models\ProjectFsGeneralIncome;
use App\Models\ProjectFsGeneralIncomeIncremental;
use App\Models\ProjectFsGeneralIncomeIncrementalDetail;
use App\Models\ProjectFsGeneralAdministrativeExpenses;
use App\Models\ProjectFsGeneralAdministrativeExpensesDetails;
use App\Models\ProjectFsRent;
use App\Models\ProjectFsRentDetails;
use App\Models\ProjectFsSellingAndMarketingCost;
use App\Models\FsAccountReceivable;
use App\Models\FsWorkingCapital;
function projectDetail($id){
    $project = Project::where('id',$id)->where('owner_id' , Auth::user()->id)->first();
    $study_duration =$project->study_duration;
    $vat =$project->vat;

    // $projectStartDate = new DateTime($project->start_date);

         $operationDate = date('Y-m-d', strtotime("+".$project->development_duration." months", strtotime($project->start_date)));

        //$operationDate = new DateTime($operationDate);
        //$year= $operationDate->format('Y');
        $year= date('Y', strtotime($operationDate));

        $yearEnd = date('Y-m-d', strtotime('12/31/'.$year));

        //$yearEnd = date('Y-m-d', strtotime('12/31'));
        $datediff = strtotime($yearEnd) - strtotime($operationDate);

        $remainingDays =  round($datediff / (60 * 60 * 24));

        $remainingmonths =  round($datediff / (60 * 60 * 24*30));




    $project_type =$project->project_type;




return [
    'study_duration' => $study_duration,
    'vat' => $vat,
    'project_type' => $project_type,
    'year' => $year,
    'remainingDays' => $remainingDays,
    'remainingmonths' => $remainingmonths,

];
}


function years($id): array

{
   $firstYear = projectDetail($id)['year'];
   $duration = projectDetail($id)['study_duration'];
   $years = array();

//     $project = Project::where('id',$id)->first();
//     //dd($project);
//    $projectStartDate = new DateTime($project->start_date);
//                 $start_year = date('Y-m-d', strtotime($project->start_date));
//                 $model_assumptions = model_assumptions($start_year,'3', '365', '15');
//    $start_year = $model_assumptions['business_start_year'];

//dd($operationDate);

    for ($i = 0; $i < $duration; $i++) {

if($i==0){
    $nextYear = $firstYear + 1;

}else{
    $nextYear = $years[$i-1] + 1;
}

array_push($years,$nextYear);

    }


//    foreach ($years as $year){
//        echo $year . '<br>';
//    }
    return [
        'years' => $years,
    ];
}
function model_assumptions($work_start_date, $development_stage, $year_days_number, $vat): array
{
    $date = new DateTime($work_start_date);
    $date->modify('+' . ($development_stage) . 'month'); // or you can use '-90 day' for deduct
//    $date->modify('+' . (30) . 'day'); // or you can use '-90 day' for deduct
    $operation_start_date = new DateTime($date->format('Y-m-d'));
    $operation_start_year = $date->format('Y');

    $year = (new DateTime)->format("Y");
    $last_year_day = new DateTime($year . "-12-31");
    $last_year_day->format('Y-m-d');
    $rest_year_days_number = $last_year_day->diff($operation_start_date);

//    echo 'work_start_date : ' . $work_start_date .'<br>';
//    echo 'development_stage : ' . $development_stage .'<br>';
//    echo 'operation_start_date : ' . $operation_start_date->format('Y-m-d') .'<br>';
//    echo 'operation_start_year : ' . $operation_start_year .'<br>';
//    echo 'year_days_number : ' . $year_days_number == '' ? '365' : $year_days_number .'<br>';
//    echo 'rest_year_days_number : ' . ($rest_year_days_number->days) .'<br>';
//    echo 'Remaining Number of Months in a Financial Year : ' . $rest_year_days_number->m .'<br>';
//    echo 'vat : ' . $vat .'<br>';

    return [
        'business_start_date' => $work_start_date,
        'development_phase' => $development_stage,
        'operation_start_date' => $operation_start_date->format('Y-m-d'),
        'business_start_year' => $operation_start_year,
        'number_of_days_in_calender_year' => $year_days_number == '' ? '365' : $year_days_number,
        'number_of_days_in_financial_year' => ($rest_year_days_number->days - 30),
        'remaining_number_of_months_in_financial_year' => $rest_year_days_number->m,
        'vat' => $vat,
    ];

}

function incomeData($pro_id){
    //dd($pro_id);
    $project = Project::where('id',$pro_id)->first();

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

            $data = ProjectFsGeneralIncome::query()->where('project_id',$pro_id)->get();
           // dd($data);
            $totleIncomeMounth =0;
            $totleIncomeToEndYear=0;
            $totleIncomeYear=0;
            foreach($data as $dataa){
               $totleIncomeMounth += ($dataa->value * $dataa->quantity);
               $totleIncomeToEndYear += ($dataa->value * $dataa->quantity) * $remainingmonths;
               $totleIncomeYear += ($dataa->value * $dataa->quantity) * 12;

            };
            $projectFsGeneralIncomeIncremental = ProjectFsGeneralIncomeIncremental::where('project_id',$pro_id)->first();
            //dd($projectFsGeneralIncomeIncremental);
            $projectFsGeneralIncomeIncrementalDetail =ProjectFsGeneralIncomeIncrementalDetail::where('project_fs_income_incremental_id',$projectFsGeneralIncomeIncremental->id)->get()->toArray();
            //dd($projectFsGeneralIncomeIncrementalDetail);
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
            $dataFs = ProjectFsGeneralIncome::query()->where('project_id',$pro_id)->get();
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
    //dd($data);
               $dataa->quantity = ($dataa->quantity==0)?1:$dataa->quantity;
                           if($dataa->expensis_type ==0){
                               $expVale = $dataa->value  ;
                           } if($dataa->expensis_type ==1){
                               //dd($data);
                               $fsIncome=ProjectFsGeneralIncome::where('id',$dataa->fsIncome_id)->first();
                           if($fsIncome != null){
                               // dd($fsIncome);
                               $expVale=($dataa->value)* ($fsIncome->value/100) ;
                           }else{
                            $expVale = $dataa->value;
                           }
                           }
                           if($dataa->expensis_type ==2){
                               $expVale=($dataa->value/100) *$totleIncomeMounthFS ;
                               $expValeEN=($dataa->value/100) *$totleIncomeToEndYearFS ;
                               $expValeY=($dataa->value/100) *$totleIncomeYearFS ;
                           }
                          // dd($expValeEN);


               $totleIncomeMounth += $dataa->quantity * $expVale;
               $totleIncomeToEndYear = ($totleIncomeMounth * $remainingmonths) ;
               $totleIncomeYear = ($totleIncomeMounth  * 12);

           };

            return [
                'totleYear' => $totleYear,
                'totleIncomeMounth' => $totleIncomeMounth,
                'totleIncomeToEndYear'=>$totleIncomeToEndYear,
            ];
}
function projectFsRent($pro_id){

$data = ProjectFsRent::where('project_id', $pro_id)->first();
$item = ProjectFsRentDetails::where('rent_id', $data->id)->get();
//dd($data);
$totalRent=0;
foreach($item as $val){
    $totalRent += $val->value;}
//dd($totalRent);
return [
    'totalRent' => $totalRent,

];
}
function employe($pro_id){

$employees = Employe::where('project_id',$pro_id)->get();
    $totleEmployeMounth =0;
    $totleEmployeYear=0;
   foreach($employees as $dataEmployes){
       $totleEmployeMounth += ($dataEmployes->annual_salary * $dataEmployes->quantity);
       $totleEmployeYear += ($dataEmployes->annual_salary * $dataEmployes->quantity) * 12;

}
return [
    'totleEmployeMounth' => $totleEmployeMounth,

];
}

function marketingCost($pro_id){

$data = ProjectFsSellingAndMarketingCost::where('project_id',$pro_id)->get();
// dd($data);
foreach($data as $val){
    $marketingTotle =(($val->marketing_ratio / 100) * incomeData($pro_id)['totleIncomeToEndYear'])+$val->marketing_amount;
}

return [
    'marketingTotle' => $marketingTotle,

];
}

function administrativeExpenses($pro_id){
    $data = ProjectFsGeneralAdministrativeExpenses::where('project_id',$pro_id)->first();
    //dd($data);
    if ($data->type == 'ratio') {
        $administrativeExpensesTotle=$data->value;
    }
    if ($data->type == 'amount') {
        $administrativeExpensesTotle=$data->value;
    }
    if ($data->type == 'custom') {
        $item = ProjectFsGeneralAdministrativeExpensesDetails::with('expenses')->where('project_id', $pro_id)->get();
            $administrativeExpensesTotle = 0;
            foreach ($item as $i) {
                $administrativeExpensesTotle += $i->value;
            }
    }
    return [
        'administrativeExpensesTotle' => $administrativeExpensesTotle,

    ];
}

function fsWorkingCapital($pro_id){

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
  return [
    'totleOfWorkingCapital' => $totleOfWorkingCapital,

];
}
