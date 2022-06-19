<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Carbon;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Slider::all();
        return view('slider.index',compact('ads'));
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
        $ads_image =  $request->file('adsimage');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($ads_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'images/ads/';
        $last_img = $up_location.$img_name;
        $ads_image->move($up_location,$img_name);

 

         $ads =  Slider::create([
             'slider_image' => $last_img,
             'slider_title' => $request->input('adstitle'),
             'slider_description' => $request->input('adsdescription'),
             'created_at' => Carbon::now()
         ]);
     

         return redirect()->route('ads')->with('message','Slider Created Successfully');
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
        $ads = Slider::find($id);
        return view('slider.edit',compact('ads'));
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
        $old_image =  $request->input('oldads');
        $ads_image =  $request->file('adsimage');

        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($ads_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'images/ads/';
        $last_img = $up_location.$img_name;
        $ads_image->move($up_location,$img_name);

        unlink($old_image);

         $ads =  Slider::find($id)->update([
             'slider_image' => $last_img,
             'slider_title' => $request->input('adstitle'),
             'slider_description' => $request->input('adsdescription'),
             'updated_at' => Carbon::now()
         ]);
     

         return redirect()->route('ads')->with('message','Slider Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $ads = Slider::find($id);

        return view('slider.delete', compact('ads'));
    }

    public function destroy($id)
    {
        $ads = Slider::find($id);
        unlink($ads->slider_image);
        $ads->delete();

        return redirect()->route('ads')->with('error','Slider Deleted Successfully');
    }
}
