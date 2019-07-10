<?php

namespace App\Http\Controllers;

use App\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\facades\Storage;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this -> validate($request,[
            'title' => 'required',
            'sub_title' => 'required',
            'image' => 'required',
        ]);

        if($request->hasfile('image')){
           $filename = $request->image->getClientOriginalName();
           $request->image->storeAs('public/upload',$filename);

                  
           $slider = new Slider();
           $slider->title = $request -> title;
           $slider->sub_title = $request ->sub_title;
           $slider->image = $filename;
           $slider->save();
        }
            return redirect()->route('slider.index')->with('successMsg','Sider Successfully Saved');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $slider = Slider::find($id);
        return view('slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    { 
        $this -> validate($request,[
            'title' => 'required',
            'sub_title' => 'required',
            'image'=>'required',
        ]);
        $slider = Slider::find($id);
        if($request->hasfile('image')){
           $filename = $request->image->getClientOriginalName();
           $request->image->storeAs('public/upload',$filename);

           $slider->title = $request -> title;
           $slider->sub_title = $request ->sub_title;
           $slider->image = $filename;
           $slider->save();
        }
            return redirect()->route('slider.index')->with('successMsg','Sider Successfully Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::find($id);
        Storage::delete('public/upload/'.$slider->image);
        $slider->delete();
        return redirect()->back()->with('successMsg','Slider Successful deleted');
    }
}
 