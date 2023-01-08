<?php

namespace App\Http\Controllers;

use App\Models\ProjectBpChannelResource;
use App\Models\ProjectType;
use Illuminate\Http\Request;

class SaleChannelController extends Controller
{
    public function index()
    {
        $protype = ProjectType::where('status' ,'active')->get();

        $salechanel = ProjectBpChannelResource::where('type','sale_channel')->get();
        return view('admin.SaleChannel.index',compact('salechanel','protype'));
    }


    public function store(Request $request)
    {
        $data =$request->only(['title','type','project_type_id']);

        $salechanel = ProjectBpChannelResource::query()->create($data);

        if ($salechanel) {
            return  redirect()->route('saleChanel.index')->with('success', 'تم إنشاءالصفحة بنجاح');
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
     $salechanel =   ProjectBpChannelResource::findOrFail($request->id);
        $salechanel->update($request->all());
                  return redirect()->route('saleChanel.index')->with('success', 'تم التعديل على بيانات  بنجاح');
    }

      public function destroy(Request $request)
    {
        $salechanel = ProjectBpChannelResource::findOrFail($request->id);
        $salechanel->delete();
        return response()->json(true, 200);
    }

    public function search_salechanel(Request $request){

        $search = $request->get('query', false);
        $salechanel = ProjectBpChannelResource::where('type','sale_channel')->where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        })->latest()->paginate(3);
        $protype = ProjectType::all();

        return view('admin.SaleChannel.index',compact('salechanel','protype'));

    }

}
