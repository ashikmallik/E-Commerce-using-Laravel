<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\slider;
use RealRashid\SweetAlert\Facades\Alert;

class sliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = slider::all();
        return view('slider.index', compact('sliders'));
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
        $this->validate($request,[
            'title' => 'required',
            'subTitle' => 'required',
            'image' => 'required|mimes: jpg,png,jpeg',

        ]);
        $image = $request->file('image');
        $slug = str_slug($request->title);

        if(isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploads/slider')){
                mkdir('uploads/slider', 077, true);
            }
            $image->move('uploads/slider',$imagename);
        }else{
            $imagename = 'default.png';
        }

        $slider = new slider();
        $slider->title = $request->title;
        $slider->subTitle = $request->subTitle;
        $slider->image = $imagename;
        $slider->save();
        Alert::success('Data insert Successfully', 'Success Message');

        return redirect()->route('slider.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sliders = slider::find($id);
        return view('slider.edit', compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'sub_title' => 'required',

        ]);
        $slider = slider::find($id);
        $image = $request->file('image');
        $slug = str_slug($request->title);

        

        if(isset($image))
        {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploads/slider')){
                mkdir('uploads/slider', 077, true);
            }
            $image->move('uploads/slider',$imagename);
        }else{
            $imagename = $slider->image;
        }

        
        $slider->title = $request->title;
        $slider->sub_title = $request->sub_title;
        $slider->image = $imagename;
        $slider->save();
        Alert::success('Data updated Successfully', 'Success Message');

        return redirect()->route('slider.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = slider::find($id);

        if (file_exists('uploads/slider/'.$slider->image)) {
            unlink('uploads/slider/'.$slider->image);
        }

        $slider->delete();
        Alert::success('Data deleted Successfully', 'Success Message');
        return redirect()->route('slider.index');
    }
}
