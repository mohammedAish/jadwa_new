<?php

////////////////////////////////////////////// Dashboard \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

use App\Models\Capex;
use App\Models\CapitalInvestment;
use App\Models\CloseCost;
use App\Models\CostOfGood;
use App\Models\Employee;
use App\Models\GeneralAdminExpenses;
use App\Models\Payment;
use App\Models\ProjectRevenue;
use App\Models\RentAndUtilities;
use App\Models\SellingAndMarketing;
use App\Models\ShareCapital;
use App\Models\ProjectFsGeneralIncomeIncremental;

const study_duration = 5;
const selected_study_duration = 5;

function years(): array
{
    $model_assumptions = model_assumptions('2023-10-01', '3', '365', '15');
    $start_year = $model_assumptions['business_start_year'];

    $years = array($start_year);
    for ($i = 0; $i < study_duration - 1; $i++) {
        $years[] = $years[$i] + 1;
    }

//    foreach ($years as $year){
//        echo $year . '<br>';
//    }
    return [
        'start_year' => $start_year,
        'years' => $years,
    ];
}

const entered_average_footfall_per_day = 100;
const entered_average_order_size = 70;
const entered_number_of_days_in_financial_year = 153;
const selling_and_marketing_expenses_type = 'of_revenue';
const inventory = 15;
const working_capital_cogs = 0.5;
const working_capital_rent = 6.0;
const working_capital_salaries = 3.0;
const working_capital_selling_and_marketing_expenses = 3.0;
const working_capital_general_and_admin_expenses = 3.0;


//************************************************************* Start Of Incremental **********************************************************************

function years_average_footfall_per_day(): array // Average Footfall Per Day
{
    $value = ProjectRevenue::query()->where('key', 'average_footfall_per_day')->where('project_id', 1)->first();

    $average_footfall_per_day = array();
    $years = years();
    foreach ($years['years'] as $year) {
        if ($year == $years['start_year']) {
            $average_footfall_per_day[$year] = $value['value'];
        } else {
            $average_footfall_per_day[$year] = $value['default_increment'];
        }
//        echo $average_footfall_per_day[$year] . '<br>';
    }
    return $average_footfall_per_day;
}

function years_average_order_size(): array // Average Order Size
{
    $value = ProjectRevenue::query()->where('key', 'average_order_size')->where('project_id', 1)->first();

    $average_order_size = array();
    $years = years();
    foreach ($years['years'] as $year) {
        if ($year == $years['start_year']) {
            $average_order_size[$year] = $value['value'];
        } else {
            $average_order_size[$year] = $value['default_increment'];
        }
//        echo $average_order_size[$year] . '<br>';
    }
    return $average_order_size;
}

function years_general_and_admin_expenses(): array
{
    $value = GeneralAdminExpenses::query()->where('key', 'general_admin_expenses')->where('project_id', 1)->first();

    $general_admin_expenses = array();
    $years = years();
    foreach ($years['years'] as $year) {
        if ($year == $years['start_year']) {
            $general_admin_expenses[$year] = $value['value'];
        } else {
            $general_admin_expenses[$year] = $value['default_increment'];
        }
//        echo $year . ' : ' .  $general_admin_expenses[$year] . '<br>';
    }
    return $general_admin_expenses;
}

function years_head_count(): array
{
    $values = Employee::query()->where('project_id', 1)->get();
    $years = years();
    $employees = array();
    foreach ($values as $item) {
//        echo  $item['employee_name'] .'<br>';
        foreach ($years['years'] as $year) {
//            echo $year . ' : ' ;
//            $employees[$item['employee_name']] = $item['employee_name'];
            if ($year == $years['start_year']) {
                $employees[$item['employee_name']][$year] = $item['employee_headcount'];
            } else {
                $employees[$item['employee_name']][$year] = $item['employee_headcount_increase'];
            }
//            echo  $employees[$item['employee_name']][$year] . '<br>';

        }
    }
    //
    //
    //    foreach ($years['years'] as $year){
    //        echo $year . ' : ' . '<br>';
    //        foreach ($values as $item){
    //            if ($year == $years['start_year']){
    //                $employees[$item['employee_name']][$year] = $item['employee_headcount'];
    //            }else{
    //                $employees[$item['employee_name']][$year] = $item['employee_headcount_increase'];
    //            }
    //            echo $item['employee_name'] . ' : ' . $employees[$item['employee_name']][$year] . '<br>';
    //
    //        }
    //
    //
    //    }

//    foreach ($employees as $key => $employee){
//        echo $employee . '<br>';
//        foreach ($years['years'] as $year){
//            if ($year == $years['start_year']){
//                $employee[$year] = $values[$key]['employee_headcount'];
//            }else{
//                $employee[$year] = $values[$key]['employee_headcount_increase'];
//            }
//            echo $year . ' : ' .  $employee[$year] .  '<br>';
//        }
//        echo '*************************************************' . '<br>';
//    }


//    $head_count = array(
//        "employee_1"=>[
//            "2022"=>"1","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//        ],
//        "employee_2"=>[
//            "2022"=>"1","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//        ],
//        "employee_3"=>[
//            "2022"=>"1","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//        ],
//        "employee_4"=>[
//            "2022"=>"1","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//        ],
//        "employee_5"=>[
//            "2022"=>"1","2023"=>"0","2024"=>"0","2025"=>"2","2026"=>"-1","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//        ],
//        "employee_6"=>[
//            "2022"=>"1","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//        ],
//        "employee_7"=>[
//            "2022"=>"1","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//        ],
//        "employee_8"=>[
//            "2022"=>"1","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//        ],
//        "employee_9"=>[
//            "2022"=>"1","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//        ],
//        "employee_10"=>[
//            "2022"=>"1","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//        ],
//        "employee_11"=>[
//            "2022"=>"1","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//        ],
//        "employee_12"=>[
//            "2022"=>"1","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//        ],
//        "employee_13"=>[
//            "2022"=>"1","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//        ],
//        "employee_14"=>[
//            "2022"=>"1","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//        ],
//        "employee_15"=>[
//            "2022"=>"1","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//        ],
//        "employee_16"=>[
//            "2022"=>"1","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//        ],
//        "employee_17"=>[
//            "2022"=>"1","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//        ],
//        "employee_18"=>[
//            "2022"=>"1","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//        ],
//        "employee_19"=>[
//            "2022"=>"1","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//        ],
//        "employee_20"=>[
//            "2022"=>"1","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//        ],
//    );

    return [
        'head_count' => $employees,
    ];
}

function years_staff_salaries(): array
{

    $values = Employee::query()->where('project_id', 1)->get();
    $years = years();
    $employees = array();
    foreach ($values as $item) {
//        echo  $item['employee_name'] .'<br>';
        foreach ($years['years'] as $year) {
//            echo $year . ' : ' ;
//            $employees[$item['employee_name']] = $item['employee_name'];
            if ($year == $years['start_year']) {
                $employees[$item['employee_name']][$year] = $item['employee_salary'];
            } else {
                $employees[$item['employee_name']][$year] = $item['employee_salary_increase'];
            }
//            echo  $employees[$item['employee_name']][$year] . '<br>';

        }
    }


//      $staff_salaries = array(
//          "employee_1"=>[
//              "2022"=>"60000","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//          ],
//          "employee_2"=>[
//              "2022"=>"60000","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//          ],
//          "employee_3"=>[
//              "2022"=>"60000","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//          ],
//          "employee_4"=>[
//              "2022"=>"60000","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//          ],
//          "employee_5"=>[
//              "2022"=>"60000","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//          ],
//          "employee_6"=>[
//              "2022"=>"60000","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//          ],
//          "employee_7"=>[
//              "2022"=>"60000","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//          ],
//          "employee_8"=>[
//              "2022"=>"60000","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//          ],
//          "employee_9"=>[
//              "2022"=>"60000","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//          ],
//          "employee_10"=>[
//              "2022"=>"60000","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//          ],
//          "employee_11"=>[
//              "2022"=>"0","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//          ],
//          "employee_12"=>[
//              "2022"=>"0","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//          ],
//          "employee_13"=>[
//              "2022"=>"0","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//          ],
//          "employee_14"=>[
//              "2022"=>"0","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//          ],
//          "employee_15"=>[
//              "2022"=>"0","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//          ],
//          "employee_16"=>[
//              "2022"=>"0","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//          ],
//          "employee_17"=>[
//              "2022"=>"0","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//          ],
//          "employee_18"=>[
//              "2022"=>"0","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//          ],
//          "employee_19"=>[
//              "2022"=>"0","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//          ],
//          "employee_20"=>[
//              "2022"=>"0","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0",
//          ],
//      );

    return [
        'staff_salaries' => $employees,
    ];
}

function years_rent_and_utilities(): array
{
    $value = RentAndUtilities::query()->where('key', 'Rent & Utilities')->where('project_id', 1)->first();

    $rent_and_utilities = array();
    $years = years();
    foreach ($years['years'] as $year) {
        if ($year == $years['start_year']) {
            $rent_and_utilities[$year] = $value['value'];
        } else {
            $rent_and_utilities[$year] = $value['default_increment'];
        }
//        echo $rent_and_utilities[$year] . '<br>';
    }
    return $rent_and_utilities;
}

function years_selling_and_marketing_expenses_of_revenue(): array
{
    $value = SellingAndMarketing::query()->where('key', 'selling_and_marketing_expenses')->where('project_id', 1)->first();

    $selling_and_marketing_expenses = array();
    $years = years();
    foreach ($years['years'] as $year) {
        if ($year == $years['start_year']) {
            $selling_and_marketing_expenses[$year] = $value['value'];
        } else {
            $selling_and_marketing_expenses[$year] = $value['default_increment'];
        }
//        echo $year . ' : ' .  $general_admin_expenses[$year] . '<br>';
    }
    return $selling_and_marketing_expenses;
}

function years_selling_and_marketing_expenses(): array
{
//    $value = SellingAndMarketing::query()->where('key' , 'selling_and_marketing_expenses') ->where('project_id',1)->first();

    $selling_and_marketing_expenses = array();
    $years = years();
    foreach ($years['years'] as $year) {
        if ($year == $years['start_year']) {
            $selling_and_marketing_expenses[$year] = 20000;
        } else {
            $selling_and_marketing_expenses[$year] = 0;
        }
//        echo $year . ' : ' .  $general_admin_expenses[$year] . '<br>';
    }
    return $selling_and_marketing_expenses;
}

function years_balance_sheet_capex(): array
{
    $values = Capex::query()->where('project_id', 1)->get();
    $years = years();
    $capex = array();

    foreach ($values as $item) {
//        echo  $item['key'] .'<br>';
        foreach ($years['years'] as $year) {
//            echo $year . ' : ' ;
//            $employees[$item['employee_name']] = $item['employee_name'];
            if ($year == $years['start_year']) {
                $capex[$item['key']][$year] = $item['value'];
            } else {
                $capex[$item['key']][$year] = $item['default_increment'];
            }
//            echo  $capex[$item['key']][$year] . '<br>';

        }
//        echo '***************************************************************' .'<br>';
    }

//
//    $furniture_and_fixture = array("2022"=>"100000","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0");
//    $equipment = array("2022"=>"109000","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0");
//    $project_start_up_cost  = array("2022"=>"149950","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0");
//    $spare_1 = array("2022"=>"149950","2023"=>"0","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0");
//
    return [
        'capex' => $capex,
    ];
}

function years_balance_sheet_depreciation_amortization(): array
{

    $values = Capex::query()->where('project_id', 1)->get();
    $years = years();
    $capex = array();

    foreach ($values as $item) {
//        echo  $item['key'] .'<br>';
        foreach ($years['years'] as $year) {
//            echo $year . ' : ' ;
//            $employees[$item['employee_name']] = $item['employee_name'];
            if ($year == $years['start_year']) {
                $capex[$item['key']][$year] = $item['depreciation'];
            } else {
                $capex[$item['key']][$year] = $item['depreciation_increase'];
            }
//            echo  $capex[$item['key']][$year] . '<br>';

        }
//        echo '***************************************************************' .'<br>';
    }


//
//    $furniture_and_fixture = array("2022"=>"1.66666666666667","2023"=>"5","2024"=>"5","2025"=>"5","2026"=>"5","2027"=>"5","2028"=>"5","2029"=>"5","2030"=>"5","2031"=>"5");
//    $equipment = array("2022"=>"0.416666666666667","2023"=>"5","2024"=>"5","2025"=>"5","2026"=>"5","2027"=>"5","2028"=>"5","2029"=>"5","2030"=>"5","2031"=>"5");
//    $project_start_up_cost  = array("2022"=>"0.416666666666667","2023"=>"5","2024"=>"5","2025"=>"5","2026"=>"5","2027"=>"5","2028"=>"5","2029"=>"5","2030"=>"5","2031"=>"5");
//    $spares = array(
//        "2022"=>[
//            "spare_1"=>"0.416666666666667","spare_2"=>"0.416666666666667","spare_3"=>"0.416666666666667","spare_4"=>"0.416666666666667","spare_5"=>"0.416666666666667",
//        ],
//        "2023"=>[
//            "spare_1"=>"5","spare_2"=>"5","spare_3"=>"5","spare_4"=>"5","spare_5"=>"5",
//        ],
//        "2024"=>[
//            "spare_1"=>"5","spare_2"=>"5","spare_3"=>"5","spare_4"=>"5","spare_5"=>"5",
//        ],
//        "2025"=>[
//            "spare_1"=>"5","spare_2"=>"5","spare_3"=>"5","spare_4"=>"5","spare_5"=>"5",
//        ],
//        "2026"=>[
//            "spare_1"=>"5","spare_2"=>"5","spare_3"=>"5","spare_4"=>"5","spare_5"=>"5",
//        ],
//        "2027"=>[
//            "spare_1"=>"5","spare_2"=>"5","spare_3"=>"5","spare_4"=>"5","spare_5"=>"5",
//        ],
//        "2028"=>[
//            "spare_1"=>"5","spare_2"=>"5","spare_3"=>"5","spare_4"=>"5","spare_5"=>"5",
//        ],
//        "2029"=>[
//            "spare_1"=>"5","spare_2"=>"5","spare_3"=>"5","spare_4"=>"5","spare_5"=>"5",
//        ],
//        "2030"=>[
//            "spare_1"=>"5","spare_2"=>"5","spare_3"=>"5","spare_4"=>"5","spare_5"=>"5",
//        ],
//        "2031"=>[
//            "spare_1"=>"5","spare_2"=>"5","spare_3"=>"5","spare_4"=>"5","spare_5"=>"5",
//        ],
//    );

    return [
        'capex' => $capex,
    ];
}

function years_accounts_receivables(): array
{
    $value = Payment::query()->where('project_id', 1)->first();

    $accounts_receivables = array();
    $years = years();
    foreach ($years['years'] as $year) {
//        echo $year . ' =>>>' . '<br>';
        if ($year == $years['start_year']) {
            $accounts_receivables[$year] = $value['accounts_receivable'];
        } else {
            $accounts_receivables[$year] = $value['accounts_receivable_increase'];
        }
//        echo $accounts_receivables[$year] . '<br>';
    }
    return $accounts_receivables;

//    return array("2022"=>"10","2023"=>"10","2024"=>"0","2025"=>"0","2026"=>"0","2027"=>"0","2028"=>"0","2029"=>"0","2030"=>"0","2031"=>"0");

}

function years_accounts_payable(): array
{
    $value = Payment::query()->where('project_id', 1)->first();

    $accounts_payable = array();
    $years = years();
    foreach ($years['years'] as $year) {
//        echo $year . ' =>>>' . '<br>';
        if ($year == $years['start_year']) {
            $accounts_payable[$year] = $value['accounts_payable'];
        } else {
            $accounts_payable[$year] = $value['accounts_payable_increase'];
        }
//        echo $accounts_payable[$year] . '<br>';
    }
    return $accounts_payable;

//    return array("2022"=>"15","2023"=>"15","2024"=>"15","2025"=>"15","2026"=>"15","2027"=>"15","2028"=>"15","2029"=>"15","2030"=>"15","2031"=>"15");
}

