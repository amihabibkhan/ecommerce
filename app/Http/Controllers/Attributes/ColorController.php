<?php

namespace App\Http\Controllers\Attributes;

use App\Color;
use App\Http\Controllers\Controller;
use App\Size;
use App\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::all();
        return view('admin.others_attributes.color', compact('colors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'color' => 'required'
        ]);
        $new_item = new Color();
        $new_item->color_name = $request->color_name;
        $new_item->color = $request->color;
        $new_item->save();

        Toastr::success('Color added', 'Success');
        return back();
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
        //
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
            'color' => 'required'
        ]);
        $new_item = Color::findOrFail($id);
        $new_item->color_name = $request->color_name;
        $new_item->color = $request->color;
        $new_item->save();

        Toastr::success('Color updated', 'Success');
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
        if ($id == 1){
            Toastr::error('This color will not be deleted', 'Sorry');
            return back();
        }

        // detach all product

        Color::find($id)->delete();

        Toastr::success('Color Deleted', 'Success');
        return back();
    }
}
