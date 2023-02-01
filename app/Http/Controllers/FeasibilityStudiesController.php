<?php

namespace App\Http\Controllers;

use App\Models\admin\Project;
use App\Models\AdministExpen;
use App\Models\FeasibilityStudy;
use App\Models\GeneralProjectIncome;
use App\Models\ProjectBpChannelResource;
use App\Models\ProjectExpGeneralIncome;
use App\Models\ProjectExpGeneralIncomeIncremental;
use App\Models\ProjectExpGeneralIncomeIncrementalDetail;
use App\Models\ProjectFsGeneralAdministrativeExpenses;
use App\Models\ProjectFsGeneralAdministrativeExpensesDetails;
use App\Models\ProjectFsGeneralIncome;
use App\Models\ProjectFsGeneralIncomeIncremental;
use App\Models\ProjectFsGeneralIncomeIncrementalDetail;
use App\Models\ProjectProductDetail;
use Illuminate\Http\Request;
use App\Models\ProjectFsGeneralExpensesIncrementalsDetails;
use App\Models\ProjectFsGeneralExpensesIncrementals;
use App\Models\ProjectFsOtherExpenses;
use App\Models\ProjectFsRent;
use App\Models\ProjectFsRentDetails;
use App\Models\ProjectFsSellingAndMarketingCost;
use App\Models\ProjectFsUtilities;
use App\Models\ProjectFsUtilitiesDetails;
use App\Models\ProjectFsUtilitiesIncrementalsDetails;
use App\Models\ProjectFsUtilitiesIncrementals;
use App\Models\ProjectFsOtherExpensesIncrementalsDetails;
use App\Models\ProjectFsOtherExpensesIncrementals;

class FeasibilityStudiesController extends Controller
{
    public function index($id)
    {
        $project = Project::where('id',$id)->first();
        return view('admin.forms.feasibility_study',compact('project'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(FeasibilityStudy $feasibilityStudy)
    {
    }

    public function edit(FeasibilityStudy $feasibilityStudy)
    {
    }

    public function update(Request $request, FeasibilityStudy $feasibilityStudy)
    {
    }

    public function destroy(FeasibilityStudy $feasibilityStudy)
    {
    }


    public function view_strategic_plan()
    {
        return view('admin.forms.strategic_plan');
    }

    public function view_market_study()
    {
        $marketing_channels = ProjectBpChannelResource::query()->where('type', 'marketing_channel')->get();
        $income_sources = ProjectBpChannelResource::query()->where('type', 'income_sources')->get();
        $expenses_modal = ProjectBpChannelResource::query()->where('type', 'expensis_modal')->get();
        $main_activity = ProjectBpChannelResource::query()->where('type' , 'main_activity' )->get();
        $project_product_details = ProjectProductDetail::query()->where('project_id' , 1)->get();

        return view('admin.forms.market_study',compact('marketing_channels','income_sources','expenses_modal','main_activity','project_product_details'));
    }

    public function view_administrators()
    {
        $marketing_channels = ProjectBpChannelResource::query()->where('type', 'marketing_channel')->get();
        $income_sources = ProjectBpChannelResource::query()->where('type', 'income_sources')->get();
        $expenses_modal = ProjectBpChannelResource::query()->where('type', 'expensis_modal')->get();
        $main_activity = ProjectBpChannelResource::query()->where('type' , 'main_activity')->get();
        $project_product_details = ProjectProductDetail::query()->where('project_id',1)->get();

                $project_product_details = ProjectProductDetail::query()->where('project_id',1)->get();

        return view('admin.forms.administrators',compact('marketing_channels','income_sources','expenses_modal','main_activity','project_product_details'));

    }

    public function view_revenues($pro_id)
    {

        $project=Project::findOrFail($pro_id);

        $projectIncomes = ProjectFsGeneralIncome::where('project_id',$project->id)->get();
    //  dd($projectIncomes);
    $projectFsGeneralIncomeIncremental = ProjectFsGeneralIncomeIncremental::where('project_id',$project->id)->first();

       if($projectFsGeneralIncomeIncremental !=null){
//dd('s');
        $projectFsGeneralIncomeIncrementalDetail = ProjectFsGeneralIncomeIncrementalDetail::where('project_fs_income_incremental_id',$projectFsGeneralIncomeIncremental->id)->get();
        }else{
            $projectFsGeneralIncomeIncrementalDetail = ProjectFsGeneralIncomeIncrementalDetail::where('project_fs_income_incremental_id',0)->get();

        }
        $projectEXpIncomes = ProjectExpGeneralIncome::where('project_id',$project->id)->get();
       // dd($projectEXpIncomes);
       $projectExpGeneralIncomeIncremental = ProjectExpGeneralIncomeIncremental::where('project_id',$project->id)->first();

    //   dd($projectExpGeneralIncomeIncremental);

       if($projectExpGeneralIncomeIncremental !=null ){

        $projectExpGeneralIncomeIncrementalDetail = ProjectExpGeneralIncomeIncrementalDetail::where('project_exp_income_incremental_id',$projectExpGeneralIncomeIncremental->id)->get();
       }else{
        $projectExpGeneralIncomeIncrementalDetail = ProjectExpGeneralIncomeIncrementalDetail::where('project_exp_income_incremental_id',0)->get();
       }



        return view('admin.forms.revenues',compact('project','projectIncomes','projectEXpIncomes','projectFsGeneralIncomeIncrementalDetail','projectFsGeneralIncomeIncremental','projectExpGeneralIncomeIncremental','projectExpGeneralIncomeIncrementalDetail'));

    }

    public function create_service(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string'],
            'details' => ['required', 'string'],
        ]);
        $data = $request->only([
           'name','details',
        ]);

        $data['project_id'] = 1;
        $item = ProjectProductDetail::query()->create($data);

        if ($item){
            return response()->json([
                'isSuccess' => true,
                'Message' => "تم حفظ البيانات بنجاح"
            ], 200); // Status code
        }else{
            return response()->json([
                'isSuccess' => false,
                'Message' => "حدث خطأ أثناء حفظ البيانات ..!"
            ], 200); // Status code
        }
    }

    public function update_service(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'details' => ['required', 'string'],
        ]);
        $data = $request->only([
            'id','name','details',
        ]);

