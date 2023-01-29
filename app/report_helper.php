<?php


use App\Models\admin\Project;
use App\Models\Employe;
use App\Models\EmployeesDetails;
use App\Models\ProjectExpGeneralIncome;
use App\Models\ProjectExpGeneralIncomeIncremental;
use App\Models\ProjectExpGeneralIncomeIncrementalDetail;
use App\Models\ProjectFsGeneralIncome;
use App\Models\ProjectFsGeneralIncomeIncremental;
use App\Models\ProjectFsGeneralIncomeIncrementalDetail;
use App\Models\ProjectFsSellingAndMarketingCost;

function operationModel($pro_id){
    $project = Project::where('id',$pro_id)->first();
    $operationDate = date('Y-m-d', strtotime("+".$project->development_duration." months", strtotime($project->start_date)));
    $year= date('Y', strtotime($operationDate));
    $yearCurrent = date('Y', strtotime('12/31'));
    $yearEnd = date('Y-m-d', strtotime('12/31/'.$year));
    $datediff = strtotime($yearEnd) - strtotime($operationDate);
    $remainingmonths =  round($datediff / (60 * 60 * 24*30));
    $remainingFromYear =  $remainingmonths/12;
    return['remainingmonths'=>$remainingmonths,'remainingFromYear'=>$remainingFromYear,'yearCurrent'=>$yearCurrent];
}

function numberOfyears($id): array

{
    $firstYear = projectDetail($id)['year'];
    $duration = projectDetail($id)['study_duration'];
    $years = array();

    for ($i = 0; $i < $duration; $i++) {

        if($i==0){
            $nextYear = $firstYear + 1;

        }else{
            $nextYear = $years[$i-1] + 1;
        }

        array_push($years,$nextYear);

    }
    return [
        'years' => $years,
    ];
}

function fetch_marketing_details($pro_id)
{

    $data = ProjectFsSellingAndMarketingCost::where('project_id', $pro_id)->first();
    $item = ProjectFsSellingAndMarketingCost::where('project_id',$pro_id)->first();
    $totleIncomeToEndYear=first_year_earnings($pro_id)['totleIncomeToEndYear'];
/*    dd($totleIncomeToEndYear);*/
//    $current_value = ($item->marketing_amount) + (($item->marketing_ratio/100)*ٌقيمة الايراد);
    $current_value = ($item->marketing_amount) + (($item->marketing_ratio/100)*$totleIncomeToEndYear);

    $growth = ProjectFsSellingAndMarketingCost::where('project_id', $pro_id)->first();
    $prev = 0;
    foreach (years($pro_id)['years'] as $key => $year) {
        $prev = $current_value * (1 + ($growth->marketing_growth_rate / 100));
        $nxt1 = $prev * (1 + ($growth->marketing_growth_rate / 100));
        $nxt2 = $nxt1 * (1 + ($growth->marketing_growth_rate / 100));
        $nxt3 = $nxt2 * (1 + ($growth->marketing_growth_rate / 100));
        $nxt4 = $nxt3 * (1 + ($growth->marketing_growth_rate/ 100));
    }

    $pre = 0;
    $current = ($current_value / 500) * 100;
    foreach (years(1)['years'] as $key => $year) {
        $pre =    ($prev / 500) * 100;
        $next1 =  ($nxt1 / 500) * 100;;
        $next2 =  ($nxt2 / 500) * 100;;
        $next3 =  ($nxt3 / 500) * 100;;
        $next4 =  ($nxt4 / 500) * 100;;
    }

    return [
        'item' => $item,
        'data' => $data,
        'year' => $year,
        'current_value' => $current_value,
        'prev' => $prev,
        'nxt1' => $nxt1,
        'nxt2' => $nxt2,
        'nxt3' => $nxt3,
        'nxt4' => $nxt4,
        'pre' => $pre,
        'next1' => $next1,
        'next2' => $next2,
        'next3' => $next3,
        'next4' => $next4,
        'current' => $current,
    ];
}

function first_year_earnings($pro_id){
    $remainingmonths=operationModel($pro_id)['remainingmonths'];
    $data = ProjectFsGeneralIncome::query()->where('project_id',$pro_id)->get();
    $totleIncomeMounth =0;
    $totleIncomeToEndYear=0;
    $totleIncomeYear=0;
    foreach($data as $dataa){
        $totleIncomeMounth += ($dataa->value * $dataa->quantity);
        $totleIncomeToEndYear += ($dataa->value * $dataa->quantity) * $remainingmonths;
        $totleIncomeYear += ($dataa->value * $dataa->quantity) * 12;

      }

    return ['data'=>$data,
        'remainingmonths'=>$remainingmonths,'totleIncomeMounth'=>$totleIncomeMounth
        ,'totleIncomeToEndYear'=>$totleIncomeToEndYear,'totleIncomeYear'=>$totleIncomeYear,
    ];
}

function annual_growth_rate_of_revenues_during_the_study_period($pro_id){

    $projectFsGeneralIncome = ProjectFsGeneralIncomeIncremental::query()->where('project_id',$pro_id)->first();

    $data =ProjectFsGeneralIncomeIncrementalDetail::where('project_fs_income_incremental_id',$projectFsGeneralIncome->id)->get();
    return ['data'=>$data,'projectFsGeneralIncome'=>$projectFsGeneralIncome];

}

