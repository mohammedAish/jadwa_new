<?php

namespace App\Http\Controllers;

use App\Models\admin\Project;
use App\Models\BalanceProjects;
use App\Models\ProjectFsGeneralIncome;
use App\Models\ProjectFsGeneralIncomeIncremental;
use App\Models\ProjectFsGeneralIncomeIncrementalDetail;
use DateTime;
use Illuminate\Http\Request;

class BalanceProjectsController extends Controller
{
    public function index($pro_id){
        $project = Project::where('id',$pro_id)->first();

        $currentYear = date('Y', strtotime('12/31'));
        $balances =BalanceProjects::where('project_id',$pro_id)->get();
        return view('admin.balance_sheet.index',compact('balances','currentYear','project'));
    }
    public function equipment_buildings_store(Request $request,$pro_id){
        $request->validate([
            'item.*' => 'required',
            'quantity.*' => 'required',
            'cost.*' => 'required',
            'depreciation.*' => 'required',
            'purchase_year.*' => 'required',
        ]);
        $data = $request->only([
            'item','quantity','cost','depreciation','purchase_year',
        ]);


        $result = BalanceProjects::where('project_id',$pro_id)->where('balance_type','equipment_buildings')->delete();
        foreach ($data['item'] as $key => $item){
            if (!is_null($item)){
                BalanceProjects::query()->create([
                    'project_id' => $pro_id,
                    'balance_type' => 'equipment_buildings',
                    'item' => $data['item'][$key],
                    'quantity' => $data['quantity'][$key],
                    'cost' => $data['cost'][$key],
                    'depreciation' => $data['depreciation'][$key],
                    'purchase_year' => $data['purchase_year'][$key],

                ]);
            }

        }
        $currentYear = date('Y', strtotime('12/31'));
              $depreciationData = array();

             $years= years($pro_id)['years'];
             array_unshift($years,$currentYear);
               $allData = BalanceProjects::where('project_id',$pro_id)->where('balance_type','equipment_buildings')->get();
               foreach($allData as $data){
                $emp1 = [$data->item];
              //  dd(count(years()['years']));
                foreach($years as $year){
                    if($year ==$data->purchase_year){
                        $yearcost=$data->quantity * $data->cost;

                        $t = array_search($year, $years);
                        for($i=$t ;$i < 6; $i++){
                            array_push($emp1, $yearcost);

                            $yearcost= $yearcost - ( $yearcost * $data->depreciation / 100);
                        };


                    }else{
                        array_push($emp1,"0");
                    }



                }
                $emp = array_slice($emp1, 0, 7);
                array_push($depreciationData,$emp);

               }

              // dd($emp1);
              $depreciationData =array_reverse($depreciationData);



        $result = BalanceProjects::where('project_id',$pro_id)->where('balance_type','equipment_buildings')->where('purchase_year','!=', $currentYear)->get();
        $dataYearCurrent = BalanceProjects::where('project_id',$pro_id)->where('balance_type','equipment_buildings')->where('purchase_year',$currentYear)->get();
  // dd($allData);
        return response()->json(['message'=>'success','data'=>$result,'dataYearCurrent'=>$dataYearCurrent,
        'allData'=>$allData,'depreciationData'=>$depreciationData,
        'success'=>'تم تخزين  النسبة البيانات بنجاح']);

    }