//************************************************************* End Of Incremental **********************************************************************
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

function cost_of_goods_sold_assumptions(): array
{

    $direct_cost = array();
    $years = years();
    $cost_of_good = CostOfGood::query()->where('project_id', 1)->get();


    foreach ($years['years'] as $year) {
        if (!array_key_exists($year, $direct_cost)) {
            $direct_cost[$year] = 0;
        }

        foreach ($cost_of_good as $item) {
            $direct_cost[$year] += $item['value'];
//            echo $year . ' : ' . $item['key'] . ' : ' .  $direct_cost[$year] . '<br>';
        }
//        echo '**********************************************************************' . '<br>';


    }

//    foreach ($direct_cost as $key => $item){
//        echo $key . ' : ' . $item . '<br>';
//    }

    $total_direct_costs = array();
//    foreach ($direct_cost as $key => $item){
//        echo $key . ' : ' . $item . '<br>';
//    }
    return [
        'direct_cost' => $direct_cost,
        'total_direct_cost' => $direct_cost,
    ];
}

function share_capital(): array
{
    $capital_structure = capital_structure();
    $share_capitals = ShareCapital::query()->where('project_id', 1)->first();
//    $total_funding_requirements = total_funding_requirements();
    $share_capital = $capital_structure['equity'];
    $short_term_borrowings_interest_rate = $share_capitals['short_term_borrowings'];
    $minimum_cash_requirement = $share_capitals['cash_requirement'];
//    echo number_format($share_capital);
    return [
        'share_capital' => $share_capital,
        'short_term_borrowings_interest_rate' => $short_term_borrowings_interest_rate,
        'minimum_cash_requirement' => $minimum_cash_requirement,
    ];

}

function capex()
{
    $years_balance_sheet_capex = years_balance_sheet_capex();
    $total_capex = 0;
    $years = years();

//    foreach ($years as $year){
    foreach ($years_balance_sheet_capex as $key => $item) {
        foreach ($item as $value) {
//                echo $value[$years['start_year']] . '<br>';
            $total_capex += $value[$years['start_year']];
        }
    }
//        echo number_format($total_capex);
//    }
    return $total_capex;
}

function cogs(): float
{

    $years = years();
    $cost_of_good_sold = cost_of_good_sold();

    $capital_investment = CapitalInvestment::query()->where('project_id', 1)->get();
    $cogs = ($cost_of_good_sold['total_cost_of_good_sold'][$years['start_year']] * $capital_investment[0]->duration) / 12;
    $capital_investment[0]->update([
        'value' => $cogs,
    ]);
//    echo number_format($cogs);
    return ($cogs);
}

function rent(): float
{
    $years = years();
    $rent_and_utilities = rent_and_utilities();

    $capital_investment = CapitalInvestment::query()->where('project_id', 1)->get();
    $rent = ($rent_and_utilities['total_rent_and_utilities'][$years['start_year']] * $capital_investment[1]->duration) / 12;
    $capital_investment[1]->update([
        'value' => $rent,
    ]);
//    echo number_format($rent);
    return ($rent);
}

function salaries(): float
{
    $years = years();
    $general_admin_expenses_summery = general_admin_expenses_summery();

    $capital_investment = CapitalInvestment::query()->where('project_id', 1)->get();
    $salaries = ($general_admin_expenses_summery['staff_salaries'][$years['start_year']] * $capital_investment[2]->duration) / 12;
    $capital_investment[2]->update([
        'value' => $salaries,
    ]);
//    echo number_format($salaries);
    return ($salaries);
}

function required_capital_selling_and_marketing_expenses(): float
{
    $years = years();
    $selling_and_marketing_expenses = selling_and_marketing_expenses();

    $capital_investment = CapitalInvestment::query()->where('project_id', 1)->get();
    $selling_and_marketing = ($selling_and_marketing_expenses['total_selling_and_marketing_expenses'][$years['start_year']] * $capital_investment[3]->duration) / 12;
    $capital_investment[3]->update([
        'value' => $selling_and_marketing,
    ]);
//    echo number_format($selling_and_marketing);
    return ($selling_and_marketing);
}

function required_capital_general_and_admin_expenses(): float
{
    $years = years();
    $general_admin_expenses_summery = general_admin_expenses_summery();

    $capital_investment = CapitalInvestment::query()->where('project_id', 1)->get();
    $general_admin = ($general_admin_expenses_summery['general_and_admin_expenses'][$years['start_year']] * $capital_investment[4]->duration) / 12;
    $capital_investment[4]->update([
        'value' => $general_admin,
    ]);
//    echo number_format($general_admin);
    return ($general_admin);
}

function total_funding_requirements(): array
{
    $capex = capex();
    $cogs = cogs();
    $rent = rent();
    $salaries = salaries();
    $selling_and_marketing_expenses = required_capital_selling_and_marketing_expenses();
    $required_capital_general_and_admin_expenses = required_capital_general_and_admin_expenses();
    $start_up_cost = start_up_cost();
    $total = $capex + $cogs + $rent + $salaries + $selling_and_marketing_expenses + $required_capital_general_and_admin_expenses + $start_up_cost;
//    echo number_format($total);
    return [
        'capex' => $capex,
        'cogs' => $cogs,
        'rent' => $rent,
        'salaries' => $salaries,
        'selling_and_marketing_expenses' => $selling_and_marketing_expenses,
        'required_capital_general_and_admin_expenses' => $required_capital_general_and_admin_expenses,
        'total_funding_requirement' => $total,
    ];
}

////////////////////////////////////////////// Dashboard \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\


////////////////////////////////////////////// Operating Model \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function revenue_summary(): array
{

    $years_average_footfall_per_day = years_average_footfall_per_day(); // Average Footfall Per Day
    $years_average_order_size = years_average_order_size(); // Average Order Size
    $model_assumptions = model_assumptions('2022-04-01', '3', '365', '15');
    $average_footfall_per_day = array();
    $average_order_size = array();
    $number_of_days = array();
    $gross_revenue = array();
    $vat = array();
    $net_revenue = array();
    $years = years();

    foreach ($years['years'] as $year) {

        /////////////////average footfall per day//////////////////////
        if ($year == $years['start_year']) {
            $average_footfall_per_day[$year] = $years_average_footfall_per_day[$years['start_year']];
        } else {
            $average_footfall_per_day[$year] = (int)$average_footfall_per_day[$year - 1] + (int)$years_average_footfall_per_day[$year];
        }
        /////////////////average footfall per day//////////////////////

        /////////////////average order size//////////////////////
        if ($year == $years['start_year']) {
            $average_order_size[$year] = $years_average_order_size[$years['start_year']];
        } else {
            $average_order_size[$year] = $average_order_size[$year - 1] * (1 + ($years_average_order_size[$year] / 100));
        }
        /////////////////average order size//////////////////////

        /////////////////Number Of Days//////////////////////
        if ($year == $years['start_year']) {
            $number_of_days[$year] = $model_assumptions['number_of_days_in_financial_year'];
        } else {
            $number_of_days[$year] = $model_assumptions['number_of_days_in_calender_year'];
        }
        /////////////////Number Of Days//////////////////////

        /////////////////Gross Revenue//////////////////////
        $gross_revenue[$year] = $average_footfall_per_day[$year] * $average_order_size[$year] * $number_of_days[$year];
        /////////////////Gross Revenue//////////////////////

        /////////////////VAT//////////////////////
        $vat[$year] = $gross_revenue[$year] * ($model_assumptions['vat'] / 100);
        /////////////////VAT//////////////////////

        /////////////////net revenue//////////////////////
        $net_revenue[$year] = $gross_revenue[$year] + $vat[$year];
        /////////////////net revenue//////////////////////
    }
//
//    echo 'Average Footfall Per Day' . '<br>';
//    foreach($average_footfall_per_day as $key => $item){
//        echo  $key . "&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp" .  $item . '<br>';
//    }
//    echo '*****************************************' . '<br>';
//
//
//    echo 'Average Order Size' . '<br>';
//    foreach($average_order_size as $key => $item){
//        echo  $key . "&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp" .  number_format($item) . '<br>';
//    }
//    echo '*****************************************' . '<br>';
//
//
//    echo 'Number Of Days' . '<br>';
//    foreach($number_of_days as $key => $item){
//        echo  $key . "&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp" .  ($item) . '<br>';
//    }
//    echo '*****************************************' . '<br>';
//
//
//    echo 'Gross Revenue' . '<br>';
//    foreach($gross_revenue as $key => $item){
//        echo  $key . "&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp" .  number_format($item) . '<br>';
//    }
//    echo '*****************************************' . '<br>';
//
//    echo 'Vat' . '<br>';
//    foreach($vat as $key => $item){
//        echo  $key . "&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp" .  number_format($item) . '<br>';
//    }
//    echo '*****************************************' . '<br>';
//
//    echo 'Net Revenue' . '<br>';
//    foreach($net_revenue as $key => $item){
//        echo  $key . "&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp" .  number_format($item) . '<br>';
//    }
//    echo '*****************************************' . '<br>';


    return [
        'average_footfall_per_day' => $average_footfall_per_day,
        'average_order_size' => $average_order_size,
        'number_of_days' => $number_of_days,
        'gross_revenue' => $gross_revenue,
        'vat' => $vat,
        'net_revenue' => $net_revenue,
    ];
}

function cost_of_good_sold(): array
{
    $revenue_summery = revenue_summary();
    $cost_of_goods_sold_assumptions = cost_of_goods_sold_assumptions();
    $total_direct_cost = array();
    $years = years();

    foreach ($years['years'] as $year) {
        $total_direct_cost[$year] = $revenue_summery['gross_revenue'][$year] * ($cost_of_goods_sold_assumptions['total_direct_cost'][$year] / 100);

    }

//    echo 'Total Direct Cost' . '<br>';
//    foreach($total_direct_cost as $key => $item){
//        echo  $key . "&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp" .  number_format($item) . '<br>';
//    }
//    echo '*****************************************' . '<br>';


    return [
        'total_direct_cost' => $total_direct_cost,
        'total_cost_of_good_sold' => $total_direct_cost,
        'vat' => $revenue_summery['vat'],
    ];

}

function vat_schedule(): array
{
    $vat_received_from_costumer = array();
    $vat_paid_for_goods_to_supplier = array();
    $net_vat = array();
//    $revenue_summery = revenue_summary();
    $cost_of_good_sold = cost_of_good_sold();
    $model_assumptions = model_assumptions('2022-04-01', '3', '365', '15');
    $years = years();

    foreach ($years['years'] as $year) {
        $vat_received_from_costumer[$year] = $cost_of_good_sold['vat'][$year];
        $vat_paid_for_goods_to_supplier[$year] = -$cost_of_good_sold['total_direct_cost'][$year] * ($model_assumptions['vat'] / 100);
        $net_vat[$year] = $vat_received_from_costumer[$year] + $vat_paid_for_goods_to_supplier[$year];
    }


//    echo 'Vat Received From Costumer' . '<br>';
//    foreach($vat_received_from_costumer as $key => $item){
//        echo  $key . "&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp" .  number_format($item) . '<br>';
//    }
//    echo '*****************************************' . '<br>';
//
//
//    echo 'Vat Paid For Goods to Supplier' . '<br>';
//    foreach($vat_paid_for_goods_to_supplier as $key => $item){
//        echo  $key . "&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp" .  number_format($item) . '<br>';
//    }
//    echo '*****************************************' . '<br>';
//
//    echo 'Net Vat' . '<br>';
//    foreach($net_vat as $key => $item){
//        echo  $key . "&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp" .  number_format($item) . '<br>';
//    }
//    echo '*****************************************' . '<br>';


    return [
        'vat_received_from_costumer' => $vat_received_from_costumer,
        'vat_paid_for_goods_to_supplier' => $vat_paid_for_goods_to_supplier,
        'net_vat' => $net_vat,
    ];
}

function general_admin_expenses_summery(): array
{
    $general_and_admin_expenses = array();
    $staff_salaries = array();
    $rent_and_utilities = array();
    $total_general_and_admin_expenses = array();
    $revenue_summery = revenue_summary();
    $years_general_and_admin_expenses = years_general_and_admin_expenses();
    $fun_stuff_salaries = stuff_salaries();
    $fun_rent_and_utilities = rent_and_utilities();
    $years = years();


    foreach ($years['years'] as $year) {
        $general_and_admin_expenses[$year] = $revenue_summery['gross_revenue'][$year] * ($years_general_and_admin_expenses[$year] / 100);
        $staff_salaries[$year] = $fun_stuff_salaries['total_stuff_salaries'][$year];
        $rent_and_utilities[$year] = $fun_rent_and_utilities['total_rent_and_utilities'][$year];
        $total_general_and_admin_expenses[$year] = $general_and_admin_expenses[$year] + $staff_salaries[$year] + $rent_and_utilities[$year];
    }


//    echo 'General And Admin Expenses' . "&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp" . '<br>';

//    foreach ($general_and_admin_expenses as $item) {
//        echo number_format($item) . "&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp";
//    }
//    echo '<br>';
//    echo '<br>';
//
//    echo 'Staff Salaries' . "&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp" . '<br>';
//    foreach ($staff_salaries as $item) {
//        echo number_format($item) . "&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp";
//    }
//    echo '<br>';
//    echo '<br>';
//
//    echo 'Rent and Utilities' . "&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp" . '<br>';
//    foreach ($rent_and_utilities as $item) {
//        echo number_format($item) . "&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp";
//    }
//    echo '<br>';
//    echo '<br>';
//
//    echo 'Total General And Admin Expenses' . "&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp" . '<br>';
//    foreach ($total_general_and_admin_expenses as $item) {
//        echo number_format($item) . "&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp";
//    }


    return [
        'general_and_admin_expenses' => $general_and_admin_expenses,
        'staff_salaries' => $staff_salaries,
        'rent_and_utilities' => $rent_and_utilities,
        'total_general_and_admin_expenses' => $total_general_and_admin_expenses,
    ];
}

function stuff_salaries(): array
{
    $staff_salaries = array();
    $years_stuff_salaries = years_staff_salaries();
    $number_of_stuff = number_of_stuff();
    $salary_per_stuff = salary_per_stuff();
    $model_assumptions = model_assumptions('2022-04-01', '3', '365', '15');
    $years_rent_and_utilities = years_rent_and_utilities();
    $years = years();

    $total_stuff_salaries = array();
    $x = 0;

    foreach ($years_stuff_salaries['staff_salaries'] as $key => $item) {
        foreach ($item as $key_2 => $value) {
            if ($key_2 == $years['start_year']) {
                $staff_salaries[$key][$key_2] = ($model_assumptions['remaining_number_of_months_in_financial_year'] * $salary_per_stuff['salary_per_stuff'][$key][$key_2]) / 12;
            } else {
                $staff_salaries[$key][$key_2] = $salary_per_stuff['salary_per_stuff'][$key][$key_2] * $number_of_stuff['number_of_stuff'][$key][$key_2];
            }
//            echo $key . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . number_format($staff_salaries[$key][$key_2]) . '<br>';
//            echo '******************************************************************************' . '<br>';
        }
    }

    foreach ($staff_salaries as $key => $item) {
        foreach ($item as $key_2 => $value) {
            if (!array_key_exists($key_2, $total_stuff_salaries)) {
                $total_stuff_salaries[$key_2] = 0;
            }
            $total_stuff_salaries[$key_2] = (int)$total_stuff_salaries[$key_2] + (int)$value;
        }
    }

//    foreach ($total_stuff_salaries as $key => $item){
//        echo $key . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . number_format($item) . '<br>';
//    }


    return [
        'stuff_salaries' => $staff_salaries,
        'total_stuff_salaries' => $total_stuff_salaries,
    ];
}

