<?php

namespace App\Http\Controllers;

use App\Models\SystemContact;
use App\Http\Requests\StoreSystemContactRequest;
use App\Http\Requests\UpdateSystemContactRequest;
use Illuminate\Http\Request;

class SystemContactController extends Controller
{
    
    public function index()
    {
        $contact = SystemContact::get();

        return view('admin.contact.index',compact('contact'));
    }

   

    public function store(StoreSystemContactRequest $request)
    {
        
        $data =$request->all();

        $contact = SystemContact::query()->create($data);

        if ($contact) {
            return  redirect()->route('contacts.index')->with('success', 'تم إنشاء بنجاح');
        }
        else {
            return back()->with('failed', 'حدث خطأ !');
        }
    }

   


    public function update(Request $request, $id)
    {
       
        $data = $request->only([
            'title', 'type', 'value'
        ]);
    
     $contact = SystemContact::query()->findOrFail($request->id)->update($data);
    
     if ($contact) {
         return redirect()->route('contacts.index')->with('success', 'تم التعديل على بيانات الصفحة بنجاح');
     } else {
         return back()->with('error', 'حدث خطأ !');
     }
     
    }
        
    

    public function destroy(Request $request)
    {
        $contact = SystemContact::findOrFail($request->id);
        $contact->delete();
        return response()->json(true, 200);
    }

     public function search_contact(Request $request){

        $search = $request->get('query', false);
        $contact = SystemContact::query()->where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('type', 'like', '%' . $search . '%');
        })->latest()->paginate(3);

        return view('admin.contact.index',compact('contact'));

    }
}
