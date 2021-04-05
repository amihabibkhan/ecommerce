<?php

namespace App\Http\Controllers\Attributes;

use App\Http\Controllers\Controller;
use App\Size;
use App\Tag;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sizes = Size::paginate(20);
        return view('admin.others_attributes.size', compact('sizes'));
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
            'size' => 'required'
        ]);
        $new_item = new Size();
        $new_item->title = $request->title;
        $new_item->size = $request->size;
        $new_item->save();

        Toastr::success('Size added', 'Success');
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
            'size' => 'required'
        ]);
        $new_item = Size::findOrFail($id);
        $new_item->title = $request->title;
        $new_item->size = $request->size;
        $new_item->save();

        Toastr::success('Size updated', 'Success');
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
            Toastr::error('This size will not be deleted', 'Sorry');
            return back();
        }

        // detach all product

        Size::find($id)->delete();

        Toastr::success('Size Deleted', 'Success');
        return back();
    }
}
