<?php

namespace App\Http\Controllers;

use App\Models\ProjectBpChannelResource;
use App\Models\ProjectType;
use Illuminate\Http\Request;

class ExpensisModalController extends Controller
{
    public function index()
    {
        $protype = ProjectType::where('status' ,'active')->get();

        $expensisModel = ProjectBpChannelResource::where('type','expensis_modal')->get();
        return view('admin.ExpensisModal.index',compact('expensisModel','protype'));
    }

    
    public function store(Request $request)
    {
        $data =$request->only(['title','type','project_type_id']);

        $expensisModel = ProjectBpChannelResource::query()->create($data);

        if ($expensisModel) {
            return  redirect()->route('expensisModel.index')->with('success', 'تم إنشاءالصفحة بنجاح');
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
     $expensisModel =   ProjectBpChannelResource::findOrFail($request->id);
        $expensisModel->update($request->all());
                  return redirect()->route('expensisModel.index')->with('success', 'تم التعديل على بيانات  بنجاح');
    }

   
    public function destroy(Request $request)
    {
        $expensisModel = ProjectBpChannelResource::findOrFail($request->id);
        $expensisModel->delete();
        return response()->json(true, 200);
    }

    public function search_expModal(Request $request){

        $search = $request->get('query', false);
        $expensisModel = ProjectBpChannelResource::where('type','expensis_modal')->where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        })->latest()->paginate(3);
        $protype = ProjectType::all();

        return view('admin.ExpensisModal.index',compact('expensisModel','protype'));

    }
}
