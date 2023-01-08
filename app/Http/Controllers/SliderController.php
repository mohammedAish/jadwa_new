<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Http\Requests\StoreSliderRequest;
use App\Http\Requests\UpdateSliderRequest;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    
    public function index()
    {
       $slider= Slider::get();
       return view('admin.slider.index',compact('slider'));
    }

    
    public function store(StoreSliderRequest $request)
    {
       
        $data =$request->validated();

        $slider = Slider::query()->create($data);

        if ($slider) {
            return  redirect()->route('sliders.index')->with('success', 'تم إنشاءالسلايدر بنجاح');
        }
        else {
            return back()->with('failed', 'حدث خطأ !');
        }
    }

   
  
    public function update(UpdateSliderRequest $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $slider = Slider::findOrFail($request->id);
        $slider->update($request->all());
        return redirect()->route('sliders.index')->with('success', 'تم التعديل على البيانات  بنجاح');

        
    }

   
    public function destroy(Request $request)
    {
       
        $slider = Slider::findOrFail($request->id);
        $slider->delete();
        return response()->json(true, 200);
    }

    public function search_slider(Request $request){

        $search = $request->get('query', false);
        $slider = Slider::query()->where(function ($query) use ($search) {
            $query->where('title', 'like', '%' . $search . '%');
        })->latest()->paginate(3);

        return view('admin.slider.index',compact('slider'));

    }
}
