<?php

namespace App\Http\Controllers;

use App\Models\admin\Project;
use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index($id){
        $project = Project::where('id',$id)->first();
        $employees = Employe::all();
        return view('admin.employes.employes',compact('employees','project'));
    }
    public function store(Request $request,$pro_id){

        $request->validate([
            'job.*' => 'required',
            'quantity.*' => 'required',
            'annual_salary.*' => 'required',
            'value_incremental.*' => 'required',
        ]);
        $data = $request->only([
            'job','annual_salary','quantity','value_incremental',
        ]);

       // dd($request->all());
        //$result = Employe::where('project_id',$pro_id)->delete();
        $job = $request->get('job');
        $item_id = $request->get('item_id');
        $annual_salary = $request->get('annual_salary');
        $quantity = $request->get('quantity');
        $value_incremental = $request->get('value_incremental');
             $count_items = count($job);
            // dd($count_items);
             for($i = 0; $i<$count_items; $i++)
             {
                if($item_id[$i] != 0){
                    Employe::whereId($item_id[$i])->update([
                    'job' => $job[$i] ,
                    'annual_salary' => $annual_salary[$i] ,
                    'quantity' => $quantity[$i] ,
                    'value_incremental' => $value_incremental[$i] ,

                             ]);
                        }else{
                            Employe::create([
                        'project_id' => $pro_id,
                         'job' => $job[$i] ,
                        'annual_salary' => $annual_salary[$i] ,
                        'quantity' => $quantity[$i] ,
                       'value_incremental' => $value_incremental[$i] ,
                                 ]);

                        };
             }
        // foreach ($data['job'] as $key => $item){
        //     if (!is_null($item)){
        //         Employe::query()->create([
        //             'project_id' => $pro_id,
        //             'job' => $data['job'][$key],
        //             'annual_salary' => $data['annual_salary'][$key],
        //             'quantity' => $data['quantity'][$key],
        //             'value_incremental' => $data['value_incremental'][$key],

        //         ]);
        //     }

        // }
        $result = Employe::where('project_id',$pro_id)->get();
        return response()->json(['message'=>'success','data'=>$result,'success'=>'تم تخزين  النسبة البيانات بنجاح']);

    }

}
