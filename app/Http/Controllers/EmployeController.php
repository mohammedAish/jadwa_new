<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    public function index(){
        $employees = Employe::all();
        return view('admin.employes.employes',compact('employees'));
    }
    public function store(Request $request){

        $request->validate([
            'job.*' => 'required',
            'quantity.*' => 'required',
            'annual_salary.*' => 'required',
            'value_incremental.*' => 'required',
        ]);
        $data = $request->only([
            'job','annual_salary','quantity','value_incremental',
        ]);

        $result = Employe::where('project_id',1)->delete();
        foreach ($data['job'] as $key => $item){
            if (!is_null($item)){
                Employe::query()->create([
                    'project_id' => '1',
                    'job' => $data['job'][$key],
                    'annual_salary' => $data['annual_salary'][$key],
                    'quantity' => $data['quantity'][$key],
                    'value_incremental' => $data['value_incremental'][$key],

                ]);
            }

        }
        $result = Employe::where('project_id',1)->get();
        return response()->json(['message'=>'success','data'=>$result,'success'=>'تم تخزين  النسبة البيانات بنجاح']);

    }

}
