<?php

namespace App\Http\Controllers;

use App\Models\ProjectFsGeneralAdministrativeExpenses;
use App\Http\Requests\StoreProjectFsGeneralAdministrativeExpensesRequest;
use App\Http\Requests\UpdateProjectFsGeneralAdministrativeExpensesRequest;
use App\Models\admin\Project;
use App\Models\ProjectFsGeneralAdministrativeExpensesDetails;
use App\Models\ProjectFsGeneralExpensesIncrementals;
use App\Models\ProjectFsGeneralExpensesIncrementalsDetails;
use App\Models\ProjectFsOtherExpenses;
use App\Models\ProjectFsOtherExpensesIncrementals;
use App\Models\ProjectFsOtherExpensesIncrementalsDetails;
use App\Models\ProjectFsRent;
use App\Models\ProjectFsRentDetails;
use App\Models\ProjectFsRentIncrementals;
use App\Models\ProjectFsSellingAndMarketingCost;
use App\Models\ProjectFsUtilities;
use App\Models\ProjectFsUtilitiesDetails;
use App\Models\ProjectFsUtilitiesIncrementals;
use App\Models\ProjectFsUtilitiesIncrementalsDetails;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProjectFsGeneralIncome;
use App\Models\ProjectFsGeneralIncomeIncremental;
use App\Models\ProjectFsGeneralIncomeIncrementalDetail;
class ProjectFsGeneralAdministrativeExpensesController extends Controller
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
     * @param  \App\Http\Requests\StoreProjectFsGeneralAdministrativeExpensesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectFsGeneralAdministrativeExpensesRequest $request,$pro_id)
    {

     $data = $request->all();


       // dd($expensis_type);
        $validator = Validator::make($request->all(), [
            'project_id' => 'required',
            'administrative_expenses_type' => 'required',
        ], [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل يجب ان يحتوي على نص',
            'max' => 'هذا الحقل طويل للفاية',
            'min' => 'هذا الحقل قصير للغاية',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $i = ProjectFsGeneralAdministrativeExpenses::where('project_id', $request->project_id)->delete();
            $e = ProjectFsGeneralAdministrativeExpensesDetails::where('project_id', $request->project_id)->delete();
            if ($request->administrative_expenses_type == 1) {
                $request->validate([
                    'expense_amount' => 'required',
                ]);
                $data = ProjectFsGeneralAdministrativeExpenses::create([
                    'project_id' => $request->project_id,
                    'type' => 'amount',
                    'value' => $request->expense_amount,
                ]);
            } elseif ($request->administrative_expenses_type == 2) {
                $request->validate([
                    'expense_ratio' => 'required',
                ]);
                $data =  ProjectFsGeneralAdministrativeExpenses::create([
                    'project_id' => $request->project_id,
                    'type' => 'ratio',
                    'value' => $request->expense_ratio,
                ]);
            } elseif ($request->administrative_expenses_type == 3) {
                $test = $request->validate([
                    'expensis_type.*' => 'required',
                    'value.*' => 'required',
                ]);
                $data = ProjectFsGeneralAdministrativeExpenses::create([
                    'project_id' => $request->project_id,
                    'type' => 'custom',
                ]);
                // dd($request->all());
                $del_val = 'أخري';
                $expensis_type =[];
                foreach ($test['expensis_type'] as $key => $item){
                    if($item !== 'أخري'){
                        array_push($expensis_type, $item);
                      }
                }
                foreach ($expensis_type as $key => $item) {
                   // dd($expensis_type [$key]);
                    ProjectFsGeneralAdministrativeExpensesDetails::create([
                        'gae_id' => $data->id,
                        'expensis_type' => $expensis_type[$key],
                        'value' => $test['value'][$key],
                        'project_id' => $request->project_id,

                    ]);
                }
            }

            return response()->json([
                'status' => 1, 'success' => 'تمت الاضافة بنجاح',
                'data' => $data,
            ]);
        }
    }

    public function fetch_administrative_expenses(Request $request,$pro_id)
    {

        $data = ProjectFsGeneralAdministrativeExpenses::where('project_id',$pro_id)->first();
       // dd($data);
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
    //     return response()->json(['data' => $data]);
    // }
    public function fetch_administrative_expenses_incremintal(Request $request,$pro_id)
    {
        $data = ProjectFsGeneralExpensesIncrementals::where('project_id', $request->id)->first();
       // dd($data);
        $details = ProjectFsGeneralExpensesIncrementalsDetails::where('general_expenses_id', $data->id)->get();
        return response()->json(['data' => $details]);
    }
    public function fetch_other_incremintal(Request $request)
    {
        $details = ProjectFsOtherExpensesIncrementalsDetails::where('project_id', $request->id)->get();
        return response()->json(['data' => $details]);
    }
    public function fetch_rent(Request $request)
    {
        $data = ProjectFsRent::where('project_id', $request->id)->first();
        if ($data->type == 'amount') {
            $data = ProjectFsRent::where('project_id', $request->id)->first();
        }
        $total = 0;
        $item = 0;
        if ($data->type == 'custom') {
            $item = ProjectFsRentDetails::where('project_id', $request->id)->get();

            foreach ($item as $i) {
                $total += $i->value;
            }
        }
        return response()->json([
            'data' => $data,
            'item' => $item,
            'total' => $total,
        ]);
    }
    public function fetch_rent_details(Request $request,$pro_id)
    {

    //dd('dd');
    $rentArray = array();
        $data = ProjectFsRent::where('project_id', $request->id)->first();
        $item = 0;
        if ($data->type == 'custom') {
            $rentItems = ProjectFsRentDetails::where('project_id', $request->id)->get();

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
//$rentArray = array();
            foreach ($rentItems as $item) {
                $prevValue = $item->value;
                $rentArrayy = [$item->title,$prevValue];
                $rentIncemental = $item->growth_rent;
               // dd(years($pro_id)['years']);

                foreach (years($pro_id)['years'] as $key => $year) {

                    $prevValue = $prevValue * (1 + ($item->growth_rent / 100));
                    array_push($rentArrayy, $prevValue);
                }
                array_push($rentArray,$rentArrayy);

            }
           // dd($rentArray);
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
       // dd($pre);
        $yearCurrent = date('Y', strtotime('12/31'));

        //dd($rentArray);
        return response()->json([
            'message' => 'success',
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
            'success' => 'تم تخزين البيانات بنجاح'
        ]);
    }
    public function fetch_utilities(Request $request)
    {
        $data = ProjectFsUtilities::where('project_id', $request->id)->first();
        // dd($data);
        if ($data->type == 'amount') {
            $data = ProjectFsUtilities::where('project_id', $request->id)->first();
        }
        $total = 0;
        $item = 0;
        if ($data->type == 'custom') {
            $item = ProjectFsUtilitiesDetails::where('project_id', $request->id)->get();

            foreach ($item as $i) {
                $total += $i->value;
            }
        }
        return response()->json([
            'data' => $data,
            'item' => $item,
            'total' => $total,
        ]);
    }
    public function fetch_utilities_details(Request $request,$pro_id)
    {
        $item = ProjectFsUtilitiesDetails::where('project_id', $request->id)->get();
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
       // dd($pre);

        return response()->json([
            'message' => 'success',
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
            'success' => 'تم تخزين البيانات بنجاح'
        ]);
    }
    public function fetch_other_details(Request $request,$pro_id)
    {
        $item = ProjectFsOtherExpenses::where('project_id', $request->id)->get();
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
        return response()->json([
            'message' => 'success',
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
            'success' => 'تم تخزين البيانات بنجاح'
        ]);
    }
    public function fetch_all_details(Request $request,$pro_id)
    {

       // dd('dd');
        $data_selling_marketing_cost = ProjectFsSellingAndMarketingCost::where('project_id', $request->id)->first();
        $item_selling_marketing_cost = 0;

        $item_selling_marketing_cost = ProjectFsSellingAndMarketingCost::where('project_id', $request->id)->first();
        $current_value_selling_marketing_cost = $item_selling_marketing_cost->marketing_amount;
        $growth_selling_marketing_cost = ProjectFsSellingAndMarketingCost::where('project_id', $pro_id)->first();

        $prev_selling_marketing_cost = 0;
        foreach (years($pro_id)['years'] as $key => $year) {
            $prev_selling_marketing_cost = $current_value_selling_marketing_cost * (1 + ($growth_selling_marketing_cost->marketing_growth_rate / 100));
            $nxt1_selling_marketing_cost = $prev_selling_marketing_cost * (1 + ($growth_selling_marketing_cost->marketing_growth_rate / 100));
            $nxt2_selling_marketing_cost = $nxt1_selling_marketing_cost * (1 + ($growth_selling_marketing_cost->marketing_growth_rate / 100));
            $nxt3_selling_marketing_cost = $nxt2_selling_marketing_cost * (1 + ($growth_selling_marketing_cost->marketing_growth_rate / 100));
            $nxt4_selling_marketing_cost = $nxt3_selling_marketing_cost * (1 + ($growth_selling_marketing_cost->marketing_growth_rate / 100));
        }

        $pre_selling_marketing_cost = 0;
        $current_selling_marketing_cost = ($current_value_selling_marketing_cost /  incomeData($pro_id)['totleIncomeToEndYear']) * 100;
        foreach (years($pro_id)['years'] as $key => $year) {
                foreach (incomeData($pro_id)['totleYear'] as $key => $item) {
            $pre_selling_marketing_cost =    ($prev_selling_marketing_cost / $item) * 100;
            $next1_selling_marketing_cost =  ($nxt1_selling_marketing_cost / $item) * 100;;
            $next2_selling_marketing_cost =  ($nxt2_selling_marketing_cost / $item) * 100;;
            $next3_selling_marketing_cost =  ($nxt3_selling_marketing_cost / $item) * 100;;
            $next4_selling_marketing_cost =  ($nxt4_selling_marketing_cost / $item) * 100;;
        }
    }
        $yearCurrent = date('Y', strtotime('12/31'));

        return response()->json([
            'message' => 'success',
            'year' => $yearCurrent,
            'item_selling_marketing_cost' => $item_selling_marketing_cost,
            'data_selling_marketing_cost' => $data_selling_marketing_cost,
            'current_value_selling_marketing_cost' => $current_value_selling_marketing_cost,
            'prev_selling_marketing_cost' => $prev_selling_marketing_cost,
            'nxt1_selling_marketing_cost' => $nxt1_selling_marketing_cost,
            'nxt2_selling_marketing_cost' => $nxt2_selling_marketing_cost,
            'nxt3_selling_marketing_cost' => $nxt3_selling_marketing_cost,
            'nxt4_selling_marketing_cost' => $nxt4_selling_marketing_cost,
            'pre_selling_marketing_cost' => $pre_selling_marketing_cost,
            'next1_selling_marketing_cost' => $next1_selling_marketing_cost,
            'next2_selling_marketing_cost' => $next2_selling_marketing_cost,
            'next3_selling_marketing_cost' => $next3_selling_marketing_cost,
            'next4_selling_marketing_cost' => $next4_selling_marketing_cost,

        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectFsGeneralAdministrativeExpenses  $projectFsGeneralAdministrativeExpenses
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectFsGeneralAdministrativeExpenses $projectFsGeneralAdministrativeExpenses)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectFsGeneralAdministrativeExpenses  $projectFsGeneralAdministrativeExpenses
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectFsGeneralAdministrativeExpenses $projectFsGeneralAdministrativeExpenses)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectFsGeneralAdministrativeExpensesRequest  $request
     * @param  \App\Models\ProjectFsGeneralAdministrativeExpenses  $projectFsGeneralAdministrativeExpenses
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectFsGeneralAdministrativeExpensesRequest $request, ProjectFsGeneralAdministrativeExpenses $projectFsGeneralAdministrativeExpenses)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectFsGeneralAdministrativeExpenses  $projectFsGeneralAdministrativeExpenses
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectFsGeneralAdministrativeExpenses $projectFsGeneralAdministrativeExpenses)
    {
        //
    }
}
