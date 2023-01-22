<?php

namespace App\Http\Controllers;

use App\Models\admin\Project;
use App\Models\AdministExpen;
use App\Models\FeasibilityStudy;
use App\Models\GeneralProjectIncome;
use App\Models\ProjectBpChannelResource;
use App\Models\ProjectFsGeneralIncome;
use App\Models\ProjectProductDetail;
use Illuminate\Http\Request;

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

        return view('admin.forms.administrators',compact('marketing_channels','income_sources','expenses_modal','main_activity','project_product_details'));

    }

    public function view_revenues($pro_id)
    {

        $project=Project::findOrFail($pro_id);

        $projectIncomes = ProjectFsGeneralIncome::where('project_id',$project->id)->get();
        return view('admin.forms.revenues',compact('project','projectIncomes'));

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

    public function generalAdministrativeExpenses()
    {
        $project=Project::findOrFail(1);

        $projectIncomes = ProjectFsGeneralIncome::where('project_id',1)->get();
        $AdministExpen = AdministExpen::get();
        return view('admin.forms.generalAdministrativeExpenses',compact('project','projectIncomes','AdministExpen'));
    }
}