function salary_per_stuff(): array
{

    $years_stuff_salaries = years_staff_salaries();
    $salary_per_stuff = array();
    $previousValue = null;
    $years = years();

    foreach ($years_stuff_salaries['staff_salaries'] as $key => $item) {
        foreach ($item as $key_2 => $value) {
            if ($key_2 == $years['start_year']) {
                $salary_per_stuff[$key][$key_2] = $years_stuff_salaries['staff_salaries'][$key][$key_2];
            } else {
                if ($value != 0) {
                    $salary_per_stuff[$key][$key_2] = $previousValue + ($previousValue * ($value / 100));
                } else {
                    $salary_per_stuff[$key][$key_2] = $previousValue;
                }
            }
            $previousValue = $salary_per_stuff[$key][$key_2];
        }
    }

//    foreach ($salary_per_stuff as $key => $item){
//        echo $key . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . '<br>';
//        foreach ($item as $key_2 => $value){
//            echo $key_2 .' => '. number_format($value). "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . '<br>';
//        }
//    }

    return [
        'salary_per_stuff' => $salary_per_stuff
    ];
}

function rent_and_utilities(): array
{
    $rent_and_utilities = array();
    $years_rent_and_utilities = years_rent_and_utilities();
    $years = years();
    $previousValue = null;
    foreach ($years_rent_and_utilities as $key => $value) {
        if ($key == $years['start_year']) {
            $rent_and_utilities[$key] = $years_rent_and_utilities[$years['start_year']];
        } else {
            if ($value != 0) {
                $rent_and_utilities[$key] = $previousValue + ($previousValue * ($value / 100));
            } else {
                $rent_and_utilities[$key] = $previousValue;
            }
        }
        $previousValue = $rent_and_utilities[$key];
    }

//    foreach ($rent_and_utilities as $key => $item){
//            echo $key .' => '. number_format($item). "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . '<br>';
//    }

    return [
        'rent_and_utilities' => $rent_and_utilities,
        'total_rent_and_utilities' => $rent_and_utilities,
    ];

}

function number_of_stuff(): array
{
    $years_head_count = years_head_count();
    $number_of_stuff = array();
    $previousValue = null;

    foreach ($years_head_count['head_count'] as $key => $item) {
        foreach ($item as $key_2 => $value) {
            if ($key_2 == 2022) {
                $number_of_stuff[$key][$key_2] = $years_head_count['head_count'][$key][$key_2];
            } else {
                if ($value != 0) {
                    $number_of_stuff[$key][$key_2] = $previousValue + +$value;
                } else {
                    $number_of_stuff[$key][$key_2] = $previousValue;
                }
            }
            $previousValue = $number_of_stuff[$key][$key_2];
        }
    }

//        foreach ($number_of_stuff as $key => $item){
//        echo $key . "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . '<br>';
//        foreach ($item as $key_2 => $value){
//            echo $key_2 .' => '. number_format($value). "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp" . '<br>';
//        }
//    }

    return [
        'number_of_stuff' => $number_of_stuff
    ];


}

function selling_and_marketing_expenses(): array
{
    $years_selling_and_marketing_expenses_of_revenue = years_selling_and_marketing_expenses_of_revenue();
    $years_selling_and_marketing_expenses = years_selling_and_marketing_expenses();
    $revenue_summary = revenue_summary();
    $selling_and_marketing_expenses_of_revenue = array();
    $selling_and_marketing_expenses = array();
    $total_selling_and_marketing_expenses = array();
    $flag = array();
    $previousValue = null;
    $years = years();

    foreach ($years['years'] as $year) {
        if (selling_and_marketing_expenses_type == 'of_revenue') {///////////////////////////of_revenue/////////////////////////
            $selling_and_marketing_expenses[$year] = 0;
            $flag[$year] = 1;
            if ($year == $years['start_year']) {
                $selling_and_marketing_expenses_of_revenue[$year] = ($years_selling_and_marketing_expenses_of_revenue[$year] / 100) * $revenue_summary['gross_revenue'][$year];
            } else {
                $selling_and_marketing_expenses_of_revenue[$year] = $revenue_summary['gross_revenue'][$year] * ($years_selling_and_marketing_expenses_of_revenue[$year] / 100) * $flag[$year];
            }
            if (!array_key_exists($year, $total_selling_and_marketing_expenses)) {
                $total_selling_and_marketing_expenses[$year] = 0;
            }
            $total_selling_and_marketing_expenses[$year] = (int)$total_selling_and_marketing_expenses[$year] + (int)$selling_and_marketing_expenses_of_revenue[$year];

        } elseif (selling_and_marketing_expenses_type == 'SAR') {///////////////////////////SAR//////////////////////////////

            $selling_and_marketing_expenses_of_revenue[$year] = 0;
            $flag[$year] = 1;
            if ($year == $years['start_year']) {
                $selling_and_marketing_expenses[$year] = $years_selling_and_marketing_expenses[$year];
            } else {
                if ($years_selling_and_marketing_expenses[$year] != 0) {
                    $selling_and_marketing_expenses[$year] = $previousValue + $years_selling_and_marketing_expenses['2022'] * ($years_selling_and_marketing_expenses[$year] / 100) * $flag[$year];
                } else {
                    $selling_and_marketing_expenses[$year] = $previousValue;
                }
            }
            $previousValue = $selling_and_marketing_expenses[$year];
            if (!array_key_exists($year, $total_selling_and_marketing_expenses)) {
                $total_selling_and_marketing_expenses[$year] = 0;
            }
            $total_selling_and_marketing_expenses[$year] = (int)$total_selling_and_marketing_expenses[$year] + (int)$selling_and_marketing_expenses[$year];
        }

    }
//
//        echo "<br><br><br>";
//        foreach($total_selling_and_marketing_expenses as $key => $item){
//            echo ' $total_selling_and_marketing_expenses : ' . $key . "&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp" . number_format($item) .'<br>';
//        }
//
//        echo "<br><br><br>";
//        foreach($selling_and_marketing_expenses as $key => $item){
//            echo $key . "&nbsp&nbsp|&nbsp&nbsp&nbsp&nbsp" . number_format($item) .'<br>';
//        }
//

    return [
        'selling_and_marketing_expenses_of_revenue' => $selling_and_marketing_expenses_of_revenue,
        'selling_and_marketing_expenses' => $selling_and_marketing_expenses,
        'flag' => $flag,
        'total_selling_and_marketing_expenses' => $total_selling_and_marketing_expenses,
    ];
}


function zakat(): array
{
    $earning_before_zakat = array();
    $equity = array();
    $debt = array();
    $operating_fixed_assets = array();
    $adjusted_zakat_base = array();
    $total_zakat_base = array();
    $zakat_charge = array();
    $income_statement = income_statement();
    $balance_sheet = balance_sheet();
    $years = years();
    foreach ($years as $year) {
        $earning_before_zakat[$year] = $income_statement['ebit'][$year];
        if ($year == '2022') {
            $equity[$year] = 0;
        } else {
            $equity[$year] = $balance_sheet['share_capital'][$year - 1];
        }
        $debt[$year] = 0;
        $operating_fixed_assets[$year] = -$balance_sheet['total_property_plant_equipment'][$year];
        $adjusted_zakat_base[$year] = $earning_before_zakat[$year] + $equity[$year] + $debt[$year] + $operating_fixed_assets[$year];
        $total_zakat_base[$year] = max($earning_before_zakat[$year], $adjusted_zakat_base[$year]);
        $zakat_charge[$year] = $total_zakat_base[$year] * (2.5 / 100);
//        echo $year . ' : ' . number_format($zakat_charge[$year]) . '<br>';
    }

    return [
        'zakat_charge' => $zakat_charge,
    ];
}


function additions(): array
{
    $additions = array();
    $total_additions = array();
    $years_balance_sheet_capex = years_balance_sheet_capex();
    $years = years();

    foreach ($years['years'] as $year) {
//        echo $year .  '  : ' . '<br>';
        foreach ($years_balance_sheet_capex as $item) {
            foreach ($item as $key => $value) {
                $additions[$key][$year] = $value[$year];
//               echo $key . ' : ' . number_format($additions[$key][$year]) . '<br>';
                if (!array_key_exists($year, $total_additions)) {
                    $total_additions[$year] = 0;
                }
                $total_additions[$year] += (int)$value[$year];

            }
//           echo 'Total Additions : ' . number_format($total_additions[$year]) . '<br>';
//           echo '*******************************************************' . '<br>';
        }

    }
//
//        foreach ($years['years'] as $year){
//            echo $year . '<br>';
//            foreach ($additions as $key => $addition){
//                    echo $key . ' : ' . $addition[$year] . '<br>';
//            }
//            echo 'total additions : ' . number_format($total_additions[$year]) . '<br>' ;
//        }

    return [
        'additions' => $additions,
        'total_additions' => $total_additions,
    ];

}

function opening_cost_and_closing_cost(): array
{

    $additions = additions();
    $opening_cost = array();
    $closing_cost = array();
    $total_opening_cost = array();
    $total_closing_cost = array();
    $years = years();

    foreach ($years['years'] as $year) {
//        echo $year . '<br>';
        foreach ($additions['additions'] as $key => $addition) {
            if ($year == $years['start_year']) {
                $opening_cost[$key][$year] = 0;
            } else {
                $opening_cost[$key][$year] = $closing_cost[$key][$year - 1];
            }
            $closing_cost[$key][$year] = $opening_cost[$key][$year] + $addition[$year];

            if (!array_key_exists($year, $total_opening_cost)) {
                $total_opening_cost[$year] = 0;
            }
            if (!array_key_exists($year, $total_closing_cost)) {
                $total_closing_cost[$year] = 0;
            }
            $total_opening_cost[$year] += $opening_cost[$key][$year];
            $total_closing_cost[$year] += $closing_cost[$key][$year];

//            echo $key .  ' :' . number_format($closing_cost[$key][$year]) . '<br>' ;
        }

//        echo 'total_opening_cost' . ' : ' . number_format($total_closing_cost[$year]) . '<br>';
//        echo '******************************************************' . '<br>';

    }
    return [
        'opening_cost' => $opening_cost,
        'total_opening_cost' => $total_opening_cost,
        'closing_cost' => $closing_cost,
        'total_closing_cost' => $total_closing_cost,
    ];
}

function depreciation(): array
{
    $depreciation = array();
    $depreciation_spare = array();
    $depreciation_spare_total = array();
    $total_depreciation = array();

    $net_book_value = array();
    $net_book_value_spare = array();
    $net_book_value_spare_total = array();
    $total_net_book_value = array();

    $closing_depreciation = array();
    $closing_depreciation_spare = array();
    $closing_depreciation_spare_total = array();
    $total_closing_depreciation = array();

    $opening_depreciation = array();
    $opening_depreciation_spare = array();
    $opening_depreciation_spare_total = array();
    $total_opening_depreciation = array();


    $closing_cost = opening_cost_and_closing_cost();
    $additions = additions();
    $depreciation_rate = depreciation_rate();
    $years = years();
    $years_balance_sheet_capex = years_balance_sheet_capex();

//    echo $closing_cost;


    foreach ($years['years'] as $year) {
//        echo $year . '  : ' . '<br>';
        foreach ($years_balance_sheet_capex as $item) {
            foreach ($item as $key => $value) {
                if ($year == $years['start_year']) {

                    $depreciation[$key][$year] = min(($depreciation_rate['depreciation_rate'][$key][$year] * $closing_cost['closing_cost'][$key][$year]), $additions['additions'][$key][$year] + 0);
                    $opening_depreciation[$key][$year] = 0;

                } else {
                    $opening_depreciation[$key][$year] = array();
//                        echo '<pre>';
//                        var_dump($opening_depreciation[$key][$year]);
//                        echo '<pre>';
                    /*if(){


                    }*/
//                        echo '<pre>';
//                        var_dump($depreciation_rate['depreciation_rate'][$key][$year]);
//                        var_dump($closing_cost['closing_cost'][$key][$year]);
//                        var_dump($additions['additions'][$key][$year] + $net_book_value[$key][$year-1]);
////                        var_dump($depreciation_rate['depreciation_rate'][$key][$year]);
//                        echo '<pre>';

//echo $depreciation_rate['depreciation_rate'][$key][$year]/100;
//echo '<br>';

                    $depreciation[$key][$year] = min((($depreciation_rate['depreciation_rate'][$key][$year] / 100) * $closing_cost['closing_cost'][$key][$year]), $additions['additions'][$key][$year] + $net_book_value[$key][$year - 1]);
                    $opening_depreciation[$key][$year] = $closing_depreciation[$key][$year - 1];
//                        echo '<pre>';
//                        var_dump($opening_depreciation[$key][$year]);
//                        echo '<pre>';

//                        echo  $opening_depreciation[$key][$year];
//echo '<br>';
                }
//                echo $depreciation[$key][$year];
//                echo '<br>';
//                echo $opening_depreciation[$key][$year];
//                echo '<br>';


                $closing_depreciation[$key][$year] = $depreciation[$key][$year] + $opening_depreciation[$key][$year];
                $net_book_value[$key][$year] = $closing_cost['closing_cost'][$key][$year] - $closing_depreciation[$key][$year];

//                                          Totals
                if (!array_key_exists($year, $total_depreciation)) {
                    $total_depreciation[$year] = 0;
                }
                $total_depreciation[$year] += $depreciation[$key][$year];


                if (!array_key_exists($year, $total_opening_depreciation)) {
                    $total_opening_depreciation[$year] = 0;
                }
                $total_opening_depreciation[$year] += $opening_depreciation[$key][$year];


                if (!array_key_exists($year, $total_closing_depreciation)) {
                    $total_closing_depreciation[$year] = 0;
                }
                $total_closing_depreciation[$year] += $closing_depreciation[$key][$year];


                if (!array_key_exists($year, $total_net_book_value)) {
                    $total_net_book_value[$year] = 0;
                }
                $total_net_book_value[$year] += $net_book_value[$key][$year];

            }

        }

    }

    /*
        echo '****************************** Opening Accumulated Depreciation ***********************************' . '<br>';

        foreach ($years['years'] as $year) {
            echo $year . '  =>>> ' . '<br>';
            foreach ($opening_depreciation as $key => $item) {
                echo $key . ' : ' . $item[$year] . '<br>';
            }
            echo 'total : ' . number_format($total_opening_depreciation[$year], 2) . '<br>';
            echo '*****************************************************************' . '<br>';
        }


        echo '************************************ Depreciation *****************************' . '<br>';


        foreach ($years['years'] as $year) {
            echo $year . '  =>>> ' . '<br>';
            foreach ($depreciation as $key => $item) {
                echo $key . ' : ' . $item[$year] . '<br>';
            }
            echo 'total : ' . $total_depreciation[$year] . '<br>';
            echo '*****************************************************************' . '<br>';
        }


        echo '********************************* Closing Accumulated Depreciation ********************************' . '<br>';


        foreach ($years['years'] as $year) {
            echo $year . '  =>>> ' . '<br>';
            foreach ($closing_depreciation as $key => $item) {
                echo $key . ' : ' . $item[$year] . '<br>';
            }
            echo 'total : ' . $total_closing_depreciation[$year] . '<br>';
            echo '*****************************************************************' . '<br>';
        }


        echo '***************************** Net Book Value ************************************' . '<br>';


        foreach ($years['years'] as $year) {
            echo $year . '  =>>> ' . '<br>';
            foreach ($net_book_value as $key => $item) {
                echo $key . ' : ' . $item[$year] . '<br>';
            }
            echo 'total : ' . $total_net_book_value[$year] . '<br>';
            echo '*****************************************************************' . '<br>';
        }*/


    return [
        'opening_depreciation' => $opening_depreciation,
        'total_opening_depreciation' => $total_opening_depreciation,
        'depreciation' => $depreciation,
        'total_depreciation' => $total_depreciation,
        'closing_depreciation' => $closing_depreciation,
        'total_closing_depreciation' => $total_closing_depreciation,
        'net_book_value' => $net_book_value,
        'total_net_book_value' => $total_net_book_value,
    ];


}

