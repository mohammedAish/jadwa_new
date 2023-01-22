<?php

namespace App\Http\Controllers;

use App\Models\admin\Project;
use App\Models\ProjectExpGeneralIncome;
use App\Models\ProjectExpGeneralIncomeIncremental;
use App\Models\ProjectExpGeneralIncomeIncrementalDetail;
use App\Models\ProjectFsGeneralIncome;
use DateTime;
use Illuminate\Http\Request;
use PDO;

class ProjectExpGeneralIncomeController extends Controller
{
    public function project_exp_general_income_store(Request $request,$pro_id)
    {

        $data=$request->all();
       // dd($data);
        $del_val = 'أخري';

        // if (($key = array_search($del_val, $data['item'])) !== false) {
        //     unset($data['item'][$key]);
        // }


$items =[];
        foreach ($data['item'] as $key => $item){
            if($item !== 'أخري'){
                array_push($items, $item);
              }

        }
        // dd($data);
        //dd($request->item[2]);
        // $data= $request->except(['item.2']);
        // $request->validate([
        //     'items.*' => 'required',
        //     'value.*' => 'required',
        //     'quantity.*' => 'required',
        // ]);
        // $data = $request->only([
        //     'item','value','quantity','expensis_type',
        // ]);

       // dd($items);
             $projectExpGeneralIncome = ProjectExpGeneralIncome::select('id')->get()->toArray();
             $count_projectExpGeneralIncome= count($projectExpGeneralIncome);
            // dd($count_projectExpGeneralIncome);
             //$result = ProjectExpGeneralIncome::where('project_id',$pro_id)->delete();
          //  dd($projectExpGeneralIncome);

           // $item_id = $projectExpGeneralIncome->id;

            //$item = $request->get('item');
           // dd($item);
           //array_push($items, $item);
           $item_id = $request->get('item_id');
           //dd($item_id);
            $value = $request->get('value');
            //dd($value);
            $quantity = $request->get('quantity');
            $expensis_type = $request->get('expensis_type');
            //dd($expensis_type);
                 $count_items = count($items);
                // dd($count_items);
                 for($i = 0; $i<$count_items; $i++)
                 {
                  //  dd($projectExpGeneralIncome[$i]['id']);
                    $fsIncome= ProjectFsGeneralIncome::where('item',$items[$i])->first();
                    if($fsIncome != null){
                       $fsIncomee =$fsIncome->id;
                    }else{
                        $fsIncomee =0;
                    }
                    if(($count_projectExpGeneralIncome !=0) &&($item_id[$i] != 0)){

                        ProjectExpGeneralIncome::query()->updateOrCreate([
                            'id'   => $projectExpGeneralIncome[$i]['id'],
                        ],[
                            'project_id' => $pro_id,
                        'item' => $items[$i] ,
                        'value' => $value[$i] ,
                        'quantity' => $quantity[$i] ,
                        'expensis_type' => $expensis_type[$i] ,
                        'fsIncome_id' => $fsIncomee,

                                 ]);
                            }else{
                                ProjectExpGeneralIncome::create([
                                                'project_id' => $pro_id,
                                                 'item' => $items[$i] ,
                                                'value' => $value[$i] ,
                                                'quantity' => 0 ,
                                                'expensis_type' => $expensis_type[$i] ,
                                                'fsIncome_id' => $fsIncomee,
                                                                        ]);

                            };
                 }





        // foreach ($items as $key => $val ){
        //     $fsIncome= ProjectFsGeneralIncome::where('item',$val)->first();
        //     if($fsIncome != null){
        //        $fsIncomee =$fsIncome->id;
        //     }else{
        //         $fsIncomee =0;
        //     }
        //     if (!is_null($item)){
        //         ProjectExpGeneralIncome::query()->create([
        //             'project_id' => $pro_id,
        //             'item' => $val,
        //             'value' => $data['value'][$key],
        //             'quantity' => $data['quantity'][$key],
        //             'expensis_type' =>$data['expensis_type'][$key],
        //             'fsIncome_id' => $fsIncomee,

        //         ]);
        //     }

        // }

        return response()->json(['message'=>'success','success'=>'تم تخزين البيانات بنجاح']);

    }
    public function project_exp_general_income_icremental_total_revenue($pro_id)
    {
        $project = Project::where('id',$pro_id)->first();

        $projectStartDate = new DateTime($project->start_date);

        $operationDate = date('Y-m-d', strtotime("+".$project->development_duration." months", strtotime($project->start_date)));

       //$operationDate = new DateTime($operationDate);
       //$year= $operationDate->format('Y');

       $yearEnd = date('Y-m-d', strtotime('12/31'));
       $yearCurrent = date('Y', strtotime('12/31'));

       $datediff = strtotime($yearEnd) - strtotime($operationDate);
       $remainingDays =  round($datediff / (60 * 60 * 24));

       $remainingmonths =  round($datediff / (60 * 60 * 24*30));
       $remainingFromYear =  $remainingmonths/12;

       $dataFs = ProjectFsGeneralIncome::query()->where('project_id',$pro_id)->get();
        $totleIncomeMounthFS =0;
        $totleIncomeToEndYearFS=0;
        $totleIncomeYearFS=0;
       foreach($dataFs as $dataaFS){
           $totleIncomeMounthFS += ($dataaFS->value * $dataaFS->quantity);
           $totleIncomeToEndYearFS += ($dataaFS->value * $dataaFS->quantity) * $remainingmonths;
           $totleIncomeYearFS += ($dataaFS->value * $dataaFS->quantity) * 12;

       };

         $data = ProjectExpGeneralIncome::with('fsIncome')->where('project_id',$pro_id)->get();
         $totleIncomeMounth =0;
         $totleIncomeToEndYear=0;
         $totleIncomeYear=0;
         $expValeEN=0;
         $expValeY=0;
        foreach($data as $dataa){

            $dataa->quantity = ($dataa->quantity==0)?1:$dataa->quantity;

                        if($dataa->expensis_type =='0'){
                            $expVale = $dataa->value  ;
                        } if($dataa->expensis_type =='1'){
                            $fsIncome=ProjectFsGeneralIncome::where('id',$dataa->fsIncome_id)->first();
                            $expVale=($dataa->value)* ($fsIncome->value/100) ;
                        }
                        if($dataa->expensis_type =='2'){
                            $expVale=($dataa->value/100) *$totleIncomeMounthFS ;
                            $expValeEN=($dataa->value/100) *$totleIncomeToEndYearFS ;
                            $expValeY=($dataa->value/100) *$totleIncomeYearFS ;
                        }
                       // dd($expValeEN);


            $totleIncomeMounth += $dataa->quantity * $expVale;
            $totleIncomeToEndYear = ($totleIncomeMounth * $remainingmonths) ;
            $totleIncomeYear = ($totleIncomeMounth  * 12);

        };


        $rojectExpGeneralIncomeIncremental = ProjectExpGeneralIncomeIncremental::where('project_id',$pro_id)->first();
        $projectExpGeneralIncomeIncrementalDetail =ProjectExpGeneralIncomeIncrementalDetail::where('project_exp_income_incremental_id',$rojectExpGeneralIncomeIncremental->id)->get()->toArray();
       $prev=$totleIncomeYear;
       $totleIncomeAvaragee=0;
       $totleIncomee=0;
       $IncomeAvargePersent=0;
        foreach($projectExpGeneralIncomeIncrementalDetail as $item =>$val){
            $IncomeAvargePersent +=$val['incremental'];

                $totleYear[$val['year']]=
                ( (($val['incremental']/100 ) +1)) * $prev ;


            $prev =$totleYear[$val['year']];

        }
       // dd($totleYear);

      $totleIncomee=  array_sum($totleYear) +$totleIncomeToEndYear;
      //dd($totleIncomee);

      $totleIncomeAvaragee =$totleIncomee/(5+$remainingFromYear);
      $IncomeAvargePersent = $IncomeAvargePersent /5;


        $projectFsYear =ProjectExpGeneralIncomeIncrementalDetail::where('project_exp_income_incremental_id',$rojectExpGeneralIncomeIncremental->id)->get(['year'])->toArray();;
        return response()->json(['message'=>'success','totleYear'=>$totleYear,'yearCurrent'=>$yearCurrent,
        'totleIncomeToEndYear'=>$totleIncomeToEndYear,'totleIncomee'=>$totleIncomee,
        'totleIncomeAvaragee'=>$totleIncomeAvaragee,
        'IncomeAvargePersent'=>$IncomeAvargePersent,'success'=>'تم تخزين البيانات بنجاح']);

       // $data = ProjectFsGeneralIncome::query()->where('project_id',1)->with('increments')->get();
    }
}
