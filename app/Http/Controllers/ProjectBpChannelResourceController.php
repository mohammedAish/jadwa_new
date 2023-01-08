<?php

namespace App\Http\Controllers;

use App\Models\ProjectBpChannelResource;
use App\Http\Requests\StoreProjectBpChannelResourceRequest;
use App\Http\Requests\UpdateProjectBpChannelResourceRequest;
use App\Models\ProjectType;
use Illuminate\Http\Request;

class ProjectBpChannelResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $protype = ProjectType::where('status' ,'active')->get();

       $projBpChanlRes=ProjectBpChannelResource::where('type','sale_channel')->get();
       
       return view('admin.projrctBpChanelRes.index',compact('projBpChanlRes','protype'));
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
     * @param  \App\Http\Requests\StoreProjectBpChannelResourceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectBpChannelResourceRequest $request)
    {
        $data =$request->validated();

        $projBpChanlRes = ProjectBpChannelResource::query()->create($data);

        if ($projBpChanlRes) {
            return  redirect()->route('projBpChanlRes.index')->with('success', 'تم إنشاءالصفحة بنجاح');
        }
        else {
            return back()->with('failed', 'حدث خطأ !');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectBpChannelResource  $projectBpChannelResource
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectBpChannelResource $projectBpChannelResource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectBpChannelResource  $projectBpChannelResource
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectBpChannelResource $projectBpChannelResource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectBpChannelResourceRequest  $request
     * @param  \App\Models\ProjectBpChannelResource  $projectBpChannelResource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProjectBpChannelResource $projectBpChannelResource)
    {
        // dd($request->id);
        $request->validate([
            'title' => 'required',
            'project_type_id' => 'required',
         
        ]);
     $projBpChanlRes=   ProjectBpChannelResource::findOrFail($request->id);
        $projBpChanlRes->update($request->all());
                  return redirect()->route('projBpChanlRes.index')->with('success', 'تم التعديل على بيانات  بنجاح');

    }
  
}