function depreciation_rate(): array
{
    $furniture_fixture = array();
    $equipment = array();
    $project_start_up_cost = array();
    $spares = array();
    $years_balance_sheet_depreciation_amortization = years_balance_sheet_depreciation_amortization();
    $depreciation_rate = array();
    $years = years();

    foreach ($years['years'] as $year) {
//        echo $year . '  : ' . '<br>';
        foreach ($years_balance_sheet_depreciation_amortization as $item) {
            foreach ($item as $key => $value) {
                if ($year == $years['start_year']) {
                    $depreciation_rate[$key][$year] = $value[$year];
                } else {
                    $depreciation_rate[$key][$year] = $value[$year];
                }
//                echo $key . ' : ' . ($depreciation_rate[$key][$year]) . '<br>';
            }
        }
//        echo '*********************************' . '<br>';

    }


    return [
        'depreciation_rate' => $depreciation_rate,
    ];
}

function current_assets(): array
{
    $accounts_receivables = array();
    $inventory = array();
    $accounts_payable = array();
    $years_accounts_receivables = years_accounts_receivables();
    $years_accounts_payable = years_accounts_payable();
    $revenue_summary = revenue_summary();
    $model_assumptions = model_assumptions('2022-04-01', '3', '365', '15');
    $cost_of_good_sold = cost_of_good_sold();
    $years = years();

    foreach ($years['years'] as $year) {
        $accounts_receivables[$year] = $revenue_summary['gross_revenue'][$year] * $years_accounts_receivables[$year] / ($model_assumptions['number_of_days_in_calender_year']);
        if ($year == $years['start_year']) {
            $inventory[$year] = $cost_of_good_sold['total_cost_of_good_sold'][$year] * inventory / ($model_assumptions['number_of_days_in_calender_year']);
        } else {
            $inventory[$year] = $cost_of_good_sold['total_direct_cost'][$year] * $years_accounts_payable[$year] / ($model_assumptions['number_of_days_in_calender_year']);
        }
        $accounts_payable[$year] = $cost_of_good_sold['total_cost_of_good_sold'][$year] * $years_accounts_payable[$year] / ($model_assumptions['number_of_days_in_calender_year']);

    }

//    echo '********************* Accounts Receivables **************************' . '<br>';
//    foreach ($years['years'] as $year){
//        echo $year . ' =>>' .  number_format($accounts_receivables[$year]) . '<br>';
//    }
//
//    echo '********************* Inventory **************************' . '<br>';
//    foreach ($years['years'] as $year){
//        echo $year . ' =>>' .  number_format($inventory[$year]) . '<br>';
//    }
//
//    echo '********************* Accounts Payable **************************' . '<br>';
//    foreach ($years['years'] as $year){
//        echo $year . ' =>>' .  number_format($accounts_payable[$year]) . '<br>';
//    }
//
//    echo '********************* Accounts Payable Days **************************' . '<br>';
//    foreach ($years['years'] as $year){
//        echo $year . ' =>>' .  number_format($years_accounts_payable[$year]) . '<br>';
//    }


    return [
        'accounts_receivables' => $accounts_receivables,
        'total_receivables' => $accounts_receivables,
        'inventory' => $inventory,
        'accounts_payable' => $accounts_payable,
    ];
}

function operating_model_share_capital(): array
{
    $share_capital = share_capital();
    $opening = array();
    $additions = array();
    $closing = array();
    $previous_value = 0;
    $years = years();
    foreach ($years['years'] as $year) {
//        echo $year . ' =>> ' . '<br>';

        if ($year == $years['start_year']) {
            $opening[$year] = 0;
            $additions[$year] = $share_capital['share_capital'];
        } else {
            $opening[$year] = $previous_value;
            $additions[$year] = 0;

        }
        $closing[$year] = $opening[$year] + $additions[$year];
        $previous_value = $closing[$year];

//        echo 'Opening : ' . number_format($opening[$year]) . '<br>';
//        echo 'Additions : ' . number_format($additions[$year]) . '<br>';
//        echo 'Closing : ' . number_format($closing[$year]) . '<br>';
//        echo '**********************************' . '<br>';

    }

    return [
        'opening' => $opening,
        'additions' => $additions,
        'closing' => $closing,
    ];
}

function operating_model_retained_earnings(): array
{
    $opening = array();
    $profit_for_the_year = array();
    $closing = array();
    $years = years();
    $income_statement = income_statement();
    $previous_value = null;

    foreach ($years['years'] as $year) {
//        echo $year . ' =>> ' . '<br>';
        if ($year == '2022') {
            $opening[$year] = 0;
        } else {
            $opening[$year] = $previous_value;
        }
        $profit_for_the_year[$year] = $income_statement['net_income'][$year];
        $closing[$year] = $profit_for_the_year[$year] + $opening[$year];
        $previous_value = $closing[$year];

//        echo 'Opening : ' . number_format($opening[$year]) . '<br>';
//        echo 'Profit For The Year : ' . number_format($profit_for_the_year[$year]) . '<br>';
//        echo 'Closing : ' . number_format($closing[$year]) . '<br>';
//        echo '**********************************' . '<br>';
    }

    return [
        'opening' => $opening,
        'profit_for_the_year' => $profit_for_the_year,
        'closing' => $closing,
    ];
}


////////////////////////////////////////////// Operating Model \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\


////////////////////////////////////////////// Financial Statements \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function income_statement(): array
{
    $revenue = array();
    $cost_of_good_sold = array();
    $gross_profit = array();
    $gp_margin = array();
    $general_and_admin_expenses = array();
    $selling_and_marketing_expenses = array();
    $management_fee = array();
    $ebitda = array();
    $ebitda_margin = array();
    $depreciation_amortization = array();
    $ebit = array();
    $finance_cost = array();
    $ebt = array();
    $zakat = array();
    $vat = array();
    $interest_expenses = array();
    $net_income = array();
    $net_margin = array();

//    *********** Zakat vars *************
    $earning_before_zakat = array();
    $equity = array();
    $debt = array();
    $operating_fixed_assets = array();
    $adjusted_zakat_base = array();
    $total_zakat_base = array();
    $zakat_charge = array();
//    *********** Zakat vars *************


    $revenue_summary = revenue_summary();
    $operating_model_cost_of_good_sold = cost_of_good_sold();
    $general_admin_expenses_summery = general_admin_expenses_summery();
    $operating_model_selling_and_marketing_expenses = selling_and_marketing_expenses();
    $depreciation = depreciation();
    $vat_schedule = vat_schedule();
    $share_capital = operating_model_share_capital();
    $debt_assumptions = debt_assumptions();
    $sheet = sheet2();
    $operating_model_debt_schedule = operating_model_debt_schedule();

    $years = years();


    foreach ($years['years'] as $year) {
//        echo $year . ' : ' . '<br>';
        $revenue[$year] = $revenue_summary['net_revenue'][$year];
        $cost_of_good_sold[$year] = -$operating_model_cost_of_good_sold['total_cost_of_good_sold'][$year];
        $gross_profit[$year] = $revenue[$year] + $cost_of_good_sold[$year];
        $gp_margin[$year] = ($gross_profit[$year] / $revenue[$year]) * 100;
        $general_and_admin_expenses[$year] = -$general_admin_expenses_summery['total_general_and_admin_expenses'][$year];
        $selling_and_marketing_expenses[$year] = -$operating_model_selling_and_marketing_expenses['total_selling_and_marketing_expenses'][$year];
        $ebitda[$year] = $general_and_admin_expenses[$year] + $selling_and_marketing_expenses[$year] + $gross_profit[$year];
        $ebitda_margin[$year] = ($ebitda[$year] / $revenue[$year]) * 100;
        $depreciation_amortization[$year] = -$depreciation['total_depreciation'][$year];
        $ebit[$year] = $ebitda[$year] + $depreciation_amortization[$year];

        if ($year == $debt_assumptions['loan_start_date']->format('Y')){
            $management_fee[$year] = $debt_assumptions['management_fee'] * $sheet['item'][$year];
        }else{
            $management_fee[$year] = 0 * $sheet['item'][$year];
        }




//        ********************* FOR ZAKAT *********************************

        $earning_before_zakat[$year] = $ebit[$year];
        if ($year == $years['start_year']) {
            $equity[$year] = 0;
        } else {
            $equity[$year] = $share_capital['closing'][$year - 1];
        }
        $debt[$year] = 0;
        $operating_fixed_assets[$year] = -$depreciation['total_net_book_value'][$year];
        $adjusted_zakat_base[$year] = $earning_before_zakat[$year] + $equity[$year] + $debt[$year] + $operating_fixed_assets[$year];
        $total_zakat_base[$year] = max($earning_before_zakat[$year], $adjusted_zakat_base[$year]);
        $zakat_charge[$year] = $total_zakat_base[$year] * (2.5 / 100);

//        ********************* FOR ZAKAT *********************************
        $finance_cost[$year] = 0; // static , from Financial Statements - D94
        $ebt[$year] = $ebit[$year] + $finance_cost[$year];
        $zakat[$year] = -$zakat_charge[$year]; // remaining
        $vat[$year] = -$vat_schedule['net_vat'][$year];
        $interest_expenses[$year] = ($operating_model_debt_schedule['interest'][$year] - 0) * $sheet['item'][$year];
        $net_income[$year] = $ebt[$year] + $zakat[$year] + $vat[$year];
        $net_margin[$year] = number_format(($net_income[$year] / $revenue[$year]) * 100, 1);
//        echo '$interest_expenses : '. number_format($interest_expenses[$year]) , '<br>';


//
//        echo 'Revenue : '. number_format($revenue[$year]) , '<br>';
//        echo 'Cost Of Good Sold : '. number_format($cost_of_good_sold[$year]) , '<br>';
//        echo 'Gross Profit : '. number_format($gross_profit[$year]) , '<br>';
//        echo 'GP Margin : '. number_format($gp_margin[$year] ,1) , '<br>';
//        echo 'General and Admin Expenses : '. number_format($general_and_admin_expenses[$year]) , '<br>';
//        echo 'Selling and marketing Expenses : '. number_format($selling_and_marketing_expenses[$year]) , '<br>';
//        echo 'Ebitda : '. number_format($ebitda[$year]) , '<br>';
////        echo 'Ebitda Margin : '. number_format($ebitda_margin[$year],1) , '<br>';
//        echo 'Depreciation Amortization : '. ($depreciation_amortization[$year]) , '<br>';
//        echo 'Ebit : '. number_format($ebit[$year]) , '<br>';
//        echo 'zakat : '. number_format($zakat[$year]) , '<br>';
//        echo 'Vat : '. number_format($vat[$year]) , '<br>';
//        echo 'Net Income : '. number_format($net_income[$year]) , '<br>';
//        echo 'Net Margin : '. ($net_margin[$year]) , '<br>';


//        echo '************************************************************' . '<br>';

    }

    return [
        'revenue' => $revenue,
        'cost_of_good_sold' => $cost_of_good_sold,
        'gross_profit' => $gross_profit,
        'gp_margin' => $gp_margin,
        'general_and_admin_expenses' => $general_and_admin_expenses,
        'operating_model_selling_and_marketing_expenses' => $selling_and_marketing_expenses,
        'management_fee' => $management_fee,
        'ebitda' => $ebitda,
        'ebitda_margin' => $ebitda_margin,
        'depreciation_amortization' => $depreciation_amortization,
        'ebit' => $ebit,
        'finance_cost' => $finance_cost,
        'ebt' => $ebt,
        'zakat' => $zakat,
        'vat' => $vat,
        'interest_expenses' => $interest_expenses,
        'net_income' => $net_income,
        'net_margin' => $net_margin,
    ];

}

function balance_sheet(): array
{
    $property_plant_equipment = array();
    $total_property_plant_equipment = array();
    $accounts_receivables = array();
    $inventory = array();
    $cash = array();
    $total_accounts_receivables_inventory_cash = array();
    $total_assets = array();
    $LTL_1 = array();
    $LTL_2 = array();
    $accounts_payable = array();
    $short_term_borrowings = array();
    $total_current_liabilities = array();
    $share_capital = array();
    $retained_earnings = array();
    $total_equity = array();
    $total_liabilities_equities = array();
    $depreciation = depreciation();
    $current_assets = current_assets();
    $operating_model_share_capital = operating_model_share_capital();
    $operating_model_retained_earnings = operating_model_retained_earnings();
    $sheet = sheet2();
    $operating_model_debt_schedule = operating_model_debt_schedule();

    $years = years();




    $closing_cache = CloseCost::query()->where('project_id',1)->get();
//    dd($closing_cache);
    foreach ($closing_cache as $item){
//        echo $item['key'] . " : " . number_format($item['value']) . '<br>';
        $cash[$item['key']] =  $item['value'];
    }


    foreach ($years['years'] as $year) {
//        echo $year . ' =>>' . '<br>';
        $property_plant_equipment[$year] = $depreciation['total_net_book_value'][$year];
        $total_property_plant_equipment[$year] = $property_plant_equipment[$year];
        $accounts_receivables[$year] = $current_assets['total_receivables'][$year];
        $inventory[$year] = $current_assets['inventory'][$year];
//        $cash[$year] = 0; // static

//        echo number_format($cash[$year],2) ; echo '<br>';



        $total_accounts_receivables_inventory_cash[$year] = $accounts_receivables[$year] + $inventory[$year] + $cash[$year];

//        echo number_format($total_accounts_receivables_inventory_cash[$year],2) ; echo '<br>';
//        echo number_format($total_property_plant_equipment[$year],2) ; echo '<br>';


        $total_assets[$year] = $total_accounts_receivables_inventory_cash[$year] + $total_property_plant_equipment[$year];
        $LTL_1[$year] = ($operating_model_debt_schedule['closing'][$year] - 0) * $sheet['item'][$year];
        if ($year == $years['start_year']){
            $LTL_2[$year] = $LTL_1[$year];
        }else{
            $LTL_2[$year] = $LTL_1[$year] - $LTL_1[$year-1];
        }

        $accounts_payable[$year] = $current_assets['accounts_payable'][$year];
        $short_term_borrowings[$year] = 0; // static;
        $total_current_liabilities[$year] = $accounts_payable[$year] + $short_term_borrowings[$year];
        $share_capital[$year] = $operating_model_share_capital['closing'][$year];
        $retained_earnings[$year] = $operating_model_retained_earnings['closing'][$year];
        $total_equity[$year] = $share_capital[$year] + $retained_earnings[$year];
        $total_liabilities_equities[$year] = $total_current_liabilities[$year] + $total_equity[$year];


//        echo 'LTL_2 : '. number_format($LTL_2[$year]) . '<br>';
//        echo 'total_property_plant_equipment : '. number_format($total_property_plant_equipment[$year]) . '<br>';
//        echo 'accounts_receivables : '. number_format($accounts_receivables[$year]) . '<br>';
//        echo 'inventory : '. number_format($inventory[$year]) . '<br>';
//        echo 'total_accounts_receivables_inventory_cash : '. number_format($total_accounts_receivables_inventory_cash[$year]) . '<br>';
//        echo 'total_assets : '. number_format($total_assets[$year],2) . '<br>';
//
//        echo '<br><br>';
//
//        echo 'accounts_payable : '. number_format($accounts_payable[$year]) . '<br>';
//        echo 'total_current_liabilities : '. number_format($total_current_liabilities[$year],2) . '<br>';
//        echo 'share_capital : '. number_format($share_capital[$year]) . '<br>';
//        echo 'share_capital : '. number_format($share_capital[$year]) . '<br>';
//        echo 'retained_earnings : '. number_format($retained_earnings[$year]) . '<br>';
//        echo 'total_equity : '. number_format($total_equity[$year]) . '<br>';
//        echo 'total_liabilities_equities : '. number_format($total_liabilities_equities[$year],2) . '<br>';
//
//        echo '************************************************************' . '<br>';
//


    }

    return [
        'property_plant_equipment' => $property_plant_equipment,
        'total_property_plant_equipment' => $total_property_plant_equipment,
        'accounts_receivables' => $accounts_receivables,
        'inventory' => $inventory,
        'cash' => $cash,
        'total_accounts_receivables_inventory_cash' => $total_accounts_receivables_inventory_cash,
        'total_assets' => $total_assets,
        'LTL_1' => $LTL_1,
        'LTL_2' => $LTL_2,
        'accounts_payable' => $accounts_payable,
        'short_term_borrowings' => $short_term_borrowings,
        'total_current_liabilities' => $total_current_liabilities,
        'share_capital' => $share_capital,
        'retained_earnings' => $retained_earnings,
        'total_equity' => $total_equity,
        'total_liabilities_equities' => $total_liabilities_equities,
    ];
}

