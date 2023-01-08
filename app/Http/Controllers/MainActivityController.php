<?php

namespace App\Http\Controllers;

use App\Models\ProjectBpChannelResource;
use App\Models\ProjectType;
use Illuminate\Http\Request;

class MainActivityController extends Controller
{
    public function index()
    {
        $protype = ProjectType::where('status' ,'active')->get();

        $mainActivity = ProjectBpChannelResource::where('type','main_activity')->get();
        return view('admin.mainActivity.index',compact('mainActivity','protype'));
    }


    
    public function store(Request $request)
    {
        $data =$request->only(['title','type','project_type_id']);

        $mainActivity = ProjectBpChannelResource::query()->create($data);

        if ($mainActivity) {
            return  redirect()->route('mainActivity.index')->with('success', 'تم إنشاءالصفحة بنجاح');
        }
        else {
            return back()->with('failed', 'حدث خطأ !');
        }
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
        ]);
     $mainActivity =   ProjectBpChannelResource::findOrFail($request->id);
        $mainActivity->update($request->all());
                  return redirect()->route('mainActivity.index')->with('success', 'تم التعديل على بيانات  بنجاح');
    }

   
    public function destroy(Request $request)
    {
        $mainActivity = ProjectBpChannelResource::findOrFail($request->id);
        $mainActivity->delete();
        return response()->json(true, 200);
    }

    
    public function search_mainActivity(Request $request){

        $search = $request->get('query', false);
        $mainActivity = ProjectBpChannelResource::where('type','main_activity')->where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        })->latest()->paginate(3);
        $protype = ProjectType::all();

        return view('admin.mainActivity.index',compact('mainActivity','protype'));

    }
}
