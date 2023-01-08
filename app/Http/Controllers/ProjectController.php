<?php

namespace App\Http\Controllers;

use App\Models\admin\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\ProjectType;
use App\Models\SystemServices;
use App\Models\User;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{

    public function index()
    {
        if(Auth::user()->type == "admin"){
        $projects = Project::query()->latest()->paginate(1);
        }else{
        $projects = Project::where('owner_id' , Auth::user()->id)->latest()->paginate(1);
        }

        return view('admin.projects.index',compact('projects'));
    }

    public function create()
    {
        $user=User::where('type','client')->get();
        $protype = ProjectType::where('status' ,'active')->get();

        return view('admin.projects.create',compact('user' , 'protype'));
    }

    public function store_project(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255|string',
            'idea' => 'required|min:3|max:255|string',
        ], [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل يجب ان يحتوي على نص',
            'max' => 'هذا الحقل طويل للفاية',
            'min' => 'هذا الحقل قصير للغاية',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $user_id = auth()->user()->id;
            $data = $request->all();
            $data['created_by'] = $user_id;

            if ($request->file('logo')) {
                $file = $request->file('logo');
                $filename = $file->getClientOriginalName();
                $file->move(public_path('public/logo'), $filename);
                $data['logo'] = $filename;
            }
            $project = Project::create([
                'name' => $data['name'],
                'idea' => $data['idea'],
                'project_type_id' => 1,
                'owner_id' => 1,
                'created_by' => 1,
                'logo' => $data['logo'],
                'language' => 'en',
                'country' => 1,
                'city' => 1,
                'start_date' => '2022-10-27',
                'development_duration' => 1,
                'number_days_year' => 1,
                'vat' => 1,
                'currency' => 1,

            ]);

            return response()->json(['status' => 1, 'msg' => 'New Student has been successfully registered' , 'id' => $project->id]);
        }
    }
    public function store_project_details(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'project_type_id' => 'required|exists:project_types,id',
            'study_duration' => 'required|numeric',
            'language' => 'required',
            'currency' => 'required',
            'start_date' => 'required|date',
            'development_duration' => 'required|numeric',
            'vat' => 'required|numeric',
            'number_days_year' => 'required|numeric',
        ], [
            'required' => 'هذا الحقل مطلوب',
            'string' => 'هذا الحقل يجب ان يحتوي على نص',
            'max' => 'هذا الحقل طويل للفاية',
            'min' => 'هذا الحقل قصير للغاية',
            'numeric' => 'هذا الحقل  يجب ان يحتوي على رقم',
            'date' => 'هذا الحقل  يجب ان يحتوي على تاريخ',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
        $project = Project::where('id', $request->project_id)->first();

        $project->update([
            // 'project_type_id' => $request->vat,
            'id' => $request->project_id,
            'study_duration' => $request->study_duration,
            'language'  => $request->language,
            'currency'  => $request->currency,
            'start_date'  => $request->start_date,
            'development_duration'  => $request->development_duration,
            'vat'   => $request->vat,
            'number_days_year'  => $request->number_days_year,
            'revenu_entry'=>$request->revenu_entry,


        ]);
        return response()->json(['status' => 1, 'success' => 'تم اضافة المشروع بنجاح' ]);
        }
    }

    public function store(StoreProjectRequest $request)
    {

        $user_id = auth()->user()->id;
        $data =$request->validated();
        $data['created_by'] = $user_id;

        if($request->file('logo')){
            $file= $request->file('logo');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('public/logo'), $filename);
            $data['logo']= $filename;
        }

          $project = Project::create($data);
               $project->save();
           return redirect()->route('projects.index');
        }


    public function show(Project $project)
    {
    //    $dates= $project->development_duration+$project->start_date;
    $projectStartDate = new DateTime($project->start_date);

    $operationDate = date('Y-m-d', strtotime("+".$project->development_duration." months", strtotime($project->start_date)));

   //$operationDate = new DateTime($operationDate);
   $year= date('Y', strtotime($operationDate));


   $yearEnd = date('Y-m-d', strtotime('12/31/'.$year));
   $datediff = strtotime($yearEnd) - strtotime($operationDate);

   $remainingDays =  round($datediff / (60 * 60 * 24));

   $remainingmonths =  round($datediff / (60 * 60 * 24*30));


  // $numofmonth = $remainingmonths->format('m');
// dd(  $numofmonth);
        $services = SystemServices::where('status','active')->get();

       return view('admin.projects.show',compact('project','services','operationDate','year','remainingDays','remainingmonths'));
    }


    public function edit(Project $project)
    {
        $projectType = ProjectType::where('status' ,'active')->get();
        $user=User::where('type','client')->get();

        return view('admin.projects.edit', compact('project','projectType','user'));

    }


    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->all();
        $project = Project::query()->findOrFail($project->id);
        $data['logo'] = $project->logo;
        if($request->hasFile('logo')){
            $file= $request->file('logo');
            $filename= $file->getClientOriginalName();
            $file->move(public_path('public/logo'), $filename);
            $data['logo']= $filename;
        }
           $project->update($data);
            return redirect()->route('projects.index')->with('success', 'تم التعديل على بيانات المشروع بنجاح');


    }


    public function destroy(Request $request)
    {
        $project = Project::findOrFail($request->id);
        $project->delete();
        return response()->json(true, 200);
    }

public function search_project(Request $request){

    $search = $request->get('query', false);
    $projects = Project::query()->where(function ($query) use ($search) {
        $query->where('name', 'like', '%' . $search . '%');

    })->latest()->paginate(2);

    return view('admin.projects.index',compact('projects'));

}
}



