<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('admin.pages.slider', compact('sliders'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'image' => 'required|image|max:1025',
        ]);

        $slider_image = $request->file('image')->store('slider');
        Slider::create([
           'title' => $request->title,
           'title_position' => $request->title_position,
           'image' => $slider_image,
        ]);

        Toastr::success('Slider added');
        return back();
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
        $request->validate([
            'image' => 'required|image|max:1025',
        ]);

        // upload new image
        $slider_image = $request->file('image')->store('slider');

        // delete previous image
        $slider = Slider::findOrFail($id);
        Storage::delete($slider->image);

        // update database
        $slider->update([
            'title' => $request->title,
            'title_position' => $request->title_position,
            'image' => $slider_image,
        ]);

        Toastr::success('Slider Updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Slider::findOrFail($id);

        Storage::delete($slider->image);
        $slider->delete();

        Toastr::success('Slider deleted');
        return back();
    }
}