function cashflow_statement_and_cash_revolver(): array
{
    $net_income = array();
    $depreciation = array();
    $first_finance_cost = array();
    $cashflow_before_working_capital_changes = array();
    $accounts_receivables = array();
    $inventory = array();
    $accounts_payables = array();
    $cashflow_from_operations = array();
    $capex = array();
    $cashflow_from_investing_activities = array();
    $share_capital = array();
    $second_finance_cost = array();
    $short_term_borrowings = array();
    $cashflow_from_financing_activities = array();
    $net_change_in_cash_and_cash_equivalents = array();
    $opening_cash = array();
    $closing_cash = array();

    $cashflow_revolver_opening_cash = array();
    $cashflow_revolver_net_change_in_cash_and_cash_equivalents = array();
    $cashflow_revolver_minimum_cash_requirements = array();
    $cashflow_revolver_short_term_requirement = array();
    $cashflow_revolver_short_term_borrowing = array();
    $cashflow_revolver_finance_cost = array();

    $cashflow_revolver_share_capital = share_capital();
    $income_statement = income_statement();
    $balance_sheet = balance_sheet();
    $years = years();
    $additions = additions();

    foreach ($years['years'] as $year) {
//        echo $year . '=>>' . '<br>';
        $net_income[$year] = $income_statement['net_income'][$year];
        $depreciation[$year] = -$income_statement['depreciation_amortization'][$year];
        $first_finance_cost[$year] = 0;
        $cashflow_before_working_capital_changes[$year] = $net_income[$year] + $depreciation[$year] + $first_finance_cost[$year];
        if ($year == $years['start_year']) {
            $accounts_receivables[$year] = 0 - $balance_sheet['accounts_receivables'][$year];
            $inventory[$year] = 0 - $balance_sheet['inventory'][$year];
            $accounts_payables[$year] = $balance_sheet['accounts_payable'][$year] - 0;
        } else {
            $accounts_receivables[$year] = $balance_sheet['accounts_receivables'][$year - 1] - $balance_sheet['accounts_receivables'][$year];
            $inventory[$year] = $balance_sheet['inventory'][$year - 1] - $balance_sheet['inventory'][$year];
            $accounts_payables[$year] = $balance_sheet['accounts_payable'][$year] - $balance_sheet['accounts_payable'][$year - 1];
        }
        $cashflow_from_operations[$year] = $accounts_receivables[$year] + $inventory[$year] + $accounts_payables[$year] + $cashflow_before_working_capital_changes[$year];
        $capex[$year] = -$additions['total_additions'][$year];
        $cashflow_from_investing_activities[$year] = $capex[$year];
        if ($year == $years['start_year']) {
            $share_capital[$year] = $balance_sheet['share_capital'][$year] - 0;
            $short_term_borrowings[$year] = $balance_sheet['short_term_borrowings'][$year] - 0;
        } else {
            $share_capital[$year] = $balance_sheet['share_capital'][$year] - $balance_sheet['share_capital'][$year - 1];
            $short_term_borrowings[$year] = $balance_sheet['short_term_borrowings'][$year] - $balance_sheet['short_term_borrowings'][$year - 1];
        }
        $second_finance_cost[$year] = -$first_finance_cost[$year];
        $cashflow_from_financing_activities[$year] = $share_capital[$year] + $short_term_borrowings[$year] + $second_finance_cost[$year];
        $net_change_in_cash_and_cash_equivalents[$year] = $cashflow_from_financing_activities[$year] + $cashflow_from_investing_activities[$year] + $cashflow_from_operations[$year];
        if ($year == $years['start_year']) {
            $opening_cash[$year] = 0;
        } else {
            $opening_cash[$year] = $closing_cash[$year - 1];
        }
        $closing_cash[$year] = $net_change_in_cash_and_cash_equivalents[$year] + $opening_cash[$year];
//        CloseCost::query()->where('project_id',1)->delete();
//        CloseCost::query()->create([
//            'key' => $year,
//            'value' => $closing_cash[$year],
//            'project_id' => 1,
//        ]);

        // cashflow_revolver

        $cashflow_revolver_opening_cash[$year] = $opening_cash[$year];
        $cashflow_revolver_net_change_in_cash_and_cash_equivalents[$year] = $share_capital[$year] + $second_finance_cost[$year] + $cashflow_from_investing_activities[$year] + $cashflow_from_operations[$year];
        $cashflow_revolver_minimum_cash_requirements[$year] = $cashflow_revolver_share_capital['minimum_cash_requirement'];
        $cashflow_revolver_short_term_requirement[$year] = ($opening_cash[$year] + $net_change_in_cash_and_cash_equivalents[$year]) - $cashflow_revolver_minimum_cash_requirements[$year];

        if ($year == $years['start_year']) {
            $cashflow_revolver_short_term_borrowing[$year] = max((0 - $cashflow_revolver_short_term_requirement[$year]), 0);
        } else {
            $cashflow_revolver_short_term_borrowing[$year] = max(($cashflow_revolver_short_term_borrowing[$year - 1] - $cashflow_revolver_short_term_requirement[$year]), 0);
        }
        $cashflow_revolver_finance_cost[$year] = $cashflow_revolver_short_term_borrowing[$year] * $cashflow_revolver_share_capital['short_term_borrowings_interest_rate'];


//        echo 'net_income : '. number_format($net_income[$year]) . '<br>';
//        echo 'depreciation : '. ($depreciation[$year]) . '<br>';
//        echo 'first_finance_cost : '. number_format($first_finance_cost[$year]) . '<br>';
//        echo 'cashflow_before_working_capital_changes : '. number_format($cashflow_before_working_capital_changes[$year]) . '<br>';
//        echo  '<br><br>';
//        echo 'accounts_receivables : '. number_format($accounts_receivables[$year]) . '<br>';
//        echo 'inventory : '. number_format($inventory[$year]) . '<br>';
//        echo 'accounts_payables : '. number_format($accounts_payables[$year]) . '<br>';
//        echo 'cashflow_from_operations : '. number_format($cashflow_from_operations[$year]) . '<br>';
//        echo  '<br><br>';
//        echo 'capex : '. number_format($capex[$year]) . '<br>';
//        echo 'cashflow_from_investing_activities : '. number_format($cashflow_from_investing_activities[$year]) . '<br>';
//        echo  '<br><br>';
//        echo 'share_capital : '. number_format($share_capital[$year]) . '<br>';
//        echo 'short_term_borrowings : '. number_format($short_term_borrowings[$year]) . '<br>';
//        echo 'second_finance_cost : '. number_format($second_finance_cost[$year]) . '<br>';
//        echo 'cashflow_from_financing_activities : '. number_format($cashflow_from_financing_activities[$year]) . '<br>';
//        echo 'net_change_in_cash_and_cash_equivalents : '. number_format($net_change_in_cash_and_cash_equivalents[$year]) . '<br>';
//        echo 'opening_cash : '. number_format($opening_cash[$year]) . '<br>';
//        echo 'closing_cash : '. number_format($closing_cash[$year]) . '<br>';
//
//        echo  '<br><br><br><br>';

//        echo '$cashflow_revolver_opening_cash : '. number_format($cashflow_revolver_opening_cash[$year]) . '<br>';
//        echo '$cashflow_revolver_net_change_in_cash_and_cash_equivalents : '. number_format($cashflow_revolver_net_change_in_cash_and_cash_equivalents[$year]) . '<br>';
//        echo '$cashflow_revolver_minimum_cash_requirements : '. number_format($cashflow_revolver_minimum_cash_requirements[$year]) . '<br>';
//        echo '$cashflow_revolver_short_term_requirement : '. number_format($cashflow_revolver_short_term_requirement[$year]) . '<br>';
//        echo '$cashflow_revolver_short_term_borrowing : '. number_format($cashflow_revolver_short_term_borrowing[$year]) . '<br>';
//        echo '$cashflow_revolver_finance_cost : '. number_format($cashflow_revolver_finance_cost[$year]) . '<br>';

//        echo '************************************************************' . '<br>';
    }

    return [
        'net_income' => $net_income,
        'depreciation' => $depreciation,
        'first_finance_cost' => $first_finance_cost,
        'cashflow_before_working_capital_changes' => $cashflow_before_working_capital_changes,
        'accounts_receivables' => $accounts_receivables,
        'inventory' => $inventory,
        'accounts_payables' => $accounts_payables,
        'cashflow_from_operations' => $cashflow_from_operations,
        'capex' => $capex,
        'cashflow_from_investing_activities' => $cashflow_from_investing_activities,
        'share_capital' => $share_capital,
        'second_finance_cost' => $second_finance_cost,
        'short_term_borrowings' => $short_term_borrowings,
        'cashflow_from_financing_activities' => $cashflow_from_financing_activities,
        'net_change_in_cash_and_cash_equivalents' => $net_change_in_cash_and_cash_equivalents,
        'opening_cash' => $opening_cash,
        'closing_cash' => $closing_cash,

        // cashflow_revolver

        'cashflow_revolver_opening_cash' => $cashflow_revolver_opening_cash,
        'cashflow_revolver_net_change_in_cash_and_cash_equivalents' => $cashflow_revolver_net_change_in_cash_and_cash_equivalents,
        'cashflow_revolver_minimum_cash_requirements' => $cashflow_revolver_minimum_cash_requirements,
        'cashflow_revolver_short_term_requirement' => $cashflow_revolver_short_term_requirement,
        'cashflow_revolver_short_term_borrowing' => $cashflow_revolver_short_term_borrowing,
        'cashflow_revolver_finance_cost' => $cashflow_revolver_finance_cost,
    ];

}



////////////////////////////////////////////// Financial Statements \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\


////////////////////////////////////////////// Valuation \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

const Rf_KSA = 3.8898;
const equity_risk_premium = 4.94;
const size_premium = 5.59;
const country_risk_premium = 0;
const zakat_rate = 2.5;
const long_term_growth_rate = 3;
const beta = 0.66;
//const cost_of_equity = (Rf_KSA + (equity_risk_premium * beta) + size_premium + country_risk_premium)/100;
const cost_of_equity = 12.8;

function valuation_summary(): array
{
    $free_cashflow_to_equity = free_cashflow_to_equity();
    $comparables = comparables();
    $present_value_of_free_cash_flows = 0;
    foreach ($free_cashflow_to_equity['present_value_of_free_cashflows'] as $item) {
        $present_value_of_free_cash_flows += $item;
    }
//    echo number_format($present_value_of_free_cash_flows) . '<br>';

    $terminal_value = $free_cashflow_to_equity['terminal'];
    $opening_cash = 0;
    $total_value_before_discount = $present_value_of_free_cash_flows + $terminal_value + +$opening_cash;
    $discount = 30; // percentage;
    $value_after_discount = $total_value_before_discount * (1 - ($discount / 100));
    $comparable_valuation_total_value_1 = $comparables['equity_value'];
    $comparable_valuation_discount = 30;
    $comparable_valuation_total_value_2 = $comparable_valuation_total_value_1 * (1 - ($comparable_valuation_discount / 100)); // remaining

//    echo number_format($comparable_valuation_total_value_2);
    return [
        'present_value_of_free_cash_flows' => $present_value_of_free_cash_flows,
        'terminal_value' => $terminal_value,
        'opening_cash' => $opening_cash,
        'total_value_before_discount' => $total_value_before_discount,
        'discount' => $discount,
        'value_after_discount' => $value_after_discount,
        'comparable_valuation_total_value_1' => $comparable_valuation_total_value_1,
        'comparable_valuation_discount' => $comparable_valuation_discount,
        'comparable_valuation_total_value_2' => $comparable_valuation_total_value_2,
    ];
}

function valuation(): array
{
    $valuation_summary = valuation_summary();
    $comparable_valuation_percentage = 50;
    $free_cash_flow_valuation_percentage = 50;
    $comparable_valuation = $valuation_summary['comparable_valuation_total_value_2'] * ($comparable_valuation_percentage / 100);
    $free_cash_flow_valuation = $valuation_summary['value_after_discount'] * ($free_cash_flow_valuation_percentage / 100);
    $total_value_of_equity = $comparable_valuation + $free_cash_flow_valuation;
    $total_value_in_US = $total_value_of_equity / 3.75;

//    echo number_format($total_value_in_US);

    return [
        'comparable_valuation_percentage' => $comparable_valuation_percentage,
        'free_cash_flow_valuation_percentage' => $free_cash_flow_valuation_percentage,
        'comparable_valuation' => $comparable_valuation,
        'free_cash_flow_valuation' => $free_cash_flow_valuation,
        'total_value_of_equity' => $total_value_of_equity,
        'total_value_in_US' => $total_value_in_US,
    ];
}

function shareholders_equity_and_ownership(): array
{
    $valuation = valuation();
    $total_funding_requirements = total_funding_requirements();
    $capital_investment = $total_funding_requirements['total_funding_requirement'];
    $owners_share_in_equity = $capital_investment / $valuation['total_value_of_equity'];

    return [
        'capital_investment' => $capital_investment,
        'owners_share_in_equity' => $owners_share_in_equity,
    ];
}

function free_cashflow_to_equity(): array
{
    $years = years();
    $income_statement = income_statement();
    $cashflow_statement_and_cash_revolver = cashflow_statement_and_cash_revolver();
    $net_income = array();
    $non_cash_items = array();
    $working_capital_changes = array();
    $capex = array();
    $short_term_borrowings = array();
    $net_FCFE = array();
    $rolling_FCFE = array();
    $discount_factor = array();
    $present_value_of_free_cashflows = array();
    $x = 1;
    foreach ($years as $year) {
        $net_income[$year] = $income_statement['net_income'][$year];
        $non_cash_items[$year] = $cashflow_statement_and_cash_revolver['depreciation'][$year];
        $working_capital_changes[$year] = $cashflow_statement_and_cash_revolver['accounts_receivables'][$year] + $cashflow_statement_and_cash_revolver['inventory'][$year] + $cashflow_statement_and_cash_revolver['accounts_payables'][$year];
        $capex[$year] = $cashflow_statement_and_cash_revolver['cashflow_from_investing_activities'][$year];
        $short_term_borrowings[$year] = $cashflow_statement_and_cash_revolver['short_term_borrowings'][$year];
        $net_FCFE[$year] = $net_income[$year] + $non_cash_items[$year] + $working_capital_changes[$year] + $capex[$year] + $short_term_borrowings[$year];
        if ($year == 2024 || $year == 2028) {
            $rolling_FCFE[$year] = $net_FCFE[$year] * (366 / 365);
        } else {
            $rolling_FCFE[$year] = $net_FCFE[$year] * (365 / 365);
        }
        $discount_factor[$year] = ((1 + (cost_of_equity / 100)) ** -$x);
        $present_value_of_free_cashflows[$year] = $rolling_FCFE[$year] * $discount_factor[$year];

//        echo $year . ' : ' .' $rolling_FCFE : ' . ($rolling_FCFE[$year]) .'<br><br>';
//        echo $year . ' : ' .' $discount_factor : ' . ($discount_factor[$year]) .'<br><br>';
//        echo $year . ' : ' .' present_value_of_free_cashflows : ' . number_format($present_value_of_free_cashflows[$year]) .'<br><br>';
//        echo "*******************************************************************************************************************************************",'<br>';
        $x = $x + 1;
    }

    $terminal_value = (end($present_value_of_free_cashflows) * (1 + (long_term_growth_rate / 100)) / 100) / ((cost_of_equity / 100 - long_term_growth_rate / 100) / 100);
//    $terminal_value =  (1169346 *  (0.0103)) / 0.0975 ;
//    echo number_format($terminal_value);

    return [
        'net_income' => $net_income,
        'non_cash_items' => $non_cash_items,
        'working_capital_changes' => $working_capital_changes,
        'capex' => $capex,
        'short_term_borrowings' => $short_term_borrowings,
        'net_FCFE' => $net_income,
        'rolling_FCFE' => $rolling_FCFE,
        'discount_factor' => $discount_factor,
        'present_value_of_free_cashflows' => $present_value_of_free_cashflows,
        'terminal' => $terminal_value,
    ];

}

