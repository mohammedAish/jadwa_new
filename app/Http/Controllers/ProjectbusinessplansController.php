<?php

namespace App\Http\Controllers;

use App\Models\admin\Project;
use App\Models\ProjectBpChannelResource;
use App\Models\ProjectBpDetails;
use App\Models\ProjectBusinessPlan;
use App\Models\ProjectCompatitor;
use App\Models\ProjectProductDetail;
use App\Models\ProjectTargetMarket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProjectbusinessplansController extends Controller
{


    public function index()
    {
        //
    }



    public function create($id)
    {
        $user = Auth::user();
        $sale_channels = ProjectBpChannelResource::query()->where('type' , 'sale_channel' )->get();
        $marketing_channels = ProjectBpChannelResource::query()->where('type' , 'marketing_channel')->get();
        $income_sources = ProjectBpChannelResource::query()->where('type' , 'income_sources' )->get();
        $expensis_modal = ProjectBpChannelResource::query()->where('type' , 'expensis_modal' )->get();
        $main_activity = ProjectBpChannelResource::query()->where('type' , 'main_activity' )->get();
        $project = Project::where('id' , $id)->first();
        return view('admin.projectsplane.create', [
            'id' => $id,
            'project' => $project,
            'user' => $user,
            'sale_channels' => $sale_channels,
            'marketing_channels' => $marketing_channels,
            'income_sources' => $income_sources,
            'expensis_modal' => $expensis_modal,
            'main_activity' => $main_activity,
        ]);
    }



    public function store(Request $request)
    {
    }


    public function store_problems_solutions(Request $request)
    {
        //    $validator = $request->validate([
        //         'title' => 'required|min:3|max:255|string',
        //         // 'project_id' => 'required|exists:project,id',
        //     ],[
        //         'required' => 'هذا الحقل مطلوب',
        //         'string' => 'هذا الحقل يجب ان يحتوي على نص',
        //         'max' => 'هذا الحقل طويل للفاية',
        //         'min' => 'هذا الحقل قصير للغاية',
        //     ]);
        $validator = Validator::make($request->all(), [
            'problems.*' => 'required',
            'solutions.*' => 'required',
        ], [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل يجب ان يحتوي على نص',
            'max' => 'هذا الحقل طويل للفاية',
            'min' => 'هذا الحقل قصير للغاية',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            foreach ($request->problems as $key => $value) {
                ProjectBusinessPlan::create([
                    'title' => $value,
                    'project_id' => 2,
                    'type' => 'المشكلات',
                ]);
            }
            foreach ($request->solutions as $key => $value) {
                ProjectBusinessPlan::create([
                    'title' => $value,
                    'project_id' => 2,
                    'type' => 'الحلول',
                ]);
            }
            return response()->json(['status' => 1, 'success' => 'تمت الاضافة بنجاح']);
        }
    }

    public function store_details_market(Request $request)
    {
        // $request->validate([
        //     'suggested_value' => 'required|min:3|max:255|string',
        //     'target_customer' => 'required|min:3|max:255|string',
        //     'value_tam' => 'required|numeric',
        //     'value_sam' => 'required|numeric',
        //     'value_som' => 'required|numeric',
        //     'project_id' => 'required|exists:project,id',
        // ],[
        //     'required' => 'هذا الحقل مطلوب',
        //     'string' => 'هذا الحقل يجب ان يحتوي على نص',
        //     'max' => 'هذا الحقل طويل للفاية',
        //     'min' => 'هذا الحقل قصير للغاية',
        // ]);
        $validator = Validator::make($request->all(), [
            'suggested_value' => 'required|min:3|max:255|string',
            'target_customer' => 'required|min:3|max:255|string',
            'value_tam' => 'required|numeric',
            'value_sam' => 'required|numeric',
            'value_som' => 'required|numeric',
            // 'project_id' => 'required|exists:project,id',
        ], [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل يجب ان يحتوي على نص',
            'max' => 'هذا الحقل طويل للفاية',
            'min' => 'هذا الحقل قصير للغاية',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            ProjectBpDetails::create([
                'project_id' => 2,
                'suggested_value' => $request->suggested_value,
                'target_customer' => $request->target_customer,
                'vision' => 'none',
                'message' => 'none',

            ]);
            ProjectTargetMarket::create([
                'project_id' => 2,
                'value_tam' =>  $request->value_tam,
                'value_sam' => $request->value_sam,
                'value_som' => $request->value_som,
                'tam' => 'none' ,
                'sam' => 'none',
                'som' => 'none',
            ]);
            return response()->json(['status' => 1, 'msg' => 'New Student has been successfully registered']);
        }
    }

    public function store_sales_marketing_channels(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sales_channels.*' => 'required',
            'marketing_channels.*' => 'required',
        ], [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل يجب ان يحتوي على نص',
            'max' => 'هذا الحقل طويل للفاية',
            'min' => 'هذا الحقل قصير للغاية',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            foreach ($request->sales_channels as $key => $value) {
                ProjectBusinessPlan::create([
                    'title' => $value,
                    'project_id' => 2,
                    'type' => 'قنوات البيع',
                ]);
            }
            foreach ($request->marketing_channels as $key => $value) {
                ProjectBusinessPlan::create([
                    'title' => $value,
                    'project_id' => 2,
                    'type' => 'قنوات التسويق',
                ]);
            }
            return response()->json(['status' => 1, 'msg' => 'New Student has been successfully registered']);
        }
    }

    public function store_compatitor(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'compatitor_vector1' => 'required|min:3|max:255|string',
            'compatitor_vector2' => 'required|min:3|max:255|string',
            'compatitor1' => 'required|min:2|max:255|string',
            'compatitor2' => 'required|min:2|max:255|string',
            'compatitor3' => 'required|min:2|max:255|string',
            'compatitor4' => 'required|min:2|max:255|string',
            // 'project_id' => 'required|exists:project,id',
        ], [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل يجب ان يحتوي على نص',
            'max' => 'هذا الحقل طويل للفاية',
            'min' => 'هذا الحقل قصير للغاية',
        ]);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            ProjectCompatitor::create([
                'project_id' => 2,
                'compatitor_vector1' =>  $request->compatitor_vector1,
                'compatitor_vector2' =>  $request->compatitor_vector2,
                'compatitor1' => $request->compatitor1,
                'compatitor2' => $request->compatitor2,
                'compatitor3' => $request->compatitor3,
                'compatitor4' => $request->compatitor4,
            ]);
            return response()->json(['status' => 1, 'msg' => 'New Student has been successfully registered']);
        }
    }

    public function store_vision_message_goals(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'vision' => 'required|min:3|max:255|string',
            'message' => 'required|min:3|max:255|string',
            'goals.*' => 'required|min:3|max:255|string',
            // 'project_id' => 'required|exists:project,id',
        ], [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل يجب ان يحتوي على نص',
            'max' => 'هذا الحقل طويل للفاية',
            'min' => 'هذا الحقل قصير للغاية',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            ProjectBpDetails::where('project_id', '2')->update([
                'vision' => $request->vision,
                'message' => $request->message,
            ]);
            foreach ($request->goals as $key => $value) {
                ProjectBusinessPlan::create([
                    'title' => $value,
                    'project_id' => 2,
                    'type' => 'الأهداف',
                ]);
            }
            return response()->json(['status' => 1, 'msg' => 'New Student has been successfully registered']);
        }
    }

    public function store_revenue_cost(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'income_sources.*' => 'required',
            'expensis_modal.*' => 'required',
            'main_activity.*' => 'required',
            // 'project_id' => 'required|exists:project,id',
        ], [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل يجب ان يحتوي على نص',
            'max' => 'هذا الحقل طويل للفاية',
            'min' => 'هذا الحقل قصير للغاية',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            foreach ($request->income_sources as $key => $value) {
                ProjectBusinessPlan::create([
                    'title' => $value,
                    'project_id' => 2,
                    'type' => 'مصادر الايرادات',
                ]);
            }

            foreach ($request->expensis_modal as $key => $value) {
                ProjectBusinessPlan::create([
                    'title' => $value,
                    'project_id' => 2,
                    'type' => 'هيكل التكاليف',
                ]);
            }
            foreach ($request->main_activity as $key => $value) {
                ProjectBusinessPlan::create([
                    'title' => $value,
                    'project_id' => 2,
                    'type' => 'الانشطة الرئيسية',
                ]);
            }
            return response()->json(['status' => 1, 'msg' => 'New Student has been successfully registered']);
        }
    }

    public function store_users_details(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255|string',
            'email' => 'required|min:3|max:255|string',
            'phone' => 'required|min:3|max:255|string',
            'whatsapp' => 'string',
            'linkedin' => 'string',

        ], [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل يجب ان يحتوي على نص',
            'max' => 'هذا الحقل طويل للفاية',
            'min' => 'هذا الحقل قصير للغاية',
        ]);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            User::where('id', Auth::user()->id)->update([
                'name' =>  $request->name,
                'email' =>  $request->email,
                'phone' => $request->phone,
                'whatsapp' => $request->whatsapp,
                'linkedin' => $request->linkedin,
            ]);
            return response()->json(['status' => 1, 'msg' => 'New Student has been successfully registered']);
        }
    }

    public function store_service_name_description(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255|string',
            'details' => 'required|min:3|max:255|string',
        ], [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل يجب ان يحتوي على نص',
            'max' => 'هذا الحقل طويل للفاية',
            'min' => 'هذا الحقل قصير للغاية',
        ]);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
        ProjectProductDetail::create([
                    'name' => $request->name,
                    'details' => $request->details,
                    'project_id' => 2,
                ]);


            return response()->json(['status' => 1, 'msg' => 'New Student has been successfully registered']);
        }
    }

    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