        $item = ProjectProductDetail::query()->findOrFail($request->id)->update($data);

        if ($item){
            return response()->json([
                'isSuccess' => true,
                'Message' => "تم تعديل البيانات بنجاح"
            ], 200); // Status code
        }else{
            return response()->json([
                'isSuccess' => false,
                'Message' => "حدث خطأ أثناء التعديل ..!"
            ], 200); // Status code
        }
    }

    public function delete_service(Request $request)
    {
        $request->validate([
            'id' => ['required']
        ]);


        $item = ProjectProductDetail::query()->findOrFail($request->id)->delete();

        if ($item){
            return response()->json([
                'isSuccess' => true,
                'Message' => "تم حذف العنصر بنجاح"
            ], 200); // Status code
        }else{
            return response()->json([
                'isSuccess' => false,
                'Message' => "حدث خطأ أثناء الحذف ..!"
            ], 204); // Status code
        }
    }

    public function fetch_project_services()
    {
        $services = ProjectProductDetail::query()->latest()->get();
        return response()->json([
            'services'=>$services,
        ]);
    }

    public function generalAdministrativeExpenses($pro_id)
    {
       // dd('d');
        $project=Project::findOrFail($pro_id);

        $projectIncomes = ProjectFsGeneralIncome::where('project_id',$pro_id)->get();
        $projectFsGeneralAdministrativeExpenses = ProjectFsGeneralAdministrativeExpenses::where('project_id', $pro_id)->first();
        if($projectFsGeneralAdministrativeExpenses->type == "custom"){
            $projectFsGeneralAdministrativeExpensesDetails = ProjectFsGeneralAdministrativeExpensesDetails::where('gae_id', $projectFsGeneralAdministrativeExpenses->id)->get();

        }else{
            $projectFsGeneralAdministrativeExpensesDetails = ProjectFsGeneralAdministrativeExpensesDetails::where('gae_id', 0)->get();
        }
        $e = ProjectFsGeneralAdministrativeExpensesDetails::where('gae_id', $projectFsGeneralAdministrativeExpenses->id)->get();
        $projectFsGeneralExpensesIncrementals = ProjectFsGeneralExpensesIncrementals::where('project_id', $pro_id)->first();
        $projectFsGeneralExpensesIncrementalsDetails = ProjectFsGeneralExpensesIncrementalsDetails::where('general_expenses_id',$projectFsGeneralExpensesIncrementals->id)->get();
        $AdministExpen = AdministExpen::get();
        $projectFsRent = ProjectFsRent::where('project_id',$pro_id)->first();
        if($projectFsRent->type == "custom"){
            $projectFsRentDetails = ProjectFsRentDetails::where('rent_id',$projectFsRent->id)->get();
        }else{
            $projectFsRentDetails =null;
        }
        $utilities = ProjectFsUtilities::where('project_id', $pro_id)->first();
        if($utilities->type == "custom"){
        $utilities_details = ProjectFsUtilitiesDetails::where('utilities_id',$utilities->id)->get();
    }else{
        $utilities_details =null;
    }
    $projectFsUtilitiesIncrementals = ProjectFsUtilitiesIncrementals::where('project_id', $pro_id)->first();
    if($projectFsUtilitiesIncrementals != null){
    $projectFsUtilitiesIncrementalsDetails = ProjectFsUtilitiesIncrementalsDetails::where('utilities_id',$projectFsUtilitiesIncrementals->id)->get();
     }else{
        $projectFsUtilitiesIncrementalsDetails = ProjectFsUtilitiesIncrementalsDetails::where('utilities_id',0)->get();
     }
    // dd($projectFsUtilitiesIncrementalsDetails);
     $projectFsSellingAndMarketingCost =ProjectFsSellingAndMarketingCost::where('project_id', $pro_id)->first();
     $projectFsOtherExpenses = ProjectFsOtherExpenses::where('project_id' , $pro_id)->get();
     $projectFsOtherExpensesIncrementals = ProjectFsOtherExpensesIncrementals::where('project_id', $pro_id)->first();
     $projectFsOtherExpensesIncrementalsDetails = ProjectFsOtherExpensesIncrementalsDetails::where('project_id' , $pro_id)->get();

   //  dd($projectFsOtherExpensesIncrementalsDetails);
     return view('admin.forms.generalAdministrativeExpenses',compact('project','projectIncomes',
        'AdministExpen','projectFsGeneralAdministrativeExpenses','projectFsRent','utilities_details',
        'projectFsRentDetails','projectFsUtilitiesIncrementalsDetails','projectFsUtilitiesIncrementals',
        'projectFsSellingAndMarketingCost','projectFsOtherExpenses','projectFsOtherExpensesIncrementals',
        'projectFsOtherExpensesIncrementalsDetails','projectFsGeneralAdministrativeExpensesDetails',
    'projectFsGeneralExpensesIncrementalsDetails','projectFsGeneralExpensesIncrementals'));
    }
}