    public function transport_store(Request $request,$pro_id){
        $request->validate([
            'item.*' => 'required',
            'quantity.*' => 'required',
            'cost.*' => 'required',
            'depreciation.*' => 'required',
            'purchase_year.*' => 'required',
        ]);
        $data = $request->only([
            'item','quantity','cost','depreciation','purchase_year',
        ]);

        $result = BalanceProjects::where('project_id',$pro_id)->where('balance_type','transport')->delete();
        foreach ($data['item'] as $key => $item){
            if (!is_null($item)){
                BalanceProjects::query()->create([
                    'project_id' => $pro_id,
                    'balance_type' => 'transport',
                    'item' => $data['item'][$key],
                    'quantity' => $data['quantity'][$key],
                    'cost' => $data['cost'][$key],
                    'depreciation' => $data['depreciation'][$key],
                    'purchase_year' => $data['purchase_year'][$key],

                ]);
            }

        }

        $currentYear = date('Y', strtotime('12/31'));

        $depreciationData = array();

        $years= years($pro_id)['years'];
        array_unshift($years,$currentYear);
          $allData = BalanceProjects::where('project_id',$pro_id)->where('balance_type','equipment_buildings')->get();
          foreach($allData as $data){
           $emp1 = [$data->item];
         //  dd(count(years()['years']));
           foreach($years as $year){
               if($year ==$data->purchase_year){
                   $yearcost=$data->quantity * $data->cost;

                   $t = array_search($year, $years);
                   for($i=$t ;$i < 6; $i++){
                       array_push($emp1, $yearcost);

                       $yearcost= $yearcost - ( $yearcost * $data->depreciation / 100);
                   };


               }else{
                   array_push($emp1,"0");
               }



           }
           $emp = array_slice($emp1, 0, 7);
           array_push($depreciationData,$emp);

          }

         // dd($emp1);
         $depreciationData =array_reverse($depreciationData);


        $result = BalanceProjects::where('project_id',$pro_id)->where('balance_type','transport')->where('purchase_year','!=', $currentYear)->get();
        $dataYearCurrent = BalanceProjects::where('project_id',$pro_id)->where('balance_type','transport')->where('purchase_year',$currentYear)->get();

        return response()->json(['message'=>'success','data'=>$result,'dataYearCurrent'=>$dataYearCurrent,
        'depreciationData'=>$depreciationData,
        'success'=>'تم تخزين  النسبة البيانات بنجاح']);

    }
    public function equipments_store(Request $request,$pro_id){
        $request->validate([
            'item.*' => 'required',
            'quantity.*' => 'required',
            'cost.*' => 'required',
            'depreciation.*' => 'required',
            'purchase_year.*' => 'required',
        ]);
        $data = $request->only([
            'item','quantity','cost','depreciation','purchase_year',
        ]);

        $result = BalanceProjects::where('project_id',$pro_id)->where('balance_type','equipments')->delete();
        foreach ($data['item'] as $key => $item){
            if (!is_null($item)){
                BalanceProjects::query()->create([
                    'project_id' => $pro_id,
                    'balance_type' => 'equipments',
                    'item' => $data['item'][$key],
                    'quantity' => $data['quantity'][$key],
                    'cost' => $data['cost'][$key],
                    'depreciation' => $data['depreciation'][$key],
                    'purchase_year' => $data['purchase_year'][$key],

                ]);
            }

        }
        $currentYear = date('Y', strtotime('12/31'));

        $depreciationData = array();

        $years= years($pro_id)['years'];
        array_unshift($years,$currentYear);
          $allData = BalanceProjects::where('project_id',$pro_id)->where('balance_type','equipment_buildings')->get();
          foreach($allData as $data){
           $emp1 = [$data->item];
         //  dd(count(years()['years']));
           foreach($years as $year){
               if($year ==$data->purchase_year){
                   $yearcost=$data->quantity * $data->cost;

                   $t = array_search($year, $years);
                   for($i=$t ;$i < 6; $i++){
                       array_push($emp1, $yearcost);

                       $yearcost= $yearcost - ( $yearcost * $data->depreciation / 100);
                   };


               }else{
                   array_push($emp1,"0");
               }



           }
           $emp = array_slice($emp1, 0, 7);
           array_push($depreciationData,$emp);

          }

         // dd($emp1);
         $depreciationData =array_reverse($depreciationData);

        $result = BalanceProjects::where('project_id',$pro_id)->where('balance_type','equipments')->where('purchase_year','!=', $currentYear)->get();
        $dataYearCurrent = BalanceProjects::where('project_id',$pro_id)->where('balance_type','equipments')->where('purchase_year',$currentYear)->get();

        return response()->json(['message'=>'success','data'=>$result,'dataYearCurrent'=>$dataYearCurrent,
        'depreciationData'=>$depreciationData,
        'success'=>'تم تخزين  النسبة البيانات بنجاح']);

    }

