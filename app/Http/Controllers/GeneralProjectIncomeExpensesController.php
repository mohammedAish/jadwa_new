<?php

namespace App\Http\Controllers;

use App\Models\GeneralProjectIncomeExpenses;
use App\Models\GeneralProjectIncomeExpensesIncremental;
use Illuminate\Http\Request;

class GeneralProjectIncomeExpensesController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            'items.*' => 'required',
            'value.*' => 'required',
            'quantity.*' => 'required',
        ]);
        $data = $request->only([
            'item','value','quantity','value_incremental','quantity_incremental'
        ]);
        foreach ($data['item'] as $key => $item){
            if (!is_null($item)){
                GeneralProjectIncomeExpenses::query()->create([
                    'project_id' => 1,
                    'item' => $data['item'][$key],
                    'value' => $data['value'][$key],
                    'quantity' => $data['quantity'][$key],
                    'value_incremental' => $data['value_incremental'][$key],
                    'quantity_incremental' => $data['quantity_incremental'][$key],
                ]);
            }

        }
        $result = GeneralProjectIncomeExpenses::query()->where('project_id',1)->get();
        return response()->json(['message'=>'success','data'=>$result,'success'=>'تم تخزين البيانات بنجاح']);

    }

    public function show(GeneralProjectIncomeExpenses $generalProjectIncomeExpenses)
    {
    }

    public function edit(GeneralProjectIncomeExpenses $generalProjectIncomeExpenses)
    {
    }

    public function update(Request $request, GeneralProjectIncomeExpenses $generalProjectIncomeExpenses)
    {
    }

    public function destroy(GeneralProjectIncomeExpenses $generalProjectIncomeExpenses)
    {
    }

    public function general_project_income_expenses_store_incremental(Request $request)
    {

        $request->validate([
            'year.*' => 'required',
            'id.*' => 'required',
            'value_incremental.*' => 'required',
            'quantity_incremental.*' => 'required',
        ]);

        $data = $request->only([
            'year' , 'id' , 'value_incremental','quantity_incremental','main_id'
        ]);
        foreach ($data['year'] as $key => $year){

            GeneralProjectIncomeExpensesIncremental::query()->create([
                'project_id' => 1,
                'item_id' => $data['id'][$key],
                'year' => $year,
                'income_value' => $data['value_incremental'][$key],
                'quantity_value' => $data['quantity_incremental'][$key],
            ]);

        }
//        $data = GeneralProjectIncomeExpensesIncremental::query()->where('project_id',1)->with('income')->orderBy('year')->get();
        $data = GeneralProjectIncomeExpenses::query()->where('project_id',1)->get();


        return response()->json(['message'=>'success','data'=>$data,'success'=>'تم تخزين البيانات بنجاح']);


    }

    public function general_project_expenses_incremental()
    {

        $data = GeneralProjectIncomeExpensesIncremental::query()->where('project_id',1)->with('income')->orderBy('year')->get();

        return response()->json([
            'message'=>'success',
            'data'=>$data,
            'success'=>'تم تخزين البيانات بنجاح'
        ]);

    }

    public function total_expenses()
    {
        $data = GeneralProjectIncomeExpenses::query()->where('project_id',1)->with('increments')->get();

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


//        foreach ($year_total as $key => $item){
//            echo $item . '<br>';
//        }
    }




}