function Table_of_total_annual_revenues_during_the_study_period($pro_id){
    $projectFsGeneralIncomeIncremental = ProjectFsGeneralIncomeIncremental::where('project_id',$pro_id)->first();
    $yearCurrent = date('Y', strtotime('12/31'));
    $projectFsGeneralIncomeIncrementalDetail =ProjectFsGeneralIncomeIncrementalDetail::where('project_fs_income_incremental_id',$projectFsGeneralIncomeIncremental->id)->get()->toArray();
    $data = ProjectFsGeneralIncome::query()->where('project_id',$pro_id)->get();
    $totleIncomeYear=0;
    foreach($data as $dataa){
        $totleIncomeYear += ($dataa->value * $dataa->quantity) * 12;
    };

    $prev=$totleIncomeYear;
    $IncomeAvargePersent=0;
    foreach($projectFsGeneralIncomeIncrementalDetail as $item =>$val){
        $IncomeAvargePersent +=$val['incremental'];
        $totleYear[$val['year']]=
            ( (($val['incremental']/100 ) +1)) * $prev ;
        $prev =$totleYear[$val['year']];
    }
    return['totleYear'=>$totleYear,'yearCurrent'=>$yearCurrent];
}

function first_year_job($pro_id){
    $remainingmonths=operationModel($pro_id)['remainingmonths'];
    //get employee for first year
    $employees=\App\Models\Employe::where('project_id',$pro_id)->get();

    // to return all sum
    $totleEmployeMounth =0;
    $totleEmployeToEndYear=0;
    $totleEmployeYear=0;
    $sumOfQuantity=0;
    foreach($employees as $dataEmployes){
        $totleEmployeMounth += ($dataEmployes->annual_salary * $dataEmployes->quantity);
        $totleEmployeToEndYear += ($dataEmployes->annual_salary * $dataEmployes->quantity) * $remainingmonths;
        $totleEmployeYear += ($dataEmployes->annual_salary * $dataEmployes->quantity) * 12;
        $sumOfQuantity += $dataEmployes->quantity;
    }
    return['employees'=>$employees,'remainingmonths'=>$remainingmonths,
    'totleEmployeMounth'=>$totleEmployeMounth,'totleEmployeToEndYear'=>$totleEmployeToEndYear,
     'totleEmployeYear'=>$totleEmployeYear,'sumOfQuantity'=>$sumOfQuantity,
    ];
}

function change_number_of_employee($pro_id){
    $employees = Employe::where('project_id',$pro_id)->get();
    $empDataQ = array();
    foreach($employees as $employee){
        $employeesDetails = EmployeesDetails::where('employes_id' , $employee->id)->get();
        $emp1 = [$employee->job];
        foreach ($employeesDetails as $d  ){
            array_push($emp1, $d->quantity);
        }
        array_push($empDataQ,$emp1);
    }
    return['empDataQuantity'=>$empDataQ];
}

function change_incremental_of_employee($pro_id){
    $employees = Employe::where('project_id',$pro_id)->get();
    $empDataIncremental = array();
    foreach($employees as $employee){
        $employeesDetails = EmployeesDetails::where('employes_id' , $employee->id)->get();
        $emp1 = [$employee->job];
        foreach ($employeesDetails as $d  ){

            array_push($emp1, $d->incremental);
        }
        array_push($empDataIncremental,$emp1);
    }
    return['empDataIncremental'=>$empDataIncremental];
}

function change_salaries_of_employee($pro_id){
    $remainingmonths=operationModel($pro_id)['remainingmonths'];
    $employees = Employe::where('project_id',$pro_id)->get();
    $empDataS = array();
    $totleEmployeJobeToEndYear=0;
    foreach($employees as $employee){
        $employeesDetails = EmployeesDetails::where('employes_id' , $employee->id)->get();
        $EmployeJobeToEndYear =$employee->annual_salary*$employee->quantity*$remainingmonths;
        $totleEmployeJobeToEndYear +=$employee->annual_salary*$employee->quantity*$remainingmonths;
        $emp3 = [ $employee->job,$EmployeJobeToEndYear];
        $prev = $employee->annual_salary ;
        foreach ($employeesDetails as $d  ){
            $prev = $prev * (($d->incremental/100) +1) ;
            $totle = $prev  * ($d->quantity) * 12;
            array_push($emp3, $totle);
        }
        array_push($empDataS,$emp3);
    }
    $count_empDataS= count($empDataS);
    $sumSalary = array();
    foreach($empDataS[0] as $k => $v){
        $sumSalary[$k] = array_sum(array_column($empDataS, $k));
        $avarageSalary[$k] = array_sum(array_column($empDataS, $k)) /$count_empDataS;
    }
    $empDataS =array_reverse($empDataS);
    return['empDataS'=>$empDataS,'totleEmployeJobeToEndYear'=>$totleEmployeJobeToEndYear];
}