function comparables(): array
{
    $income_statement = income_statement();
    $balance_sheet = balance_sheet();
    $average_multiples = average_multiples();

    $multiples_P_E = $average_multiples['average']['P_E'];
    $multiples_P_BV = $average_multiples['average']['P_BV'];
    $multiples_EV_EBITDA = $average_multiples['average']['EV_EBITDA'];
    $multiples_P_S = $average_multiples['average']['P_S'];

    $valuation_P_E = (25) / 100;
    $valuation_P_BV = (25) / 100;
    $valuation_EV_EBITDA = (25) / 100;
    $valuation_P_S = (25) / 100;


    $net_income = array();
    $book_value_of_equity = array();
    $EBITDA = array();
    $revenue = array();
    $years = years();

    foreach ($years as $year) {
        $net_income[$year] = $income_statement['net_income'][$year];
        $book_value_of_equity[$year] = $balance_sheet['total_equity'][$year];
        $EBITDA[$year] = $income_statement['ebitda'][$year];
        $revenue[$year] = $income_statement['revenue'][$year];
    }

    $weighted_average_P_E = array_shift($net_income) * $multiples_P_E * $valuation_P_E;
    $weighted_average_P_BV = array_shift($book_value_of_equity) * $multiples_P_BV * $valuation_P_BV;
    $weighted_average_EV_EBITDA = array_shift($EBITDA) * $multiples_EV_EBITDA * $valuation_EV_EBITDA;
    $weighted_average_P_S = array_shift($revenue) * $multiples_P_S * $valuation_P_S;

    $weighted_average_total = $weighted_average_P_E + $weighted_average_P_BV + $weighted_average_EV_EBITDA + $weighted_average_P_S;
    $equity_value = $weighted_average_total;

//    echo number_format($equity_value);

    return [
        'equity_value' => $equity_value,
    ];

}


////////////////////////////////////////////// NPV \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function return_analysis(): array
{
    $free_cashflow = free_cashflow_to_equity();
    $cashflow = cashflow_statement_and_cash_revolver();
    $shareholders_equity_and_ownership = shareholders_equity_and_ownership();
    $capital_investment_capex = array();
    $cash_flow_from_operations = array();
    $net_cash_flows = array();
    $discount_factor = array();
    $net_discounted_cash_flow = array();
    $payback_cashflow = array();
    $cumulative_cash_flows = array();
    $payback_counter = array();
    $IRR = 0;
    $NPV = 0;
    $payback_period = 0;

    $years = array("2021", "2022", "2023", "2024", "2025", "2026", "2027", "2028", "2029", "2030", "2031");
    foreach ($years as $year) {
        if ($year == 2021) {
            $capital_investment_capex[$year] = -$shareholders_equity_and_ownership['capital_investment'];
            $cash_flow_from_operations[$year] = 0;
            $discount_factor[$year] = 0;
            $net_discounted_cash_flow[$year] = $capital_investment_capex[$year] + $cash_flow_from_operations[$year];
            $cumulative_cash_flows[$year] = $net_discounted_cash_flow[$year];

        } else {
            $capital_investment_capex[$year] = 0;
            $cash_flow_from_operations[$year] = $cashflow['cashflow_from_operations'][$year];
            $discount_factor[$year] = $free_cashflow['discount_factor'][$year];
            $net_discounted_cash_flow[$year] = ($capital_investment_capex[$year] + $cash_flow_from_operations[$year]) * $discount_factor[$year];
            $cumulative_cash_flows[$year] = $net_discounted_cash_flow[$year] + $cumulative_cash_flows[$year - 1];

        }

        if ($cumulative_cash_flows[$year] < 0) {
            $payback_counter[$year] = 1;
        } elseif ($cumulative_cash_flows[$year] >= 0 && $cumulative_cash_flows[$year - 1] < 0) {
            $payback_counter[$year] = $cumulative_cash_flows[$year - 1] / $cumulative_cash_flows[$year];
        } else {
            $payback_counter[$year] = 0;
        }

        $net_cash_flows[$year] = $capital_investment_capex[$year] + $cash_flow_from_operations[$year];
        $payback_cashflow[$year] = $net_discounted_cash_flow[$year];
        $NPV += $net_discounted_cash_flow[$year];
        $IRR += $net_discounted_cash_flow[$year];
        $payback_period += $payback_counter[$year];

    }
    $IRR /= count($net_discounted_cash_flow);
    echo $year . ' : ' . number_format($IRR) . '<br>';

    return [
        'NPV' => $NPV
    ];

}

function breakEven_analysis()
{
    $general_admin_expenses_summery = general_admin_expenses_summery();
    $revenue_summary = revenue_summary();
    $cost_of_goods_sold_assumptions = cost_of_goods_sold_assumptions();
    $years = years();

    $fixed_cost = array();
    $average_selling_perice_per_customer = array();
    $direct_variable_cost_per_customer = array();
    $contribution_per_unit = array();
    $contribution_margin = array();
    $breakEven_point_volume = array();
    $breakEven_revenue = array();

    foreach ($years as $year) {
        $fixed_cost[$year] = $general_admin_expenses_summery['staff_salaries'][$year] + $general_admin_expenses_summery['rent_and_utilities'][$year];
        $average_selling_perice_per_customer[$year] = $revenue_summary['average_order_size'][$year];
        $direct_variable_cost_per_customer[$year] = -$average_selling_perice_per_customer[$year] * (array_shift($cost_of_goods_sold_assumptions['total_direct_cost']) / 100);
        $contribution_per_unit[$year] = $average_selling_perice_per_customer[$year] + $direct_variable_cost_per_customer[$year];
        $contribution_margin[$year] = $contribution_per_unit[$year] / $average_selling_perice_per_customer[$year];
        $breakEven_point_volume[$year] = $fixed_cost[$year] / $contribution_per_unit[$year];
        $breakEven_revenue[$year] = $fixed_cost[$year] / $contribution_margin[$year];

//        echo $year . ' : ' . number_format($breakEven_revenue[$year]) . '<br>';
    }
}

function return_on_investment(): array
{
    $income_statement = income_statement();
    $share_capital = share_capital();
    $years = years();
    $net_income = array();
    $initial_investment = array();
    $ROI = array();

    foreach ($years as $year) {
        $net_income[$year] = $income_statement['net_income'][$year];
        if ($year == 2022) {
            $initial_investment[$year] = $share_capital['share_capital'][$year];
        } else {
            $initial_investment[$year] = ($share_capital['share_capital'][2022]) + $share_capital['share_capital'][$year];
        }
        $ROI[$year] = $net_income[$year] / $initial_investment[$year];

//        echo number_format($ROI[$year]*100) . '<br>';
    }

    return [
        'net_income' => $net_income,
        'initial_investment' => $initial_investment,
        'ROI' => $ROI,
    ];
}

function return_on_assets()
{
    $income_statement = income_statement();
    $return_on_investment = return_on_investment();
    $balance_sheet = balance_sheet();
    $years = years();
    $net_income = array();
    $total_assets = array();
    $return_on_assets_ROA = array();

    foreach ($years as $year) {
        $net_income[$year] = $return_on_investment['net_income'][$year];
        $total_assets[$year] = $balance_sheet['total_assets'][$year];
        $return_on_assets_ROA[$year] = $net_income[$year] / $total_assets[$year];

//        echo number_format($return_on_assets_ROA[$year]*100) . '<br>';
    }
}


////////////////////////////////////////////// Multiple Selector \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function average_multiples(): array
{
    $calls = [
        companies('Cafe De Coral Holdings Ltd', data(), 0.77, 3.150, 7.510, 16.5),
        companies('Coffee Day Enterprises Ltd', data1(), 0.56, 13.215, 11.800, 22.0),
        companies('International Meal Co Alimentacao', data2(), 1.63, 100.77, 848, 15.0),
        companies('Swiss Water Decaffeinated Coffee Inc', data3(), 0.56, 13.215, 11.800, 22.0),
        companies('Key Coffee Inc', data4(), 0.56, 13.215, 11.800, 22.0),
    ];
    $companies = array();
    $average = ['P_E' => 0, 'P_BV' => 0, 'EV_EBITDA' => 0, 'P_S' => 0];
    foreach ($calls as $key => $item) {
        $companies[$key]['name'] = $item['name'];
        $companies[$key]['P_E'] = $item['average']['P_E'];
        $companies[$key]['P_BV'] = $item['average']['P_BV'];
        $companies[$key]['EV_EBITDA'] = $item['average']['EV_EBITDA'];
        $companies[$key]['P_S'] = $item['average']['P_S'];

        $average['P_E'] = $average['P_E'] + $companies[$key]['P_E'];
        $average['P_BV'] = $average['P_BV'] + $companies[$key]['P_BV'];
        $average['EV_EBITDA'] = $average['EV_EBITDA'] + $companies[$key]['EV_EBITDA'];
        $average['P_S'] = $average['P_S'] + $companies[$key]['P_S'];

    }
    $average['P_E'] = $average['P_E'] / count($calls);
    $average['P_BV'] = $average['P_BV'] / count($calls);
    $average['EV_EBITDA'] = $average['EV_EBITDA'] / count($calls);
    $average['P_S'] = $average['P_S'] / count($calls);
//    echo $average['P_S']. '<br>';

    return [
        'average' => $average,
    ];

}


////////////////////////////////////////////// Multiples \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function data(): array
{
    return [
        '2019' => [
            'P_E' => 21.2,
            'P_BV' => 3.8,
            'EV_EBITDA' => 21.7,
            'P_S' => 1.3,
        ],
        '2020' => [
            'P_E' => 110.7,
            'P_BV' => 3.5,
            'EV_EBITDA' => 54.4,
            'P_S' => 1.4,
        ],
        '2021' => [
            'P_E' => 29.0,
            'P_BV' => 2.8,
            'EV_EBITDA' => 23.8,
            'P_S' => 1.1,
        ],
        '2022' => [
            'P_E' => 26.9,
            'P_BV' => 2.6,
            'EV_EBITDA' => 22.3,
            'P_S' => 1.0,
        ],
    ];

}

function data1(): array
{
    return [
        '2019' => [
            'P_E' => 69.7,
            'P_BV' => 2.4,
            'EV_EBITDA' => 10.0,
            'P_S' => 1.4,
        ],
        '2020' => [
            'P_E' => 0.5,
            'P_BV' => 0.3,
            'EV_EBITDA' => 6.0,
            'P_S' => 0.2,
        ],
        '2021' => [
            'P_E' => 0,
            'P_BV' => 0,
            'EV_EBITDA' => 0,
            'P_S' => 1.4,
        ],
        '2022' => [
            'P_E' => 0,
            'P_BV' => 0.3,
            'EV_EBITDA' => 0,
            'P_S' => 0,
        ],
    ];

}

function data2(): array
{
    return [
        '2019' => [
            'P_E' => 210.6,
            'P_BV' => 1.1,
            'EV_EBITDA' => 12.2,
            'P_S' => 0.9,
        ],
        '2020' => [
            'P_E' => 0,
            'P_BV' => 0,
            'EV_EBITDA' => 0,
            'P_S' => 0,
        ],
        '2021' => [
            'P_E' => 0,
            'P_BV' => 0,
            'EV_EBITDA' => 0,
            'P_S' => 0,
        ],
        '2022' => [
            'P_E' => 0,
            'P_BV' => 0,
            'EV_EBITDA' => 0,
            'P_S' => 0,
        ],
    ];

}

function data3(): array
{
    return [
        '2019' => [
            'P_E' => 23.9,
            'P_BV' => 1.3,
            'EV_EBITDA' => 10.8,
            'P_S' => 0.7,
        ],
        '2020' => [
            'P_E' => 9.7,
            'P_BV' => 0.5,
            'EV_EBITDA' => 8.3,
            'P_S' => 0.3,
        ],
        '2021' => [
            'P_E' => 0,
            'P_BV' => 0.5,
            'EV_EBITDA' => 9.4,
            'P_S' => 0.3,
        ],
        '2022' => [
            'P_E' => 58.2,
            'P_BV' => 0.5,
            'EV_EBITDA' => 9.6,
            'P_S' => 0.2,
        ],
    ];

}

function data4(): array
{
    return [
        '2019' => [
            'P_E' => 143.9,
            'P_BV' => 1.4,
            'EV_EBITDA' => 28.4,
            'P_S' => 0.8,
        ],
        '2020' => [
            'P_E' => 0,
            'P_BV' => 0,
            'EV_EBITDA' => 0,
            'P_S' => 0,
        ],
        '2021' => [
            'P_E' => 0,
            'P_BV' => 0,
            'EV_EBITDA' => 0,
            'P_S' => 1,
        ],
        '2022' => [
            'P_E' => 0,
            'P_BV' => 0.3,
            'EV_EBITDA' => 0,
            'P_S' => 0,
        ],
    ];

}

function companies($name, $data, $beta, $total_debt, $market_cap, $tax_rate): array
{

    $P_E_length = 0;
    $P_BV_length = 0;
    $EV_EBITDA_length = 0;
    $P_S_length = 0;
    $tax_rate = $tax_rate / 100;
    $unlevered_beta = $beta * (($market_cap) / (($market_cap) + (($total_debt) * (1 - $tax_rate))));
    $average = array();
//    echo'*******************************' . $name . '**********************************' .'<br>';
    foreach ($data as $key => $items) {

        if ($items['P_E'] != 0) {
            $P_E_length = $P_E_length + 1;
        }
        if ($items['P_BV'] != 0) {
            $P_BV_length = $P_BV_length + 1;
        }
        if ($items['EV_EBITDA'] != 0) {
            $EV_EBITDA_length = $EV_EBITDA_length + 1;
        }
        if ($items['P_S'] != 0) {
            $P_S_length = $P_S_length + 1;
        }

//        echo $key . ' : ' . '<br>';
        foreach ($items as $key_2 => $item) {
            if (!array_key_exists($key_2, $average)) {
                $average[$key_2] = 0;
            }
            $average[$key_2] = $average[$key_2] + $item;

//            echo '&nbsp&nbsp&nbsp&nbsp' .  $key_2 . ' : ' . $item . '<br>';
        }

//        echo '*****************************************************************' . '<br>';
    }

    $average['P_E'] = $average['P_E'] / $P_E_length;
    $average['P_BV'] = $average['P_BV'] / $P_BV_length;
    $average['EV_EBITDA'] = $average['EV_EBITDA'] / $EV_EBITDA_length;
    $average['P_S'] = $average['P_S'] / $P_S_length;
//    echo 'Average Of P_E' . ' : ' . number_format($average['P_E'] ,2) . '<br>';
//    echo 'Average Of P_BV' . ' : ' . number_format($average['P_BV'] ,2) . '<br>';
//    echo 'Average Of EV_EBITDA' . ' : ' . number_format($average['EV_EBITDA'] ,2) . '<br>';
//    echo 'Average Of P_S' . ' : ' . number_format($average['P_S'] ,2) . '<br>';
//    echo '*****************************************************************' . '<br>';
//    echo 'Unlevered beta' . ' : ' . number_format($unlevered_beta,2) . '<br>';
//    echo '*****************************************************************' . '<br>';


    return [
        'name' => $name,
        'unlevered_beta' => $unlevered_beta,
        'beta' => $beta,
        'total_debt' => $total_debt,
        'market_cap' => $market_cap,
        'tax_rate' => $tax_rate,
        'data' => $data,
        'average' => $average,
    ];
}


