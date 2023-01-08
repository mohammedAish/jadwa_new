<?php

namespace App\Http\Controllers;

use App\Models\ProjectBpChannelResource;
use App\Models\ProjectType;
use Illuminate\Http\Request;

class MarketingChannelController extends Controller
{
    
    public function index()
    {
        $protype = ProjectType::where('status' ,'active')->get();

        $marktechanle = ProjectBpChannelResource::where('type','marketing_channel')->get();
        return view('admin.MarketChanel.index',compact('marktechanle','protype'));
    }

   
   
    
    public function store(Request $request)
    {
        $data =$request->only(['title','type','project_type_id']);

        $markchanel = ProjectBpChannelResource::query()->create($data);

        if ($markchanel) {
            return  redirect()->route('marketchanel.index')->with('success', 'تم إنشاءالصفحة بنجاح');
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
     $marktechanle=   ProjectBpChannelResource::findOrFail($request->id);
        $marktechanle->update($request->all());
                  return redirect()->route('marketchanel.index')->with('success', 'تم التعديل على بيانات  بنجاح');
    }

   
    public function destroy(Request $request)
    {
        $marktechanle = ProjectBpChannelResource::findOrFail($request->id);
        $marktechanle->delete();
        return response()->json(true, 200);
    }

    public function search_marktechanle(Request $request){

        $search = $request->get('query', false);
        $marktechanle = ProjectBpChannelResource::where('type','marketing_channel')->where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        })->latest()->paginate(3);
        $protype = ProjectType::all();

        return view('admin.MarketChanel.index',compact('marktechanle','protype'));

    }
}
