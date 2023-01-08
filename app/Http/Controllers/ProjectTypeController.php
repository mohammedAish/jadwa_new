<?php

namespace App\Http\Controllers;

use App\Models\ProjectType;
use Illuminate\Http\Request;

class ProjectTypeController extends Controller
{

    public function index()
    {
        $projType = ProjectType::all();
        return view('admin.ProjectType.index',compact('projType'));
    }




    public function store(Request $request)
    {
        $data =$request->only([
            'title','status'
        ]);

        $projType = ProjectType::query()->create($data);

        if ($projType) {
            return  redirect()->route('projectype.index')->with('success', 'تم إنشاء بنجاح');
        }
        else {
            return back()->with('failed', 'حدث خطأ !');
        }
    }





    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'status' => 'required',

        ]);
          ProjectType::findOrFail($request->id)->update($request->all());
          return redirect()->route('projectype.index')->with('success', 'تم التعديل على بيانات  بنجاح');

    }


    public function destroy(Request $request)
    {
        $project = ProjectType::findOrFail($request->id);
        $project->delete();
        return response()->json(true, 200);
    }

    public function search_projType(Request $request){

        $search = $request->get('query', false);
        $projType = ProjectType::query()->where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        })->latest()->paginate(3);

        return view('admin.ProjectType.index',compact('projType'));

    }
}