////////////////////////////////////////////// Use Of Funds \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function use_of_funds(): array
{
    $capex = array();
    $cost_of_good = array();
    $operating_expenses = array();
    $other_expenses = array();
    $total_funding_requirement = array();
    $total_funding_requirement_USD = array();

    $cashflow = cashflow_statement_and_cash_revolver();
    $income_statement = income_statement();
    $years = years();

    foreach ($years as $year) {
        $capex[$year] = $cashflow['capex'][$year];
        $cost_of_good[$year] = $income_statement['cost_of_good_sold'][$year];
        $operating_expenses[$year] = $income_statement['general_and_admin_expenses'][$year] + $income_statement['operating_model_selling_and_marketing_expenses'][$year];
        $other_expenses[$year] = 0;
        $total_funding_requirement[$year] = $operating_expenses[$year] + $other_expenses[$year] + ($capex[$year] + $cost_of_good[$year]);
        $total_funding_requirement_USD[$year] = $total_funding_requirement[$year] / 3.75;
        echo $year . ' : ' . number_format($total_funding_requirement_USD[$year]) . '<br>';
    }

    return [
        'capex' => $capex,
        'cost_of_good' => $cost_of_good,
        'operating_expenses' => $operating_expenses,
        'other_expenses' => $other_expenses,
        'total_funding_requirement' => $total_funding_requirement,
        'total_funding_requirement_USD' => $total_funding_requirement_USD,
    ];
}


////////////////////////////////////////////// Executive Summary \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function working_capital(): array
{
    $total_funding_requirements = total_funding_requirements();

    $COGS = $total_funding_requirements['cogs'];
    $rent = $total_funding_requirements['rent'];
    $salaries = $total_funding_requirements['salaries'];
    $selling_and_marketing_expenses = $total_funding_requirements['selling_and_marketing_expenses'];
    $general_and_admin_expenses = $total_funding_requirements['required_capital_general_and_admin_expenses'];
    $total_working_capital_requirement = $COGS + $rent + $salaries + $selling_and_marketing_expenses + $general_and_admin_expenses;

//    echo number_format($total_working_capital_requirement);
    return [
        'COGS' => $COGS,
        'rent' => $rent,
        'salaries' => $salaries,
        'selling_and_marketing_expenses' => $selling_and_marketing_expenses,
        'general_and_admin_expenses' => $general_and_admin_expenses,
        'total_working_capital_requirement' => $total_working_capital_requirement,
    ];

}

function working_capital_duration(): array
{
    $COGS = working_capital_cogs;
    $rent = working_capital_rent;
    $salaries = working_capital_salaries;
    $selling_and_marketing_expenses = working_capital_selling_and_marketing_expenses;
    $general_and_admin_expenses = working_capital_general_and_admin_expenses;

//    echo $COGS . '<br>';
//    echo $rent . '<br>';
//    echo $salaries . '<br>';
//    echo $selling_and_marketing_expenses . '<br>';
//    echo $general_and_admin_expenses . '<br>';

    return [
        'COGS' => $COGS,
        'rent' => $rent,
        'salaries' => $salaries,
        'selling_and_marketing_expenses' => $selling_and_marketing_expenses,
        'general_and_admin_expenses' => $general_and_admin_expenses,
    ];
}

function financial_highLights()
{
    $income_statement = income_statement();
    $years = years();
    $average_revenue = 0;
    $average_cost_of_sales = 0;
    $average_gross_profit = 0;
    $average_net_profit = 0;
    $average_gross_margin = 0;
    $average_net_margin = 0;

    foreach ($years as $year) {
        $average_revenue += $income_statement['revenue'][$year];
        $average_cost_of_sales += $income_statement['cost_of_good_sold'][$year];
        $average_gross_profit += $income_statement['gross_profit'][$year];
        $average_net_profit += $income_statement['net_income'][$year];
        $average_gross_margin += $income_statement['gp_margin'][$year];
        $average_net_margin += $income_statement['net_margin'][$year];
    }
    $average_revenue /= count($income_statement['revenue']);
    $average_cost_of_sales /= count($income_statement['cost_of_good_sold']);
    $average_gross_profit /= count($income_statement['gross_profit']);
    $average_net_profit /= count($income_statement['net_income']);
    $average_gross_margin /= count($income_statement['gp_margin']);
    $average_net_margin /= count($income_statement['net_margin']);

//    echo number_format($average_revenue) . '<br>';
//    echo number_format($average_cost_of_sales) . '<br>';
//    echo number_format($average_gross_profit) . '<br>';
//    echo number_format($average_net_profit) . '<br>';
//    echo number_format($average_gross_margin) . '<br>';
//    echo number_format($average_net_margin) . '<br>';
}

function return_analysis_highlights()
{
    $return_on_investment = return_on_investment();
    $return_analysis = return_analysis();

    $RIO = 0;
    $NPV = $return_analysis['NPV'];
    $IRR = 0;
    $payback_period = 0;
    $ROA = 0;

    foreach ($return_on_investment['ROI'] as $item) {
        $RIO += $item;
    }
    echo number_format($NPV);
}


////////////////////////////////////////////// new project types \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
////////////////////////////////////////////// الطاقة الإنتاجية - المصانع والمقاولات والعقود \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

function products(): array
{
    return array(
        "1" => ["name" => "A", "price" => "10", "monthly_quantity" => "70"],
        "2" => ["name" => "B", "price" => "20", "monthly_quantity" => "30"],
        "3" => ["name" => "C", "price" => "30", "monthly_quantity" => "60"],
        "4" => ["name" => "D", "price" => "50", "monthly_quantity" => "50"],
        "5" => ["name" => "F", "price" => "80", "monthly_quantity" => "140"],
        "6" => ["name" => "G", "price" => "60", "monthly_quantity" => "20"],
        "7" => ["name" => "H", "price" => "40", "monthly_quantity" => "80"],
        "8" => ["name" => "I", "price" => "150", "monthly_quantity" => "60"],
        "9" => ["name" => "J", "price" => "30", "monthly_quantity" => "140"],
        "10" => ["name" => "K", "price" => "80", "monthly_quantity" => "120"],
        "11" => ["name" => "L", "price" => "60", "monthly_quantity" => "150"],
        "12" => ["name" => "M", "price" => "70", "monthly_quantity" => "180"],
        "13" => ["name" => "N", "price" => "40", "monthly_quantity" => "190"],
        "14" => ["name" => "O", "price" => "250", "monthly_quantity" => "160"],
        "15" => ["name" => "P", "price" => "30", "monthly_quantity" => "180"],
        "16" => ["name" => "Q", "price" => "150", "monthly_quantity" => "120"],
        "17" => ["name" => "R", "price" => "150", "monthly_quantity" => "150"],
        "18" => ["name" => "S", "price" => "40", "monthly_quantity" => "20"],
        "19" => ["name" => "T", "price" => "16", "monthly_quantity" => "30"],
        "20" => ["name" => "V", "price" => "20", "monthly_quantity" => "12"]
    );
}

function first_costs(): array
{
    return array(
        "1" => "30",
        "2" => "30",
        "3" => "30",
        "4" => "30",
        "5" => "30",
        "6" => "30",
        "7" => "30",
        "8" => "30",
        "9" => "30",
        "10" => "30",
        "11" => "30",
        "12" => "30",
        "13" => "30",
        "14" => "30",
        "15" => "30",
        "16" => "30",
        "17" => "30",
        "18" => "30",
        "19" => "30",
        "20" => "30"
    );
}

function monthly_quantity(): array
{
    return array(
        "1" => "70",
        "2" => "30",
        "3" => "60",
        "4" => "50",
        "5" => "140",
        "6" => "20",
        "7" => "80",
        "8" => "60",
        "9" => "140",
        "10" => "120",
        "11" => "150",
        "12" => "180",
        "13" => "190",
        "14" => "160",
        "15" => "180",
        "16" => "120",
        "17" => "150",
        "18" => "20",
        "19" => "30",
        "20" => "12"
    );
}

function second_costs(): array
{
    return array(
        "1" => "3",
        "2" => "6",
        "3" => "9",
        "4" => "15",
        "5" => "24",
        "6" => "18",
        "7" => "12",
        "8" => "45",
        "9" => "9",
        "10" => "24",
        "11" => "18",
        "12" => "21",
        "13" => "12",
        "14" => "75",
        "15" => "9",
        "16" => "45",
        "17" => "45",
        "18" => "12",
        "19" => "5",
        "20" => "6"
    );
}

function production_capacity(): array
{
    $products = products();
    $annual_quantity = array();
    $total_annual_quantity = 0;
    $annual_total = array();
    $total_annual_gross = 0;
    $annual_weight = array();
    $total_annual_weight = 0;
//    echo '# &nbsp&nbsp' . ' &nbsp&nbsp name' . ' &nbsp&nbsp&nbsp&nbsp&nbsp price' . ' &nbsp&nbsp&nbsp&nbsp&nbsp monthly quantity' .
//        ' &nbsp&nbsp&nbsp&nbsp&nbsp annual quantity' .
//        ' &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp annual total' .  '<br>';

    foreach ($products as $key => $product) {
        $annual_quantity[$key] = $product['monthly_quantity'] * 12;
        $total_annual_quantity = $total_annual_quantity + $annual_quantity[$key];

        $annual_total[$key] = $annual_quantity[$key] * $product['price'];
        $total_annual_gross = $total_annual_gross + $annual_total[$key];


//        echo $key .' | &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $product['name'] .'&nbsp&nbsp&nbsp&nbsp'.
//            ' | &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $product['price'] .
//            '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' .
//            $product['monthly_quantity'] .
//            '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
//            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'
//            . $annual_quantity[$key] .
//            '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
//            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'
//            . $annual_total[$key] . "<br>";

    }
//    echo "******************************************************************************************************************************************************".'<br>';
//    echo 'annual_weight' .'<br>';
    foreach ($products as $key => $product) {
        $annual_weight[$key] = $annual_total[$key] / $total_annual_gross;
        $total_annual_weight = $total_annual_weight + $annual_weight[$key];

//        echo number_format($annual_weight[$key]*100,2) .'<br>';
    }

    return [
        'annual_quantity' => $annual_quantity,
        'annual_total' => $annual_total,
        'annual_weight' => $annual_weight,
        'total_annual_gross' => $total_annual_gross,
    ];


}

function first_choice(): array
{
    $products = products();
    $costs = first_costs();
    $annual_quantity = array();
    $total_annual_quantity = 0;
    $annual_total = array();
    $total_annual_gross = 0;
    $annual_weight = array();
    $total_annual_weight = 0;
//    echo '# &nbsp&nbsp' . ' &nbsp&nbsp name' . ' &nbsp&nbsp&nbsp&nbsp&nbsp costs' . ' &nbsp&nbsp&nbsp&nbsp&nbsp monthly quantity' .
//        ' &nbsp&nbsp&nbsp&nbsp&nbsp annual quantity' .
//        ' &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp annual total' .  '<br>';

    foreach ($costs as $key => $item) {
        $annual_quantity[$key] = $products[$key]['monthly_quantity'] * 12;
        $total_annual_quantity = $total_annual_quantity + $annual_quantity[$key];

        $annual_total[$key] = $annual_quantity[$key] * $item * $products[$key]['price'];
        $total_annual_gross = $total_annual_gross + $annual_total[$key];


//        echo $key .' | &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $products[$key]['name'] .'&nbsp&nbsp&nbsp&nbsp'.
//            ' | &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $item . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' .
//            $products[$key]['monthly_quantity'] .
//            '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
//            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $annual_quantity[$key] .
//            '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
//            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'
//            . number_format($annual_total[$key]) . "<br>";
//        number_format((float)substr($annual_total[$key], 0, 4))

    }
//    echo "******************************************************************************************************************************************************".'<br>';
//    echo 'annual_weight' .'<br>';
    foreach ($products as $key => $product) {
        $annual_weight[$key] = $annual_total[$key] / $total_annual_gross;
        $total_annual_weight = $total_annual_weight + $annual_weight[$key];

//        echo number_format($annual_weight[$key]*100,2) .'<br>';
    }
    return [
        'total_annual_gross' => $total_annual_gross
    ];
}

function second_choice()
{
    $products = products();
    $costs = second_costs();
    $monthly_quantity = monthly_quantity();
    $annual_quantity = array();
    $total_annual_quantity = 0;
    $annual_total = array();
    $total_annual_gross = 0;
    $annual_weight = array();
    $total_annual_weight = 0;
    echo '# &nbsp&nbsp' . ' &nbsp&nbsp name' . ' &nbsp&nbsp&nbsp&nbsp&nbsp costs' . ' &nbsp&nbsp&nbsp&nbsp&nbsp monthly quantity' .
        ' &nbsp&nbsp&nbsp&nbsp&nbsp annual quantity' .
        ' &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp annual total' . '<br>';

    foreach ($costs as $key => $item) {
        $annual_quantity[$key] = $monthly_quantity[$key] * 12;
        $total_annual_quantity = $total_annual_quantity + $annual_quantity[$key];

        $annual_total[$key] = $annual_quantity[$key] * $item;
        $total_annual_gross = $total_annual_gross + $annual_total[$key];


        echo $key . ' | &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $products[$key]['name'] . '&nbsp&nbsp&nbsp&nbsp' .
            ' | &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $item . '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' .
            $monthly_quantity[$key] .
            '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp' . $annual_quantity[$key] .
            '&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp'
            . number_format($annual_total[$key]) . "<br>";
//        number_format((float)substr($annual_total[$key], 0, 4))

    }
    echo "******************************************************************************************************************************************************" . '<br>';
    echo 'annual_weight' . '<br>';
    foreach ($products as $key => $product) {
        $annual_weight[$key] = $annual_total[$key] / $total_annual_gross;
        $total_annual_weight = $total_annual_weight + $annual_weight[$key];

        echo number_format($annual_weight[$key] * 100, 2) . '<br>';
    }
}

function extra_1(): array
{
    $production_capacity = production_capacity();
    $revenues = array();
    $sales_growth = array(1 => (30 / 100), 2 => (30 / 100), 3 => (30 / 100), 4 => (30 / 100), 5 => (30 / 100));
    $returns = array();
    $commissions = array();
    $net_revenue = array();
    $inputs = array(1 => (0 / 100), 2 => (0 / 100), 3 => (1 / 100), 4 => (1 / 100), 5 => (0 / 100));
    for ($key = 1; $key <= 5; $key++) {
        if ($key == 1) {
            $revenues[$key] = $production_capacity['total_annual_gross'];
        } else {
            $revenues[$key] = $revenues[$key - 1] * (1 + ($sales_growth[$key - 1]));
        }
        $returns[$key] = $revenues[$key] * $inputs[3];
        $commissions[$key] = $revenues[$key] * $inputs[4];
        $net_revenue[$key] = $revenues[$key] - $returns[$key] - $commissions[$key];

//        echo number_format($net_revenue[$key]).'<br>';
    }
    return [
        'revenues' => $revenues,
        'net_revenue' => $net_revenue,
    ];
}

function extra_2()
{
    $production_capacity = production_capacity();
    $first_choice = first_choice();
    $extra_1 = extra_1();

    $good_costs = array();
    $packaging_costs = array();
    $shipping_costs = array();
    $wastage_costs = array();
    $additional_costs = array();
    $total_direct_costs = array();
    $margin_direct_costs = array();
    $gross_profit = array();
    $margin_gross_profit = array();

    $inputs = array(1 => (0), 2 => (2), 3 => (5), 4 => (2), 5 => (2));

    for ($key = 1; $key <= 5; $key++) {
        if ($key == 1) {
            $inputs[$key] = $first_choice['total_annual_gross'] / $production_capacity['total_annual_gross'];
        }
        $good_costs[$key] = ($inputs[1] / 100) * $extra_1['revenues'][$key];
        $packaging_costs[$key] = ($inputs[2] / 100) * $extra_1['revenues'][$key];
        $shipping_costs[$key] = ($inputs[3] / 100) * $extra_1['revenues'][$key];
        $wastage_costs[$key] = ($inputs[4] / 100) * $extra_1['revenues'][$key];
        $additional_costs[$key] = ($inputs[5] / 100) * $extra_1['revenues'][$key];
        $total_direct_costs[$key] = $good_costs[$key] + $packaging_costs[$key] + $shipping_costs[$key] + $wastage_costs[$key] + $additional_costs[$key];
        $margin_direct_costs[$key] = ($total_direct_costs[$key] / $extra_1['net_revenue'][$key] * 100);
        $gross_profit[$key] = $extra_1['net_revenue'][$key] - $total_direct_costs[$key];
        $margin_gross_profit[$key] = ($gross_profit[$key] / $extra_1['net_revenue'][$key] * 100);

        echo number_format($margin_gross_profit[$key]) . '<br>';
    }
}


