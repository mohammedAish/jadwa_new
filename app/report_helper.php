<?php


use App\Models\ProjectFsGeneralIncomeIncremental;
use App\Models\ProjectFsGeneralIncomeIncrementalDetail;
use App\Models\ProjectFsSellingAndMarketingCost;

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
//    $data = ProjectFsSellingAndMarketingCost::where('project_id', $request->id)->first();
    $data = ProjectFsSellingAndMarketingCost::where('project_id', $pro_id)->first();
    $item = 0;

//    $item = ProjectFsSellingAndMarketingCost::where('project_id', $request->id)->first();
    $item = ProjectFsSellingAndMarketingCost::where('project_id',$pro_id)->first();
//    $current_value = $item->marketing_amount + $item->marketing_ratio;
    $current_value = 20000+30 ;
    $growth = ProjectFsSellingAndMarketingCost::where('project_id', $pro_id)->first();
//    $marketing_growth_rate=$growth->marketing_growth_rate;
    $marketing_growth_rate = 10;
    $prev = 0;
    foreach (years($pro_id)['years'] as $key => $year) {
//        $prev = $current_value * (1 + ($growth->marketing_growth_rate / 100));
        $prev = $current_value * (1 + ($marketing_growth_rate / 100));
        $nxt1 = $prev * (1 + ($marketing_growth_rate / 100));
        $nxt2 = $nxt1 * (1 + ($marketing_growth_rate / 100));
        $nxt3 = $nxt2 * (1 + ($marketing_growth_rate / 100));
        $nxt4 = $nxt3 * (1 + ($marketing_growth_rate/ 100));
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

function annual_growth_rate_of_revenues_during_the_study_period($pro_id){

    $projectFsGeneralIncome = ProjectFsGeneralIncomeIncremental::query()->where('project_id',$pro_id)->first();
    $data =ProjectFsGeneralIncomeIncrementalDetail::where('project_fs_income_incremental_id',$projectFsGeneralIncome->id)->get();
    return ['data'=>$data,'projectFsGeneralIncome'=>$projectFsGeneralIncome];

}
