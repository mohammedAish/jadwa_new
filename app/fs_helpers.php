<?php

use App\Models\admin\Project;


function projectDetail($id){
    $project = Project::where('id',$id)->where('owner_id' , Auth::user()->id)->first();
    $study_duration =$project->study_duration;
    $vat =$project->vat;
    $project_type =$project->project_type;
return [
    'study_duration' => $study_duration,
    'vat' => $vat,
    'project_type' => $project_type,
];
}


function years($id): array

{

    $project = Project::where('id',$id)->first();
    //dd($project);
   $projectStartDate = new DateTime($project->start_date);
                $start_year = date('Y-m-d', strtotime($project->start_date));
                $model_assumptions = model_assumptions($start_year,'3', '365', '15');
   $start_year = $model_assumptions['business_start_year'];

//dd($operationDate);

    $years = array($start_year);
    for ($i = 0; $i < projectDetail($id)['study_duration'] - 1; $i++) {
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
