<?php

namespace App\Http\Controllers;

use App\Models\admin\Project;
use App\Models\ProjectFsGeneralIncome;
use App\Models\ProjectFsGeneralIncomeIncremental;
use App\Models\ProjectFsGeneralIncomeIncrementalDetail;
use DateTime;
use Illuminate\Http\Request;

class ProjectFsGeneralIncomeIncrementalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function project_fs_general_income_icremental_store(Request $request,$pro_id){
       //dd($request->all());
        $request->validate([
            'one_value_incremental' => 'required',

        ]);
        ProjectFsGeneralIncomeIncremental::query()->updateOrCreate([
            'project_id'   => $pro_id,
        ],[
            'project_id' => $pro_id,
            'incremental' => $request->one_value_incremental,


        ]);

        $result = ProjectFsGeneralIncomeIncremental::where('project_id',$pro_id)->first();

        return response()->json(['message'=>'success','data'=>$result,'success'=>'تم تخزين  النسبة البيانات بنجاح']);


     }

     public function project_fs_general_income_icremental_detail_store(Request $request,$pro_id)
     {
        //dd(count($request->all()));
        $counRequest = count($request->all());
        if( $counRequest == 1){
            $result = ProjectFsGeneralIncomeIncremental::where('project_id',$pro_id)->delete();

           $projectFsGeneralIncomeIncremental= ProjectFsGeneralIncomeIncremental::query()->updateOrCreate([
                'project_id'   => $pro_id,
            ],[
                'project_id' => $pro_id,
                'incremental' => $request->one_value_incremental,


            ]);
            $result = ProjectFsGeneralIncomeIncrementalDetail::where('project_fs_income_incremental_id',$projectFsGeneralIncomeIncremental->id)->delete();

            foreach(years($pro_id)['years'] as $year){
                ProjectFsGeneralIncomeIncrementalDetail::query()->create([
                    'project_fs_income_incremental_id' => $projectFsGeneralIncomeIncremental->id,
                    'year' => $year,
                    'incremental' =>$request->one_value_incremental,
                ]);
            }
        }else{
           // dd($request->all());
    //  $previos=ProjectFsGeneralIncomeIncrementalDetail::where('project_fs_income_incremental_id',$data['id'])->delete();
         $year = $request->get('year');
         $id_incremental = $request->get('id');
         $incremental = $request->get('value_incremental');
         $previos=ProjectFsGeneralIncomeIncrementalDetail::where('project_fs_income_incremental_id',$id_incremental)->get();
         //dd($previos);
              $count_items = count($previos);
             // dd($count_items);
             if($count_items != 0 ){
              for($i = 0; $i<$count_items; $i++)
              {

         $pres=  ProjectFsGeneralIncomeIncrementalDetail::where('project_fs_income_incremental_id' , $id_incremental)->where('year' , $year[$i] )->first();
          $pres->update([
            'year' => $year[$i] ,
            'incremental' => $incremental[$i] ,

                     ]);


                            }
                        } else{
                            $data = $request->only([
                                'value_incremental','year',
                            ]);

                            foreach ($data['year'] as $key => $year){
                                ProjectFsGeneralIncomeIncrementalDetail::query()->create([
                                    'project_fs_income_incremental_id' =>$id_incremental,
                                    'year' => $year,
                                    'incremental' =>$data['value_incremental'][$key],
                                ]);
                            }


                    }


//          foreach ($data['year'] as $key => $year){
//  //            echo 'ID : ' . $data['id'][$key] . ' : ' . $year . ' : ' . $data['incremental'][$key] . '<br>';
//              ProjectFsGeneralIncomeIncrementalDetail::query()->create([
//                  'project_fs_income_incremental_id' => $data['id'],
//                  'year' => $year,
//                  'incremental' => $data['value_incremental'][$key],
//              ]);

//          }

        }

       // $data = GeneralProjectIncomeIncremental::query()->where('project_id',1)->with('income')->orderBy('year')->get();

       $project = Project::where('id',$pro_id)->first();

        $projectStartDate = new DateTime($project->start_date);

        $operationDate = date('Y-m-d', strtotime("+".$project->development_duration." months", strtotime($project->start_date)));

       //$operationDate = new DateTime($operationDate);
       //$year= $operationDate->format('Y');
       $year= date('Y', strtotime($operationDate));

       $yearEnd = date('Y-m-d', strtotime('12/31/'.$year));

       $datediff = strtotime($yearEnd) - strtotime($operationDate);

       $remainingDays =  round($datediff / (60 * 60 * 24));

       $remainingmonths =  round($datediff / (60 * 60 * 24*30));
 $data = ProjectFsGeneralIncome::query()->where('project_id',$pro_id)->get();
 $totleIncomeMounth =0;
 $totleIncomeToEndYear=0;
 $totleIncomeYear=0;
foreach($data as $dataa){
    $totleIncomeMounth += ($dataa->value * $dataa->quantity);
    $totleIncomeToEndYear += ($dataa->value * $dataa->quantity) * $remainingmonths;
    $totleIncomeYear += ($dataa->value * $dataa->quantity) * 12;

};

         return response()->json(['message'=>'success','data'=>$data,
         'remainingmonths'=>$remainingmonths,'totleIncomeMounth'=>$totleIncomeMounth
         ,'totleIncomeToEndYear'=>$totleIncomeToEndYear,'totleIncomeYear'=>$totleIncomeYear,
         'success'=>'تم تخزين البيانات بنجاح']);


     }

     public function project_fs_general_income_icremental_detail_get($pro_id){

        $projectFsGeneralIncome = ProjectFsGeneralIncomeIncremental::query()->where('project_id',$pro_id)->first();
        $data =ProjectFsGeneralIncomeIncrementalDetail::where('project_fs_income_incremental_id',$projectFsGeneralIncome->id)->get();
        return response()->json(['message'=>'success','data'=>$data,'projectFsGeneralIncome'=>$projectFsGeneralIncome,'success'=>'تم تخزين البيانات بنجاح']);

     }



    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectFsGeneralIncomeIncremental  $projectFsGeneralIncomeIncremental
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectFsGeneralIncomeIncremental $projectFsGeneralIncomeIncremental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectFsGeneralIncomeIncremental  $projectFsGeneralIncomeIncremental
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectFsGeneralIncomeIncremental $projectFsGeneralIncomeIncremental)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProjectFsGeneralIncomeIncremental  $projectFsGeneralIncomeIncremental
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectFsGeneralIncomeIncremental $projectFsGeneralIncomeIncremental)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectFsGeneralIncomeIncremental  $projectFsGeneralIncomeIncremental
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectFsGeneralIncomeIncremental $projectFsGeneralIncomeIncremental)
    {
        //
    }
}
