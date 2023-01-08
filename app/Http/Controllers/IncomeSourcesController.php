<?php

namespace App\Http\Controllers;

use App\Models\ProjectBpChannelResource;
use App\Models\ProjectType;
use Illuminate\Http\Request;

class IncomeSourcesController extends Controller
{
    public function index()
    {
        $protype = ProjectType::where('status' ,'active')->get();

        $incomSourc = ProjectBpChannelResource::where('type','income_sources')->get();
        return view('admin.IncomeSources.index',compact('incomSourc','protype'));
    }

    public function store(Request $request)
    {
        $data =$request->only(['title','type','project_type_id']);

        $incomSourc = ProjectBpChannelResource::query()->create($data);

        if ($incomSourc) {
            return  redirect()->route('incomSourc.index')->with('success', 'تم إنشاءالصفحة بنجاح');
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
     $incomSourc =   ProjectBpChannelResource::findOrFail($request->id);
        $incomSourc->update($request->all());
                  return redirect()->route('incomSourc.index')->with('success', 'تم التعديل على بيانات  بنجاح');
    }

    public function destroy(Request $request)
    {
        $incomSourc = ProjectBpChannelResource::findOrFail($request->id);
        $incomSourc->delete();
        return response()->json(true, 200);
    }

    public function search_incomSourc(Request $request){

        $search = $request->get('query', false);
        $incomSourc = ProjectBpChannelResource::where('type','income_sources')->where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        })->latest()->paginate(3);
        $protype = ProjectType::all();

        return view('admin.IncomeSources.index',compact('incomSourc','protype'));

    }
}