////////////////////////////////////////////// دراسة عامة - مشاريع التجزئة \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\

const average_number_of_daily_customers = 200;
const average_customer_basket = 39;

function extra_3(): array
{
    $revenues = array();
    $sales_growth = array(1 => (30 / 100), 2 => (30 / 100), 3 => (30 / 100), 4 => (30 / 100), 5 => (30 / 100));
    $returns = array();
    $commissions = array();
    $net_revenue = array();
    $inputs = array(1 => (0 / 100), 2 => (0 / 100), 3 => (1 / 100), 4 => (1 / 100), 5 => (0 / 100));

    for ($key = 1; $key <= 5; $key++) {
        if ($key == 1) {
            $revenues[$key] = average_number_of_daily_customers * 365 * average_customer_basket;
        } else {
            $revenues[$key] = $revenues[$key - 1] * (1 + ($sales_growth[$key - 1]));
        }
        $returns[$key] = $revenues[$key] * $inputs[3];
        $commissions[$key] = $revenues[$key] * $inputs[4];
        if ($key == 1) {
            $net_revenue[$key] = $revenues[$key] - $returns[$key] - $commissions[$key];
        } else {
            $net_revenue[$key] = $revenues[$key] - ($returns[$key] + $commissions[$key]);
        }

//        echo number_format($net_revenue[$key]).'<br>';
    }
    return [
        'revenues' => $revenues,
        'net_revenue' => $net_revenue,
    ];
}

function extra_4_inputs(): array
{
    $total_cost_margin = array();
    $data = array(
        "1" => ["good_costs" => 25 / 100, "packaging_costs" => 5 / 100, "shipping_costs" => 1 / 100, "wastage_costs" => 2 / 100, "additional_costs" => 1 / 100],
        "2" => ["good_costs" => 25 / 100, "packaging_costs" => 5 / 100, "shipping_costs" => 1 / 100, "wastage_costs" => 2 / 100, "additional_costs" => 1 / 100],
        "3" => ["good_costs" => 25 / 100, "packaging_costs" => 5 / 100, "shipping_costs" => 1 / 100, "wastage_costs" => 2 / 100, "additional_costs" => 1 / 100],
        "4" => ["good_costs" => 25 / 100, "packaging_costs" => 5 / 100, "shipping_costs" => 1 / 100, "wastage_costs" => 2 / 100, "additional_costs" => 1 / 100],
        "5" => ["good_costs" => 25 / 100, "packaging_costs" => 5 / 100, "shipping_costs" => 1 / 100, "wastage_costs" => 2 / 100, "additional_costs" => 1 / 100],
    );
    foreach ($data as $key => $item) {
        $total_cost_margin[$key] = $item['good_costs'] + $item['packaging_costs'] + $item['shipping_costs'] + $item['wastage_costs'] + $item['additional_costs'];
//        echo $key . ' : ' . $total_cost_margin[$key] .'<br>';
    }

    return [
        'data' => $data,
        'total_cost_margin' => $total_cost_margin,
    ];
}

function extra_4()
{
    $extra_3 = extra_3();
    $inputs = extra_4_inputs();

    $good_costs = array();
    $packaging_costs = array();
    $shipping_costs = array();
    $wastage_costs = array();
    $additional_costs = array();
    $total_direct_costs = array();
    $margin_direct_costs = array();
    $gross_profit = array();
    $margin_gross_profit = array();


    for ($key = 1; $key <= 5; $key++) {

        $good_costs[$key] = $inputs['data'][$key]['good_costs'] * $extra_3['net_revenue'][$key];
        $packaging_costs[$key] = $inputs['data'][$key]['packaging_costs'] * $extra_3['net_revenue'][$key];
        $shipping_costs[$key] = $inputs['data'][$key]['shipping_costs'] * $extra_3['net_revenue'][$key];
        $wastage_costs[$key] = $inputs['data'][$key]['wastage_costs'] * $extra_3['net_revenue'][$key];
        $additional_costs[$key] = $inputs['data'][$key]['additional_costs'] * $extra_3['net_revenue'][$key];

        $total_direct_costs[$key] = $good_costs[$key] + $packaging_costs[$key] + $shipping_costs[$key] + $wastage_costs[$key] + $additional_costs[$key];
        $margin_direct_costs[$key] = ($total_direct_costs[$key] / $extra_3['net_revenue'][$key]);
        $gross_profit[$key] = $extra_3['net_revenue'][$key] - $total_direct_costs[$key];
        $margin_gross_profit[$key] = ($gross_profit[$key] / $extra_3['net_revenue'][$key] * 100);

//        echo number_format($margin_gross_profit[$key]) . '<br>';
    }
}


//********************************************************* New Dashboard *************************************************************

function months()
{
    $loan_years = array();
    $debt_assumptions = debt_assumptions();
    $year = $debt_assumptions['loan_start_date']->format('Y');

    $years = array($year);
    for ($i = 0; $i < study_duration - 1; $i++) {
        $years[] = $years[$i] + 1;
    }
    $months = array(1 => 'Jan',2 => 'Feb',3 => 'Mar',4 => 'Apr',5 => 'May',6 => 'Jun',7 => 'Jul',8 => 'Aug',9 => 'Sep',10 => 'Oct',11 => 'Nov',12 => 'Dec');

    foreach ($years as $year){
        foreach ($months as $key => $month){
//            $month = $year . '-' . $key .'-30';
//            $years[$month] = $month;
            $loan_years[$year][$month] = $year . '-' . $key . '-' . '30';

        }
    }

//    foreach ($loan_years as $key => $year){
//        echo $key .'<br>';
//        foreach ($year as $key_2 =>  $item){
//            echo $key_2 . '=>>>' . $item .'<br>';
//            }
//        echo '**************************************************' .'<br>';
//    }





    return [
        'months' => $loan_years
    ];
}



function start_up_cost()
{
    $consultancy_fee = 25000;
    $legal_fee = 25000;
    $spare_1 = 50000;
    $total = $consultancy_fee + $legal_fee + $spare_1;

    return  $total;


}

function capital_structure(): array
{
    $total_funding_requirements = total_funding_requirements();

    $debt = 1000000;
    $equity = $total_funding_requirements['total_funding_requirement'] - $debt;
    $total = $debt + $equity;

//    echo number_format($equity);
    $debt_percentage = $debt / $total;
    $equity_percentage = $equity / $total;
    $total_percentage = $debt_percentage + $equity_percentage;

    return [
        'debt' => $debt,
        'equity' => $equity,
        'total'  => $total,
    ];
}

function debt_assumptions(): array
{
    $loan_start_date = new DateTime("2023-1-1");
    $loan_start_date->format('Y-m-d');
    $tenor = 3;
    $grace_period_month = 18;
    $grace_period_year = $grace_period_month/12;
    $loan_ending_date = $loan_start_date->format('Y') + ($tenor + $grace_period_year);
    $interest_rae = 5; //percentage
    $management_fee = 20000;
//    echo $loan_ending_date;

    return [
        'loan_start_date' => $loan_start_date,
        'tenor' => $tenor,
        'grace_period_month' => $grace_period_month,
        'loan_ending_date' => $loan_ending_date,
        'interest_rae' => $interest_rae,
        'management_fee' => $management_fee,
    ];

}

function sheet2(): array
{
    $years = years();
    $model_ending_date= $years['start_year'] + study_duration;

    $item = array();

    foreach ($years['years'] as $year){
        if ($year >= $years['start_year'] && $year <= $model_ending_date){
            $item[$year] = 1;
        }else{
            $item[$year] = 0;
        }
//        echo $year . ' : ' . $item[$year] . '<br>';
    }

    return [
        'item' => $item
    ];
}

//function debt_schedule()
//{
//    $debt_assumptions = debt_assumptions();
//    $months = months();
//    $years = years();
//    $capital_structure = capital_structure();
//
//    $var_1 = $debt_assumptions['loan_start_date'];
//    $var_1->modify('+'. $debt_assumptions['grace_period_month'] .'month'); // or you can use '-90 day' for deduct
//    $var_1->modify('+30 day'); // or you can use '-90 day' for deduct
//    $var_1 = $var_1->format('Y-m-d');
////    echo $var_1 . '<br>';
//
//    $var_2 = new DateTime($var_1);
//    $var_2->modify('+'. ($debt_assumptions['tenor'] * 12) .'month'); // or you can use '-90 day' for deduct
////    $var_2->modify('+30 day'); // or you can use '-90 day' for deduct
//    $var_2 = $var_2->format('Y-m-d');
////    echo $var_2;
//
//    $payment = 27708;
//
//    $repayment_flag = array();
//    $additions = array();
//    $opening  = array();
//    $closing  = array();
//    $repayment = array();
//    $interest = array();
//
//    $total_additions = array();
//    $total_repayment = array();
//    $total_interest = array();
//    $total_closing = array();
//
//    $loan_amount = array();
//    $interest_rate = array();
//    $total_number_of_period = array();
//    $mathematical_formula = array();
//    $repayment_withing_total_time = array();
//    $repayment_monthly = array();
//
//
//    foreach ($months['months'] as $key => $item){
//        echo $key . '<br>';
//        foreach ($item as $key_2 => $value){
//            $value = new DateTime($value);
//            echo $key_2 . ' : ' . $value->format('Y-m-d') . '<br>';
//        }
//    }
//
//
//    $prev = null;
//    $total_repayment_flag = 0;
//    foreach ($months['months'] as $key => $item){
//        foreach ($item as $key_2 => $value){
//            if ($value->format('Y-m-d') > $var_1 && $value->format('Y-m-d') <=$var_2){
//                $repayment_flag[$key][$key_2] = 1;
//            }else{
//                $repayment_flag[$key][$key_2] = 0;
//            }
////            echo $year . ' ; ' . $month . ' : ' . $repayment_flag[$year][$month] . '<br>';
//            $total_repayment_flag += $repayment_flag[$key][$key_2];
//
//            if ($value->format('Y') == $years['start_year'] && $key == 1){
//                $opening[$key][$key_2] = 0;
//                $additions[$key][$key_2] = $capital_structure['debt'];
//            }else{
//                $opening[$key][$key_2] = $prev;
//                $additions[$key][$key_2] = 0;
//            }
//
//
//            $interest[$key][$key_2] = ($opening[$key][$key_2] + $additions[$key][$key_2]) * (($debt_assumptions['interest_rae']/100) / 12);
//            $repayment[$key][$key_2] = ($interest[$key][$key_2] - $payment) * $repayment_flag[$key][$key_2];
//            $closing[$key][$key_2] = $opening[$key][$key_2] + $additions[$key][$key_2] + $repayment[$key][$key_2];
//
//            $prev = $closing[$key][$key_2];
//
//
//            if (!array_key_exists($year, $total_additions)) {
//                $total_additions[$year] = 0;
//            }
//            $total_additions[$year] += $additions[$year][$month];
//
//            if (!array_key_exists($year, $total_repayment)) {
//                $total_repayment[$year] = 0;
//            }
//            $total_repayment[$year] += $repayment[$year][$month];
//
//            if (!array_key_exists($year, $total_interest)) {
//                $total_interest[$year] = 0;
//            }
//            $total_interest[$year] += $interest[$year][$month];
//
//            if (!array_key_exists($year, $total_closing)) {
//                $total_closing[$year] = 0;
//            }
//            $total_closing[$year] += $closing[$year][$month];
//
////
////            echo $year . ' : ' . $month . ' : ' . number_format($opening[$year][$month]) . '<br>';
////            echo $year . ' : ' . $month . ' : ' . number_format($additions[$year][$month]) . '<br>';
////            echo $year . ' : ' . $month . ' : ' . number_format($repayment[$year][$month]) . '<br>';
////            echo $year . ' : ' . $month . ' : ' . number_format($interest[$year][$month]) . '<br>';
////            echo $year . ' : ' . $month . ' : ' . number_format($closing[$year][$month]) . '<br>';
//        }
////        echo '*****************************************' . '<br>';
//
//    }
////    echo 'total : ' . $total . '<br>';
//
//    foreach ($years['years'] as $year) {
//        foreach ($months as $key => $month) {
//
//            $loan_amount[$year][$month] = $opening[$year][$month] + $additions[$year][$month];
//            $interest_rate[$year][$month] = ($debt_assumptions['interest_rae']/100) / 12;
//            $total_number_of_period[$year][$month] = $total_repayment_flag - ($repayment_flag[$year][$month] * $repayment_flag[$year][$month]);
//            $mathematical_formula[$year][$month] = ($interest_rate[$year][$month] * (1 + $interest_rate[$year][$month])**$total_number_of_period[$year][$month])/ ((1 + $interest_rate[$year][$month])**$total_number_of_period[$year][$month]-1);
//            $repayment_withing_total_time[$year][$month]  = $mathematical_formula[$year][$month] * $loan_amount[$year][$month];
//            $repayment_monthly[$year][$month]  = $repayment_withing_total_time[$year][$month] / $total_number_of_period[$year][$month];
////            echo $year . ' : ' . $month . ' : ' . number_format($repayment_monthly[$year][$month]) . '<br>';
//
//        }
//    }
//
//    return [
//        'repayment_flag' => $repayment_flag,
//        'opening' => $opening,
//        'additions' => $additions,
//        'repayment' => $repayment,
//        'interest' => $interest,
//        'closing' => $closing,
//        'total_additions' => $total_additions,
//        'total_repayment' => $total_repayment,
//        'total_interest' => $total_interest,
//        'total_closing' => $total_closing,
//    ];
//
//}

function operating_model_debt_schedule(): array
{
    $debt_assumptions = debt_assumptions();
    $years = years();
    $capital_structure = capital_structure();
    $loan_start_date = $debt_assumptions['loan_start_date']->format('Y');
    $loan_ending_date = $debt_assumptions['loan_ending_date'];
    $interest_rae = $debt_assumptions['interest_rae'];

    $payment = 242500;

    $repayment_flag = array();
    $additions = array();
    $opening  = array();
    $closing  = array();
    $repayment = array();
    $interest = array();

    foreach ($years['years'] as $year){

        if ($loan_start_date < $year && $loan_ending_date > $year){
            $repayment_flag[$year] = 1;
        }else{
            $repayment_flag[$year] = 0;
        }

        if ($year == $years['start_year']){
            $opening[$year] = 0;
        }else{
            $opening[$year] = $closing[$year-1];
        }

        if ($year == $loan_start_date){
            $additions[$year] = $capital_structure['debt'];
        }else{
            $additions[$year] = 0;
        }

        $interest[$year] = ($opening[$year] + $additions[$year]) * (($interest_rae / 100) * $repayment_flag[$year]);
        $repayment[$year] = ($interest[$year] - $payment) * $repayment_flag[$year];
        $closing[$year] = $opening[$year] + $additions[$year] + $repayment[$year];


//            echo 'repayment Flag : ' .  $year  . ' : ' . $repayment_flag[$year] . '<br>';
//            echo 'opening : ' .  $year  . ' : ' . $opening[$year] . '<br>';
//            echo 'additions : ' .  $year  . ' : ' . $additions[$year] . '<br>';
//            echo 'repayment : ' .  $year  . ' : ' . $repayment[$year] . '<br>';
//            echo 'interest : ' .  $year  . ' : ' . $interest[$year] . '<br>';
//            echo 'closing : ' .  $year  . ' : ' . $closing[$year] . '<br>';
//
//        echo '*****************************************' . '<br>';

    }





    return [
        'repayment_flag' => $repayment_flag,
        'opening'  => $opening,
        'additions' => $additions,
        'repayment' => $repayment,
        'interest' => $interest,
        'closing'  => $closing,
    ];


}
