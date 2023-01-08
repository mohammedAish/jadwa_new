<?php

namespace App\Http\Controllers;

use App\Models\SystemServices;
use App\Http\Requests\StoreSystemServicesRequest;
use App\Http\Requests\UpdateSystemServicesRequest;
use Illuminate\Http\Request;

class SystemServicesController extends Controller
{
    
    public function index()
    {
        $services= SystemServices::query()->latest()->paginate(4);
        return view('admin.services.index',compact('services'));
    }

  
    public function create()
    {
        return view('admin.services.create');
    }

  
    public function store(StoreSystemServicesRequest $request)
    {
        $data =$request->all();
        if($request->file('image')){
            $file= $request->file('image');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('public/image'), $filename);
            $data['image']= $filename;
        }
        $pages = SystemServices::query()->create($data);

        return  redirect()->route('services.index')->with('success', 'تم إنشاءالخدمة بنجاح');
        
    }

   

    public function edit(SystemServices $service)
    {
        return view('admin.services.edit',compact('service'));
    }

    
    public function update(UpdateSystemServicesRequest $request, SystemServices $service)
    {
        $data = $request->all();
        $service = SystemServices::query()->findOrFail($service->id);

        if($request->hasFile('image')){
            $file= $request->file('image');
            $filename= $file->getClientOriginalName();
            $file-> move(public_path('public/image'), $filename);
            $data['image']= $filename;
        }else{
            $data['image'] = $service->image;
        }
           $service->update($data);
            return redirect()->route('services.index')->with('success', 'تم التعديل على بيانات الخدمة بنجاح');
    }

   
    public function destroy(Request $request)
    {
        $service = SystemServices::findOrFail($request->id);
        $service->delete();
        return response()->json(true, 200);
    }

    public function search_services(Request $request){

        $search = $request->get('query', false);
        $services = SystemServices::query()->where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        })->latest()->paginate(3);

        return view('admin.services.index',compact('services'));

    }
    
}
