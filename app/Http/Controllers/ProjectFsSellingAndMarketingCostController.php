<?php

namespace App\Http\Controllers;

use App\Models\ProjectFsSellingAndMarketingCost;
use App\Http\Requests\StoreProjectFsSellingAndMarketingCostRequest;
use App\Http\Requests\UpdateProjectFsSellingAndMarketingCostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectFsSellingAndMarketingCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectFsSellingAndMarketingCostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectFsSellingAndMarketingCostRequest $request)
    {

        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'marketing_amount' => 'required',
            'marketing_ratio' => 'required',
            'marketing_growth_rate' => 'required',
        ], [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل يجب ان يحتوي على نص',
            'max' => 'هذا الحقل طويل للفاية',
            'min' => 'هذا الحقل قصير للغاية',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            ProjectFsSellingAndMarketingCost::where('project_id', $request->project_id)->delete();
            $data = ProjectFsSellingAndMarketingCost::create([
                'marketing_ratio' => $request->marketing_ratio,
                'marketing_amount' => $request->marketing_amount,
                'project_id' => $request->project_id,
                'marketing_growth_rate' => $request->marketing_growth_rate,
            ]);


            return response()->json([
                'status' => 1, 'success' => 'تمت الاضافة بنجاح',
                'data' => $data,
            ]);
        }
    }
    public function fetch_marketing(Request $request)
    {

        $data = ProjectFsSellingAndMarketingCost::where('project_id', $request->id)->first();
        // dd($data);
        $marketing_ratio = ($data->marketing_ratio / 100) * incomeData($request->id)['totleIncomeToEndYear'];
        $marketing_amount = $data->marketing_amount;
        $marketing_growth_rate = $data->marketing_growth_rate;
        return response()->json([
            'data' => $data,
            'marketing_ratio' => $marketing_ratio,
            'marketing_amount' => $marketing_amount,
            'marketing_growth_rate' => $marketing_growth_rate,
        ]);
    }
    public function fetch_marketing_details(Request $request,$pro_id)
    {
        $data = ProjectFsSellingAndMarketingCost::where('project_id', $request->id)->first();
        $item = 0;

        $item = ProjectFsSellingAndMarketingCost::where('project_id', $request->id)->first();
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


        return response()->json([
            'message' => 'success',
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
            'success' => 'تم تخزين البيانات بنجاح'
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectFsSellingAndMarketingCost  $projectFsSellingAndMarketingCost
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectFsSellingAndMarketingCost $projectFsSellingAndMarketingCost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectFsSellingAndMarketingCost  $projectFsSellingAndMarketingCost
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectFsSellingAndMarketingCost $projectFsSellingAndMarketingCost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectFsSellingAndMarketingCostRequest  $request
     * @param  \App\Models\ProjectFsSellingAndMarketingCost  $projectFsSellingAndMarketingCost
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectFsSellingAndMarketingCostRequest $request, ProjectFsSellingAndMarketingCost $projectFsSellingAndMarketingCost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectFsSellingAndMarketingCost  $projectFsSellingAndMarketingCost
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectFsSellingAndMarketingCost $projectFsSellingAndMarketingCost)
    {
        //
    }
}