function sum_summary_of_change_of_salaries($pro_id){
    $empDataS=change_salaries_of_employee($pro_id)['empDataS'];
    $totleEmployeJobeToEndYear=change_salaries_of_employee($pro_id)['totleEmployeJobeToEndYear'];
    $sumSalary = array();
    foreach($empDataS[0] as $k => $v){
        $sumSalary[$k] = array_sum(array_column($empDataS, $k));
    }
    array_push($sumSalary, $totleEmployeJobeToEndYear);
    $sumSalaryy = array_slice($sumSalary, 1, 6);
    return['sumSalaryy'=>$sumSalaryy];
}

function first_year_expenses_incremental($pro_id){
    $remainingmonths=operationModel($pro_id)['remainingmonths'];
    //get expenses for first year
    $expensesIncome = ProjectExpGeneralIncome::query()->where('project_id', $pro_id)->get();
    // to return all sum
    $totleIncomeMounthFS =0;
    $totleIncomeToEndYearFS=0;
    $totleIncomeYearFS=0;
    foreach($expensesIncome as $expenses){
        $totleIncomeMounthFS += ($expenses->value * $expenses->quantity);
        $totleIncomeToEndYearFS += ($expenses->value * $expenses->quantity) * $remainingmonths;
        $totleIncomeYearFS += ($expenses->value * $expenses->quantity) * 12;
    }
    return[
        'expensesIncome'=>$expensesIncome,'totleIncomeMounthFS'=>$totleIncomeMounthFS,
        'totleIncomeToEndYearFS'=>$totleIncomeToEndYearFS,
        'totleIncomeYearFS'=>$totleIncomeYearFS,
        'remainingmonths'=>$remainingmonths
    ];
}

function Total_first_year_expenses_incremental($pro_id){
    $firstYearExpensesIncremental=first_year_expenses_incremental($pro_id);
    $data = ProjectExpGeneralIncome::with('fsIncome')->where('project_id', $pro_id)->get();
    $totleIncomeMounth =0;
    $totleIncomeToEndYear=0;
    $totleIncomeYear=0;
    foreach($data as $dataa){
        $dataa->quantity = ($dataa->quantity==0)?1:$dataa->quantity;
        if($dataa->expensis_type =='0'){
            $expVale = $dataa->value  ;
        } if($dataa->expensis_type =='1'){
            $fsIncome=ProjectFsGeneralIncome::where('id',$dataa->fsIncome_id)->first();
            $expVale=($dataa->value)* ($fsIncome->value/100) ;
        }
        if($dataa->expensis_type =='2'){
            $expVale=($dataa->value/100) *$firstYearExpensesIncremental['totleIncomeMounthFS'] ;
            $expValeEN=($dataa->value/100) *$firstYearExpensesIncremental['totleIncomeToEndYearFS'] ;
            $expValeY=($dataa->value/100) *$firstYearExpensesIncremental['totleIncomeYearFS'] ;
        }
        $totleIncomeMounth += $dataa->quantity * $expVale;
        $totleIncomeToEndYear = ($totleIncomeMounth * $firstYearExpensesIncremental['remainingmonths']) ;
        $totleIncomeYear = ($totleIncomeMounth  * 12);
    }

    return['totleIncomeMounth'=>$totleIncomeMounth
        ,'totleIncomeToEndYear'=>$totleIncomeToEndYear,'totleIncomeYear'=>$totleIncomeYear];
}

function growth_of_expenses_incremental($pro_id){
    $totleIncomeYear=Total_first_year_expenses_incremental($pro_id)['totleIncomeYear'];
    $projectExpGeneralIncome = ProjectExpGeneralIncomeIncremental::query()->where('project_id', $pro_id)->first();
    $projectExpGeneralIncomeIncrementalDetail =ProjectExpGeneralIncomeIncrementalDetail::where('project_exp_income_incremental_id',$projectExpGeneralIncome->id)->get();
    $IncomeAvargePersent=0;
    $prev=$totleIncomeYear;
    foreach($projectExpGeneralIncomeIncrementalDetail as $item =>$val){
        $IncomeAvargePersent +=$val['incremental'];
        $totleYear[$val['year']]=
            ( (($val['incremental']/100 ) +1)) * $prev ;
        $prev =$totleYear[$val['year']];
    }
    $IncomeAvargePersent = $IncomeAvargePersent /5;

    return ['dataOfGrowthExpenses'=>$projectExpGeneralIncomeIncrementalDetail,
        'projectExpGeneralIncome'=>$projectExpGeneralIncome,
        'IncomeAvargePersent'=>$IncomeAvargePersent,'totleYear'=>$totleYear,
    ];

}

function Total_expenses_incremental($pro_id){
    $yearCurrent=operationModel($pro_id)['yearCurrent'];
    $totleIncomeToEndYear= Total_first_year_expenses_incremental($pro_id)['totleIncomeToEndYear'];
    $totleYear=growth_of_expenses_incremental($pro_id)['totleYear'];
    return ['yearCurrent'=>$yearCurrent,'totleIncomeToEndYear'=>$totleIncomeToEndYear,
        'totleYear'=>$totleYear
        ];
}