    public function furniture_store(Request $request,$pro_id){
       // dd('furniture');
        $request->validate([
            'item.*' => 'required',
            'quantity.*' => 'required',
            'cost.*' => 'required',
            'depreciation.*' => 'required',
            'purchase_year.*' => 'required',
        ]);
        $data = $request->only([
            'item','quantity','cost','depreciation','purchase_year',
        ]);

        $result = BalanceProjects::where('project_id',$pro_id)->where('balance_type','furniture')->delete();
        foreach ($data['item'] as $key => $item){
            if (!is_null($item)){
                BalanceProjects::query()->create([
                    'project_id' => $pro_id,
                    'balance_type' => 'furniture',
                    'item' => $data['item'][$key],
                    'quantity' => $data['quantity'][$key],
                    'cost' => $data['cost'][$key],
                    'depreciation' => $data['depreciation'][$key],
                    'purchase_year' => $data['purchase_year'][$key],

                ]);
            }

        }
        $currentYear = date('Y', strtotime('12/31'));

        $depreciationData = array();

        $years= years($pro_id)['years'];
        array_unshift($years,$currentYear);
          $allData = BalanceProjects::where('project_id',$pro_id)->where('balance_type','equipment_buildings')->get();
          foreach($allData as $data){
           $emp1 = [$data->item];
         //  dd(count(years()['years']));
           foreach($years as $year){
               if($year ==$data->purchase_year){
                   $yearcost=$data->quantity * $data->cost;

                   $t = array_search($year, $years);
                   for($i=$t ;$i < 6; $i++){
                       array_push($emp1, $yearcost);

                       $yearcost= $yearcost - ( $yearcost * $data->depreciation / 100);
                   };


               }else{
                   array_push($emp1,"0");
               }



           }
           $emp = array_slice($emp1, 0, 7);
           array_push($depreciationData,$emp);

          }

         // dd($emp1);
         $depreciationData =array_reverse($depreciationData);

        $result = BalanceProjects::where('project_id',$pro_id)->where('balance_type','furniture')->where('purchase_year','!=', $currentYear)->get();
        $dataYearCurrent = BalanceProjects::where('project_id',$pro_id)->where('balance_type','furniture')->where('purchase_year',$currentYear)->get();

        return response()->json(['message'=>'success','data'=>$result,'dataYearCurrent'=>$dataYearCurrent,
        'depreciationData'=>$depreciationData,
        'success'=>'تم تخزين  النسبة البيانات بنجاح']);

    }
    public function intangible_assets_store(Request $request,$pro_id){
        $request->validate([
            'item.*' => 'required',
            'quantity.*' => 'required',
            'cost.*' => 'required',
            'depreciation.*' => 'required',
            'purchase_year.*' => 'required',
        ]);
        $data = $request->only([
            'item','quantity','cost','depreciation','purchase_year',
        ]);

        $result = BalanceProjects::where('project_id',$pro_id)->where('balance_type','intangible_assets')->delete();
        foreach ($data['item'] as $key => $item){
            if (!is_null($item)){
                BalanceProjects::query()->create([
                    'project_id' => $pro_id,
                    'balance_type' => 'intangible_assets',
                    'item' => $data['item'][$key],
                    'quantity' => $data['quantity'][$key],
                    'cost' => $data['cost'][$key],
                    'depreciation' => $data['depreciation'][$key],
                    'purchase_year' => $data['purchase_year'][$key],

                ]);
            }

        }
        $currentYear = date('Y', strtotime('12/31'));

        $depreciationData = array();

        $years= years($pro_id)['years'];
        array_unshift($years,$currentYear);
          $allData = BalanceProjects::where('project_id',$pro_id)->where('balance_type','equipment_buildings')->get();
          foreach($allData as $data){
           $emp1 = [$data->item];
         //  dd(count(years()['years']));
           foreach($years as $year){
               if($year ==$data->purchase_year){
                   $yearcost=$data->quantity * $data->cost;

                   $t = array_search($year, $years);
                   for($i=$t ;$i < 6; $i++){
                       array_push($emp1, $yearcost);

                       $yearcost= $yearcost - ( $yearcost * $data->depreciation / 100);
                   };


               }else{
                   array_push($emp1,"0");
               }



           }
           $emp = array_slice($emp1, 0, 7);
           array_push($depreciationData,$emp);

          }

         // dd($emp1);
         $depreciationData =array_reverse($depreciationData);

        $result = BalanceProjects::where('project_id',$pro_id)->where('balance_type','intangible_assets')->where('purchase_year','!=', $currentYear)->get();
        $dataYearCurrent = BalanceProjects::where('project_id',$pro_id)->where('balance_type','intangible_assets')->where('purchase_year',$currentYear)->get();

        return response()->json(['message'=>'success','data'=>$result,'dataYearCurrent'=>$dataYearCurrent,
        'depreciationData'=>$depreciationData,
        'success'=>'تم تخزين  النسبة البيانات بنجاح']);

    }
    public function other_assets_store(Request $request,$pro_id){
      // dd('dd');
        $request->validate([
            'item.*' => 'required',
            'quantity.*' => 'required',
            'cost.*' => 'required',
            'depreciation.*' => 'required',
            'purchase_year.*' => 'required',
        ]);
        $data = $request->only([
            'item','quantity','cost','depreciation','purchase_year',
        ]);

        $result = BalanceProjects::where('project_id',$pro_id)->where('balance_type','other_assets')->delete();
        foreach ($data['item'] as $key => $item){
            if (!is_null($item)){
                BalanceProjects::query()->create([
                    'project_id' => $pro_id,
                    'balance_type' => 'other_assets',
                    'item' => $data['item'][$key],
                    'quantity' => $data['quantity'][$key],
                    'cost' => $data['cost'][$key],
                    'depreciation' => $data['depreciation'][$key],
                    'purchase_year' => $data['purchase_year'][$key],

                ]);
            }

        }
        $currentYear = date('Y', strtotime('12/31'));

        $depreciationData = array();

        $years= years($pro_id)['years'];
        array_unshift($years,$currentYear);
          $allData = BalanceProjects::where('project_id',$pro_id)->where('balance_type','equipment_buildings')->get();
          foreach($allData as $data){
           $emp1 = [$data->item];
         //  dd(count(years()['years']));
           foreach($years as $year){
               if($year ==$data->purchase_year){
                   $yearcost=$data->quantity * $data->cost;

                   $t = array_search($year, $years);
                   for($i=$t ;$i < 6; $i++){
                       array_push($emp1, $yearcost);

                       $yearcost= $yearcost - ( $yearcost * $data->depreciation / 100);
                   };


               }else{
                   array_push($emp1,"0");
               }



           }
           $emp = array_slice($emp1, 0, 7);
           array_push($depreciationData,$emp);

          }

         // dd($emp1);
         $depreciationData =array_reverse($depreciationData);

        $result = BalanceProjects::where('project_id',$pro_id)->where('balance_type','other_assets')->where('purchase_year','!=', $currentYear)->get();
        $dataYearCurrent = BalanceProjects::where('project_id',$pro_id)->where('balance_type','other_assets')->where('purchase_year',$currentYear)->get();

        return response()->json(['message'=>'success','data'=>$result,'dataYearCurrent'=>$dataYearCurrent,
        'depreciationData'=>$depreciationData,
        'success'=>'تم تخزين  النسبة البيانات بنجاح']);
    }

    public function reserve_store(Request $request,$pro_id){
        // dd('dd');
          $request->validate([

              'cost' => 'required',

          ]);

          $result = BalanceProjects::where('project_id',$pro_id)->where('balance_type','reserve')->delete();
                  BalanceProjects::query()->create([
                      'project_id' => $pro_id,
                      'balance_type' => 'reserve',
                      'cost' => $request->cost,
                      'item' => "reserve",
                      'quantity' =>0,
                      'depreciation' => 0,
                      'purchase_year' => 0,


                  ]);



                  $currentYear = date('Y', strtotime('12/31'));

                  $result = BalanceProjects::where('project_id',$pro_id)->where('balance_type','!=', 'reserve')->where('purchase_year','!=', $currentYear)->get();
                  $dataYearCurrent = BalanceProjects::where('project_id',$pro_id)->where('purchase_year',$currentYear)->get();
                  $reserves = BalanceProjects::where('project_id',$pro_id)->where('balance_type', 'reserve')->first();
                  $reserve=$reserves->cost;

          return response()->json(['message'=>'success','data'=>$result,'dataYearCurrent'=>$dataYearCurrent,
          'reserve'=>$reserve,
          'success'=>'تم تخزين  النسبة البيانات بنجاح']);

      }


}
