<?php

namespace App\Http\Controllers;

use App\Models\AdministExpen;
use App\Http\Requests\StoreAdministExpenRequest;
use App\Http\Requests\UpdateAdministExpenRequest;
use Illuminate\Http\Request;

class AdministExpenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminstExp = AdministExpen::get();
        return view('admin.AdminstratorExp.index',compact('adminstExp'));
    }

    
    public function store(Request $request)
    {
        $data =$request->only(['item','value']);

        $adminst = AdministExpen::query()->create($data);

        if ($adminst) {
            return  redirect()->route('adminstExp.index')->with('success', 'تم إنشاء بنجاح');
        }
        else {
            return back()->with('failed', 'حدث خطأ !');
        }
    }

    

   
    public function update(UpdateAdministExpenRequest $request, AdministExpen $administExpen)
    {
        $request->validate([
            'item' => 'required',
            'value' => 'required',
        ]);
     $administExpen =   AdministExpen::findOrFail($request->id);
        $administExpen->update($request->all());
                  return redirect()->route('adminstExp.index')->with('success', 'تم التعديل على بيانات  بنجاح');

    }

    public function destroy(Request $request)
    {
        $administExpen = AdministExpen::findOrFail($request->id);
        $administExpen->delete();
        return response()->json(true, 200);
    }
    public function search_adminst_expen(Request $request){

        $search = $request->get('query', false);
        $adminstExp = AdministExpen::query()->where(function ($query) use ($search) {
            $query->where('item', 'like', '%' . $search . '%');
        })->latest()->paginate(3);

        return view('admin.AdminstratorExp.index',compact('adminstExp'));

    }
}
