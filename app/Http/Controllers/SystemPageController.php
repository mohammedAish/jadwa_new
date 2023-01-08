<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePagesRequest;
use App\Http\Requests\UpdatePagesRequest;
use App\Models\SystemPage;
use Illuminate\Http\Request;

class SystemPageController extends Controller
{
   
    public function index()
    {
        $pages = SystemPage::all();
    return view('admin.pages.index',compact('pages'));
    }

   
    public function create()
    {
        return  view('admin.pages.create');
    }

  
    public function store(StorePagesRequest $request)
    {
        $data =$request->validated();

        $pages = SystemPage::create($data);

        return  redirect()->route('pages.index')->with('success', 'تم إنشاءالصفحة بنجاح');
        
    }

  

 
    public function edit(SystemPage $page)
    {
        return view('admin.pages.edit' ,compact('page'));
    }

    public function update(UpdatePagesRequest $request, SystemPage $page)
    {
        $data = $request->all();
        $page = SystemPage::findOrFail($page->id)->update($data);

        return redirect()->route('pages.index')->with('success', 'تم التعديل على بيانات الصفحة بنجاح');
        
    }

  
    public function destroy(Request $request)
    {
        $page = SystemPage::findOrFail($request->id);
        $page->delete();
        return response()->json(true, 200);
    }

    public function search_pages(Request $request){

        $search = $request->get('query', false);
        $pages = SystemPage::query()->where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        })->latest()->paginate(3);

        return view('admin.pages.index',compact('pages'));

    }
}
