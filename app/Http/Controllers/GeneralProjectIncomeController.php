<?php

namespace App\Http\Controllers;

use App\Models\admin\Project;
use App\Models\GeneralProjectIncome;
use App\Models\GeneralProjectIncomeIncremental;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;

class GeneralProjectIncomeController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
    }

    public function value_incremental_store(Request $request){
        $projects =Project::where('id',1)->first();
        $data = $request->only([
            'year' , 'value_incremental'
         ]);
        foreach ($data['year'] as $key => $year){

                        GeneralProjectIncomeIncremental::query()->create([
                            'project_id' => 1,
                            'year' => $year,
                            'income_value' => $data['value_incremental'][$key],
                        ]);

                    }
            //        $data = GeneralProjectIncomeIncremental::query()->where('project_id',1)->with('income')->orderBy('year')->get();
                    $data = GeneralProjectIncome::query()->where('project_id',1)->get();
        $data =$request->all();
        $values = GeneralProjectIncome::where('project_id',1)->get();
        dd($values);
        $values->update($data);

    }
    public function store(Request $request)
    {

dd('hi');
        $request->validate([
            'items.*' => 'required',
            'value.*' => 'required',
            'quantity.*' => 'required',
        ]);
        $data = $request->only([
            'item','value','quantity',
        ]);

        $result = GeneralProjectIncome::where('project_id',1)->delete();

        foreach ($data['item'] as $key => $item){
            if (!is_null($item)){
                GeneralProjectIncome::query()->create([
                    'project_id' => 1,
                    'item' => $data['item'][$key],
                    'value' => $data['value'][$key],
                    'quantity' => $data['quantity'][$key],

                ]);
            }

        }

        $result = GeneralProjectIncome::query()->where('project_id',1)->get();
        return response()->json(['message'=>'success','data'=>$result,'success'=>'تم تخزين البيانات بنجاح']);

    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }

    public function general_project_income_store_incremental(Request $request)
    {

        $request->validate([
            'year.*' => 'required',
            'id.*' => 'required',
            'value_incremental.*' => 'required',
            'quantity_incremental.*' => 'required',
        ]);

        $data = $request->only([
           'year' , 'id' , 'value_incremental','main_id'
        ]);
        foreach ($data['year'] as $key => $year){
//            echo 'ID : ' . $data['id'][$key] . ' : ' . $year . ' : ' . $data['incremental'][$key] . '<br>';

            GeneralProjectIncomeIncremental::query()->create([
                'project_id' => 1,
                'item_id' => $data['id'][$key],
                'year' => $year,
                'income_value' => $data['value_incremental'][$key],
            ]);

        }
//        $data = GeneralProjectIncomeIncremental::query()->where('project_id',1)->with('income')->orderBy('year')->get();
        $data = GeneralProjectIncome::query()->where('project_id',1)->get();


        return response()->json(['message'=>'success','data'=>$data,'success'=>'تم تخزين البيانات بنجاح']);


    }

    public function general_project_income_incremental()
    {

        $data = GeneralProjectIncomeIncremental::query()->where('project_id',1)->with('income')->orderBy('year')->get();

        return response()->json([
            'message'=>'success',
            'data'=>$data,
            'success'=>'تم تخزين البيانات بنجاح'
        ]);

    }

    public function total_revenue()
    {
        $data = GeneralProjectIncome::query()->where('project_id',1)->with('increments')->get();

        $value_result = array();
        $quantity_result = array();
        $year_total = array();
//        dd($data);

        $prev_value = 0;
        $prev_quantity = 0;
        foreach ($data as $item)
        {
//            echo $item->item . ':' .'<br>';
            foreach ($item->increments as $key => $value){
//                echo $value->year . ':' . '<br>';
                if ($key == 0){
                    $value_result[$item->item][$value->year] = $item->value * (1 + ($value->income_value/100));
                    $quantity_result[$item->item][$value->year] = $item->quantity * (1 + ($value->quantity_value/100));
                }else{
                    $value_result[$item->item][$value->year] = $prev_value * (1 + ($value->income_value/100));
                    $quantity_result[$item->item][$value->year] = $prev_quantity * (1 + ($value->quantity_value/100));
                }
                $prev_value = $value_result[$item->item][$value->year];
                $prev_quantity = $quantity_result[$item->item][$value->year];
//                echo 'value ' .' : ' . $value_result[$item->item][$value->year] . '<br>';
//                echo 'quantity ' .': ' . $quantity_result[$item->item][$value->year] . '<br>';
//                echo 'total ' .': ' . $quantity_result[$item->item][$value->year] *  $value_result[$item->item][$value->year] . '<br>';
                if (!array_key_exists($value->year,$year_total)){
                    $year_total[$value->year] = $quantity_result[$item->item][$value->year] *  $value_result[$item->item][$value->year] * 12;
                }else{
                    $year_total[$value->year] = $year_total[$value->year] + $quantity_result[$item->item][$value->year] *  $value_result[$item->item][$value->year] * 12;
                }
            }
//            echo "****************************************"  . '<br>';
        }

        return response()->json(['message'=>'success','data'=>$year_total]);

//
//        foreach ($year_total as $key => $item){
//            echo $key . ' : ' . number_format($item,2) . '<br>';
//        }
    }
}


