<?php


use App\Models\admin\Project;
use App\Models\BalanceProjects;
use App\Models\Employe;
use App\Models\EmployeesDetails;
use App\Models\ProjectExpGeneralIncome;
use App\Models\ProjectExpGeneralIncomeIncremental;
use App\Models\ProjectExpGeneralIncomeIncrementalDetail;
use App\Models\ProjectFsGeneralAdministrativeExpenses;
use App\Models\ProjectFsGeneralAdministrativeExpensesDetails;
use App\Models\ProjectFsGeneralExpensesIncrementals;
use App\Models\ProjectFsGeneralExpensesIncrementalsDetails;
use App\Models\ProjectFsGeneralIncome;
use App\Models\ProjectFsGeneralIncomeIncremental;
use App\Models\ProjectFsGeneralIncomeIncrementalDetail;
use App\Models\ProjectFsOtherExpenses;
use App\Models\ProjectFsOtherExpensesIncrementalsDetails;
use App\Models\ProjectFsRent;
use App\Models\ProjectFsRentDetails;
use App\Models\ProjectFsSellingAndMarketingCost;
use App\Models\ProjectFsUtilities;
use App\Models\ProjectFsUtilitiesDetails;
use App\Models\ProjectFsUtilitiesIncrementalsDetails;

function operationModel($pro_id){
    $project = Project::where('id',$pro_id)->first();
    $operationDate = date('Y-m-d', strtotime("+".$project->development_duration." months", strtotime($project->start_date)));
    $year= date('Y', strtotime($operationDate));
    $yearCurrent = date('Y', strtotime('12/31'));
    $yearEnd = date('Y-m-d', strtotime('12/31/'.$year));
    $datediff = strtotime($yearEnd) - strtotime($operationDate);
    $remainingmonths =  round($datediff / (60 * 60 * 24*30));
    $remainingFromYear =  $remainingmonths/12;
    $development_duration=$project->development_duration;
    return['remainingmonths'=>$remainingmonths,'remainingFromYear'=>$remainingFromYear,'yearCurrent'=>$yearCurrent,'development_duration'=>$development_duration];
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

function first_year_sale_and_marketing($pro_id){
    $data = ProjectFsSellingAndMarketingCost::where('project_id', $pro_id)->first();
    $totalOfMarketing=0;
    $marketing_ratio = ($data->marketing_ratio / 100) * incomeData($pro_id)['totleIncomeToEndYear'];
    $marketing_amount = $data->marketing_amount;
    $marketing_growth_rate = $data->marketing_growth_rate;
    $totalOfMarketing=$marketing_ratio+$marketing_amount;
    return [
        'data' => $data,
        'marketing_ratio' => $marketing_ratio,
        'marketing_amount' => $marketing_amount,
        'marketing_growth_rate' => $marketing_growth_rate,
        'totalOfMarketing'=>$totalOfMarketing,
    ];
}
function fetch_marketing_details($pro_id)
{

    $data = ProjectFsSellingAndMarketingCost::where('project_id', $pro_id)->first();
    $item = 0;

    $item = ProjectFsSellingAndMarketingCost::where('project_id', $pro_id)->first();
    $current_value = $item->marketing_amount;
    $growth = ProjectFsSellingAndMarketingCost::where('project_id', $pro_id)->first();

    $prev = 0;
    foreach (years($pro_id)['years'] as $key => $year) {
        $prev = $current_value * (1 + ($growth->marketing_growth_rate / 100));
        $nxt1 = $prev * (1 + ($growth->marketing_growth_rate / 100));
        $nxt2 = $nxt1 * (1 + ($growth->marketing_growth_rate / 100));
        $nxt3 = $nxt2 * (1 + ($growth->marketing_growth_rate / 100));
        $nxt4 = $nxt3 * (1 + ($growth->marketing_growth_rate / 100));
    }

    $pre = 0;
    $current = ($current_value / incomeData($pro_id)['totleIncomeToEndYear']) * 100;
    foreach (years($pro_id)['years'] as $key => $year) {
        foreach (incomeData($pro_id)['totleYear'] as $key => $item) {
            $pre =    ($prev / $item) * 100;
            $next1 =  ($nxt1 / $item) * 100;;
            $next2 =  ($nxt2 / $item) * 100;;
            $next3 =  ($nxt3 / $item) * 100;;
            $next4 =  ($nxt4 / $item) * 100;;
        }
    }

    $yearCurrent = date('Y', strtotime('12/31'));
    return [
        'item' => $item,
        'data' => $data,
        'year' => $year,
        'yearCurrent'=>$yearCurrent,
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
    $remainingmonths=operationModel($pro_id)['remainingmonths'];
    $projectFsGeneralIncomeIncremental = ProjectFsGeneralIncomeIncremental::where('project_id',$pro_id)->first();
    $yearCurrent = date('Y', strtotime('12/31'));
    $projectFsGeneralIncomeIncrementalDetail =ProjectFsGeneralIncomeIncrementalDetail::where('project_fs_income_incremental_id',$projectFsGeneralIncomeIncremental->id)->get()->toArray();
    $data = ProjectFsGeneralIncome::query()->where('project_id',$pro_id)->get();
    $totleIncomeYear=0;
    $totleIncomeToEndYearFS=0;
    foreach($data as $dataa){
        $totleIncomeToEndYearFS += ($dataa->value * $dataa->quantity) * $remainingmonths;
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
    return['totleYear'=>$totleYear,'yearCurrent'=>$yearCurrent,'totleIncomeToEndYearFS'=>$totleIncomeToEndYearFS];
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
    $development_duration=operationModel($pro_id)['development_duration'];
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
    $IncomeAvargePersent = $IncomeAvargePersent /$development_duration;

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

function all_earnings_of_project($pro_id){
    $yearCurrent=operationModel($pro_id)['yearCurrent'];
    $remainingFromYear=operationModel($pro_id)['remainingFromYear'];

    $totleYearFs=Table_of_total_annual_revenues_during_the_study_period($pro_id)['totleYear'];

    $totleIncomeeFS=  array_sum($totleYearFs);
    $totleIncomeAvarageeFs =$totleIncomeeFS/(5+$remainingFromYear);

    $totleIncomeToEndYearFS=Table_of_total_annual_revenues_during_the_study_period($pro_id)['totleIncomeToEndYearFS'];

    $totleIncomeToEndYear_exp=Total_first_year_expenses_incremental($pro_id)['totleIncomeToEndYear'];

    $totleYear_exp= growth_of_expenses_incremental($pro_id)['totleYear'];
    $totleIncomeeExp=  array_sum($totleYear_exp);

    $totleIncomeAvaragee_exp =$totleIncomeeExp/(5+$remainingFromYear);
    $sumOfTotalYearFs=0;
    $marginOfSumOfTotalYearFs=0;
    foreach ($totleYearFs as $key=>$value){
        $profitMarginForYearWithOutFirst=((100*($value-$totleYear_exp[$key]))/$value);
        $sumOfTotalYearFs += $value-$totleYear_exp[$key];
        $marginOfSumOfTotalYearFs+=((100*($value-$totleYear_exp[$key]))/$value);
        $totalProfitForAllYearWithoutFirst[$key]=$value - $totleYear_exp[$key];
    }

    $totalProfit=($sumOfTotalYearFs+($totleIncomeToEndYearFS-$totleIncomeToEndYear_exp));
    $theAvarageOftotalProfit=$totalProfit/(operationModel($pro_id)['development_duration']+1);
    $theAverageOfTotalMarginProfit=(($marginOfSumOfTotalYearFs+(100*((($totleIncomeToEndYearFS)-($totleIncomeToEndYear_exp))/$totleIncomeToEndYearFS)))/(operationModel($pro_id)['development_duration']+1));
    $totalProfitOfFirstYear=( 100 *($totleIncomeToEndYearFS-$totleIncomeToEndYear_exp)/$totleIncomeToEndYearFS);
    $profitMarginForFirstYear = $totleIncomeToEndYearFS - $totleIncomeToEndYear_exp;

    return ['totleYearFs'=>$totleYearFs
        ,'totleYear_exp'=>$totleYear_exp,'yearCurrent'=>$yearCurrent,
        'totleIncomeToEndYearFS'=>$totleIncomeToEndYearFS,'totleIncomeToEndYear_exp'=>$totleIncomeToEndYear_exp,
        'totleIncomeeExp'=>$totleIncomeeExp,'totleIncomeeFS'=>$totleIncomeeFS,
        'totleIncomeAvaragee_exp'=>$totleIncomeAvaragee_exp,'totleIncomeAvarageeFs'=>$totleIncomeAvarageeFs,
        'profitMarginForYearWithOutFirst'=>$profitMarginForYearWithOutFirst,
        'totalProfit'=>$totalProfit,
        'totalProfitForAllYearWithoutFirst'=>$totalProfitForAllYearWithoutFirst,
        'totalProfitOfFirstYear'=>$totalProfitOfFirstYear,
        'profitMarginForFirstYear'=>$profitMarginForFirstYear,
        'theAvarageOftotalProfit'=>$theAvarageOftotalProfit,
        'theAverageOfTotalMarginProfit'=>$theAverageOfTotalMarginProfit,
      ];
}

function first_year_Administrative_expenses($pro_id){
    //get Administrative expenses for first year
    $data = ProjectFsGeneralAdministrativeExpenses::where('project_id',$pro_id)->first();
    $item = 0;
    $income=0;  //the value of income
    $totalOfExpenses = 0;   // total of all expenses in custome type
    if ($data->type == 'custom') {
        $item = ProjectFsGeneralAdministrativeExpensesDetails::with('expenses')->where('project_id', $pro_id)->get();
        foreach ($item as $i) {
            $totalOfExpenses += $i->value;
        }
    }elseif ($data->type == 'amount') {
        $income = incomeData($pro_id)['totleIncomeToEndYear'];
    }
    elseif ($data->type == 'ratio'){
        $income = ($data->value / 100)*(incomeData($pro_id)['totleIncomeToEndYear']);
    }
    return[
       'data'=>$data,'item'=>$item,'income'=>$income,'totalOfExpenses'=>$totalOfExpenses,
    ];
}

function growth_of_Administrative_expenses($pro_id){
    $data = ProjectFsGeneralExpensesIncrementals::where('project_id', $pro_id)->first();
    $development_duration=operationModel($pro_id)['development_duration'];
    $details = ProjectFsGeneralExpensesIncrementalsDetails::where('general_expenses_id', $data->id)->get();
    $IncomeAvargePersent=0;
    foreach($details as $item =>$val){
        $IncomeAvargePersent +=$val['incremental'];
    }
    $IncomeAvargePersent = $IncomeAvargePersent /$development_duration;
    return['data'=>$details,'IncomeAvargePersent'=>$IncomeAvargePersent];
}

function Toltal_Of_Administraitive_expenses($pro_id){

    $data = ProjectFsGeneralAdministrativeExpenses::where('project_id',$pro_id)->first();
    $item = 0;
    if ($data->type == 'custom') {
        $item = ProjectFsGeneralAdministrativeExpensesDetails::with('expenses')->where('project_id', $pro_id)->get();
        $current_value = 0;
        foreach ($item as $i) {
            $current_value += $i->value;
        }

        $growth = ProjectFsGeneralExpensesIncrementalsDetails::where('project_id',$pro_id)->get();
        $prev = 0;
        foreach (years($pro_id)['years'] as $key => $year) {
            $prev = $current_value * (1 + ($growth[$key]->incremental / 100));
            $nxt1 = $prev * (1 + ($growth[1]->incremental / 100));
            $nxt2 = $nxt1 * (1 + ($growth[2]->incremental / 100));
            $nxt3 = $nxt2 * (1 + ($growth[3]->incremental / 100));
            $nxt4 = $nxt3 * (1 + ($growth[4]->incremental / 100));
        }

        $pre = 0;
        $current = ($current_value / incomeData($pro_id)['totleIncomeToEndYear']) * 100;
        foreach (years($pro_id)['years'] as $key => $year) {
            foreach (incomeData($pro_id)['totleYear'] as $key => $item) {
                $pre =    ($prev / $item) * 100;
                $next1 =  ($nxt1 / $item) * 100;;
                $next2 =  ($nxt2 / $item) * 100;;
                $next3 =  ($nxt3 / $item) * 100;;
                $next4 =  ($nxt4 / $item) * 100;;
            }
        }
    }
    if ($data->type == 'amount') {
        $current_value = $data->value;
        $growth = ProjectFsGeneralExpensesIncrementalsDetails::where('project_id', $pro_id)->get();

        $prev = 0;
        foreach (years($pro_id)['years'] as $key => $year) {
            $prev = $current_value * (1 + ($growth[$key]->incremental / 100));
            $nxt1 = $prev * (1 + ($growth[1]->incremental / 100));
            $nxt2 = $nxt1 * (1 + ($growth[2]->incremental / 100));
            $nxt3 = $nxt2 * (1 + ($growth[3]->incremental / 100));
            $nxt4 = $nxt3 * (1 + ($growth[4]->incremental / 100));
        }

        $pre = 0;
        $current = ($current_value / incomeData($pro_id)['totleIncomeToEndYear']) * 100;
        foreach (years($pro_id)['years'] as $key => $year) {
            foreach (incomeData($pro_id)['totleYear'] as $key => $item) {
                $pre =    ($prev / $item) * 100;
                $next1 =  ($nxt1 / $item) * 100;;
                $next2 =  ($nxt2 / $item) * 100;;
                $next3 =  ($nxt3 / $item) * 100;;
                $next4 =  ($nxt4 / $item) * 100;;
            }
        }
    }
    if ($data->type == 'ratio') {
        $current_value = ($data->value / 100);
        $growth = ProjectFsGeneralExpensesIncrementalsDetails::where('project_id', $pro_id)->get();
        $prev = 0;
        foreach (years($pro_id)['years'] as $key => $year) {
            $prev = $current_value * (1 + ($growth[$key]->incremental / 100));
            $nxt1 = $prev * (1 + ($growth[1]->incremental / 100));
            $nxt2 = $nxt1 * (1 + ($growth[2]->incremental / 100));
            $nxt3 = $nxt2 * (1 + ($growth[3]->incremental / 100));
            $nxt4 = $nxt3 * (1 + ($growth[4]->incremental / 100));
        }

        $pre = 0;
        $current = ($current_value / incomeData($pro_id)['totleIncomeToEndYear']) * 100;
        foreach (years($pro_id)['years'] as $key => $year) {
            foreach (incomeData($pro_id)['totleYear'] as $key => $item) {
                $pre =    ($prev / $item) * 100;
                $next1 =  ($nxt1 / $item) * 100;;
                $next2 =  ($nxt2 / $item) * 100;;
                $next3 =  ($nxt3 / $item) * 100;;
                $next4 =  ($nxt4 / $item) * 100;;
            }
        }
    }
    $yearCurrent = date('Y', strtotime('12/31'));

    return [
        'item' => $item,
        'data' => $data,
        'year' => $yearCurrent,
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

function first_year_rent($pro_id){
    $data = ProjectFsRent::where('project_id', $pro_id)->first();
    if ($data->type == 'amount') {
        $data = ProjectFsRent::where('project_id', $pro_id)->first();
    }
    $total = 0;
    $item = 0;
    if ($data->type == 'custom') {
        $item = ProjectFsRentDetails::where('project_id', $pro_id)->get();

        foreach ($item as $i) {
            $total += $i->value;
        }
    }
    return [
        'data' => $data,
        'item' => $item,
        'total' => $total,
    ];
}

function Total_of_rent($pro_id){

    $rentArray = array();
    $data = ProjectFsRent::where('project_id',$pro_id)->first();
    $item = 0;
    if ($data->type == 'custom') {
        $rentItems = ProjectFsRentDetails::where('project_id',$pro_id)->get();

        $current_value = 0;
        $nxt1 = 0;
        $nxt2 = 0;
        $nxt3 = 0;
        $nxt4 = 0;
        $pre = 0;
        $next1 = 0;
        $next2 = 0;
        $next3 = 0;
        $next4 = 0;
        $current = 0;
        $prevValue = 0;
        $rentIncemental = 0;
        foreach ($rentItems as $item) {
            $prevValue = $item->value;
            $rentArrayy = [$item->title,$prevValue];
            $rentIncemental = $item->growth_rent;
            foreach (years($pro_id)['years'] as $key => $year) {
                $prevValue = $prevValue * (1 + ($item->growth_rent / 100));
                array_push($rentArrayy, $prevValue);
            }
            array_push($rentArray,$rentArrayy);
        }
        $prev = 0;
    }
    if ($data->type == 'amount') {
        // dd('s');
        $current_value = $data->value;
        $growth = ProjectFsRent::where('project_id', $pro_id)->get();
        $prev = 0;
        foreach (years($pro_id)['years'] as $key => $year) {
            $prev = $current_value * (1 + ($growth[0]->growth_rate_rent / 100));
            $nxt1 = $prev * (1 + ($growth[0]->growth_rate_rent / 100));
            $nxt2 = $nxt1 * (1 + ($growth[0]->growth_rate_rent / 100));
            $nxt3 = $nxt2 * (1 + ($growth[0]->growth_rate_rent / 100));
            $nxt4 = $nxt3 * (1 + ($growth[0]->growth_rate_rent / 100));
        }
        $pre = 0;
        $current = ($current_value / incomeData($pro_id)['totleIncomeToEndYear']) * 100;
        foreach (years($pro_id)['years'] as $key => $year) {
            foreach (incomeData($pro_id)['totleYear'] as $key => $item) {
                $pre =    ($prev / $item) * 100;
                $next1 =  ($nxt1 / $item) * 100;;
                $next2 =  ($nxt2 / $item) * 100;;
                $next3 =  ($nxt3 / $item) * 100;;
                $next4 =  ($nxt4 / $item) * 100;;
            }
        }
    }
    $yearCurrent = date('Y', strtotime('12/31'));
    return [
        'item' => $rentArray,
        'data' => $data,
        'year' => $yearCurrent,
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

function first_year_utilities_table($pro_id){
    $data = ProjectFsUtilities::where('project_id', $pro_id)->first();
    if ($data->type == 'amount') {
        $data = ProjectFsUtilities::where('project_id', $pro_id)->first();
    }
    $total = 0;
    $item = 0;
    if ($data->type == 'custom') {
        $item = ProjectFsUtilitiesDetails::where('project_id', $pro_id)->get();

        foreach ($item as $i) {
            $total += $i->value;
        }
    }
    return [
        'data' => $data,
        'item' => $item,
        'total' => $total,
    ];
}

function total_of_utilities_table($pro_id){
    $item = ProjectFsUtilitiesDetails::where('project_id', $pro_id)->get();
    $current_value = 0;
    foreach ($item as $i) {
        $current_value += $i->value;
    }
    $growth = ProjectFsUtilitiesIncrementalsDetails::where('project_id', $pro_id)->get();
    $prev = 0;
    foreach (years($pro_id)['years'] as $key => $year) {
        $prev = $current_value * (1 + ($growth[0]->incremental / 100));
        $nxt1 = $prev * (1 + ($growth[1]->incremental / 100));
        $nxt2 = $nxt1 * (1 + ($growth[2]->incremental / 100));
        $nxt3 = $nxt2 * (1 + ($growth[3]->incremental / 100));
        $nxt4 = $nxt3 * (1 + ($growth[4]->incremental / 100));
    }
    $prre = 0;
    $current = ($current_value / incomeData($pro_id)['totleIncomeToEndYear']) * 100;
    foreach (years($pro_id)['years'] as $key => $year) {
        foreach (incomeData($pro_id)['totleYear'] as $key => $item) {
            $prre =    ($prev / $item) * 100;
            $next1 =  ($nxt1 / $item) * 100;
            $next2 =  ($nxt2 / $item) * 100;
            $next3 =  ($nxt3 / $item) * 100;
            $next4 =  ($nxt4 / $item) * 100;
        }
    }
    $yearCurrent = date('Y', strtotime('12/31'));
    return [
        'item' => $item,
        'year' => $yearCurrent,
        'current_value' => $current_value,
        'current' => $current,
        'prev' => $prev,
        'nxt1' => $nxt1,
        'nxt2' => $nxt2,
        'nxt3' => $nxt3,
        'nxt4' => $nxt4,
        'prre' => $prre,
        'next1' => $next1,
        'next2' => $next2,
        'next3' => $next3,
        'next4' => $next4,
    ];
}

function first_year_other_expenses_table($pro_id){
    $data =\App\Models\ProjectFsOtherExpenses::where('project_id', $pro_id)->get();
    $total=0;
    foreach ($data as $value){
        $total +=$value->value;
    }
    return [
        'data' => $data,'total'=>$total
    ];
}
function growth_of_other_expenses($pro_id){
    $development_duration=operationModel($pro_id)['development_duration'];
    $details = ProjectFsOtherExpensesIncrementalsDetails::where('project_id', $pro_id)->get();
    $otherExpensesAvargePersent=0;
    foreach($details as $item =>$val){
        $otherExpensesAvargePersent +=$val['incremental'];
    }
    $otherExpensesAvargePersent = $otherExpensesAvargePersent /$development_duration;
    return ['data' => $details,'otherExpensesAvargePersent'=>$otherExpensesAvargePersent];
}
function total_other_expenses($pro_id){
    $item = ProjectFsOtherExpenses::where('project_id', $pro_id)->get();
    $current_value = 0;
    foreach ($item as $i) {
        $current_value += $i->value;
    }
    $growth = ProjectFsOtherExpensesIncrementalsDetails::where('project_id', $pro_id)->get();
    $prev = 0;
    foreach (years($pro_id)['years'] as $key => $year) {
        $prev = $current_value * (1 + ($growth[0]->incremental / 100));
        $nxt1 = $prev * (1 + ($growth[1]->incremental / 100));
        $nxt2 = $nxt1 * (1 + ($growth[2]->incremental / 100));
        $nxt3 = $nxt2 * (1 + ($growth[3]->incremental / 100));
        $nxt4 = $nxt3 * (1 + ($growth[4]->incremental / 100));
    }
    $yearCurrent = date('Y', strtotime('12/31'));
    $prre = 0;
    $current = ($current_value / incomeData($pro_id)['totleIncomeToEndYear']) * 100;
    foreach (years($pro_id)['years'] as $key => $year) {
        foreach (incomeData($pro_id)['totleYear'] as $key => $item) {
            $prre =    ($prev / $item) * 100;
            $next1 =  ($nxt1 / $item) * 100;
            $next2 =  ($nxt2 / $item) * 100;
            $next3 =  ($nxt3 / $item) * 100;
            $next4 =  ($nxt4 / $item) * 100;
        }}
    return [
        'item' => $item,
        'year' => $yearCurrent,
        'current_value' => $current_value,
        'current' => $current,
        'prev' => $prev,
        'nxt1' => $nxt1,
        'nxt2' => $nxt2,
        'nxt3' => $nxt3,
        'nxt4' => $nxt4,
        'pre' => $prre,
        'next1' => $next1,
        'next2' => $next2,
        'next3' => $next3,
        'next4' => $next4,
    ];
}

function first_year_balance_projects($pro_id,string $balance_type){
    $currentYear = date('Y', strtotime('12/31'));
    $sumCost=0;
    $totalCost=0;
    $sumCostOfYear=0;
    $totalCostOfYear=0;
    $sumCostOfCurrentYear=0;
    $totalCostOfCurrentYear=0;
    $totalCostOfAllYear=0;
    //get equipment and buildings for first year
    $data = BalanceProjects::where('project_id',$pro_id)->where('balance_type',$balance_type)->where('purchase_year', $currentYear)->get();
    $resultOfALlYear = BalanceProjects::where('project_id',$pro_id)->where('balance_type', $balance_type)->where('purchase_year','!=', $currentYear)->get();
    $resultOfCurrentYearWithOutReserve = BalanceProjects::where('project_id',$pro_id)->where('balance_type','!=', 'reserve')->where('purchase_year', $currentYear)->get();
    $resultOfALlYearWithOutReserve = BalanceProjects::where('project_id',$pro_id)->where('balance_type','!=', 'reserve')->where('purchase_year','!=', $currentYear)->get();

    foreach ($data as $value){
        $sumCost +=$value->cost;
        $totalCost +=$value->cost * $value->quantity;
    }
    foreach ($resultOfALlYear as $value){
        $sumCostOfYear +=$value->cost;
        $totalCostOfYear +=$value->cost * $value->quantity;
    }
    foreach ($resultOfCurrentYearWithOutReserve as $value){
        $totalCostOfCurrentYear +=($value->cost * $value->quantity);

    }
    foreach ($resultOfALlYearWithOutReserve as $value){
        $totalCostOfAllYear +=($value->cost * $value->quantity);

    }
    $reserves = BalanceProjects::where('project_id',$pro_id)->where('balance_type','reserve')->first();
    $reserve=$reserves->cost;
    $theReserveOfCurrentYear=$totalCostOfCurrentYear-($totalCostOfCurrentYear/$reserve);
    $theTotalOfCurrentYear=$theReserveOfCurrentYear+$totalCostOfCurrentYear;
    $theReserveOfAllYear=$totalCostOfAllYear-($totalCostOfAllYear/$reserve);
    $theTotalOfAllYear=$theReserveOfAllYear+$totalCostOfAllYear;
     return['data'=>$data,'sumCost'=>$sumCost,
         'totalCost'=>$totalCost,'resultOfALlYear'=>$resultOfALlYear,
          'sumCostOfYear'=>$sumCostOfYear,'totalCostOfYear'=>$totalCostOfYear,
         'totalCostOfCurrentYear'=>$totalCostOfCurrentYear,
         'theReserveOfCurrentYear'=>$theReserveOfCurrentYear,'theTotalOfCurrentYear'=>$theTotalOfCurrentYear,
         'resultOfCurrentYearWithOutReserve'=>$resultOfCurrentYearWithOutReserve,
         'resultOfALlYearWithOutReserve'=>$resultOfALlYearWithOutReserve,
         'totalCostOfAllYear'=>$totalCostOfAllYear,
         'theReserveOfAllYear'=>$theReserveOfAllYear,'theTotalOfAllYear'=>$theTotalOfAllYear
     ];
}
function total_of_balance_projects($pro_id,string $balance_type){
    $allData = BalanceProjects::where('project_id',$pro_id)->where('balance_type',$balance_type)->get();
    $depreciationData = array();
    $years= years($pro_id)['years'];
    $currentYear = date('Y', strtotime('12/31'));
    array_unshift($years,$currentYear);
    foreach($allData as $data){
        $emp1 = [$data->item];
        //  dd(count(years()['years']));
        foreach($years as $year){
            if($year ==$data->purchase_year){

                $yearcost=$data->quantity * $data->cost;
                $t = array_search($year, $years);
                for($i=$t ;$i < 6; $i++){
                    array_push($emp1, $yearcost);
                    $yearcost= $yearcost - ( $yearcost * $data->depreciation / 100);
                };
            }else{
                array_push($emp1,"0");
            }
        }
        $emp = array_slice($emp1, 0, 7);
        array_push($depreciationData,$emp);
    }
    return['depreciationData'=>$depreciationData];
}

