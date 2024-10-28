<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Homepage;
use App\Http\Controllers\Controller;
use App\SubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sections = Homepage::orderBy('order')->get();
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        if ($result = Homepage::orderBy('order', 'desc')->first()){
            $last_order = $result->order + 1;
        }else{
            $last_order = 1;
        }
        return view('admin.pages.homepage', compact('sections', 'categories', 'sub_categories', 'last_order'));
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
        // validation
        $this->inputValidation($request);

        // normal inputs
        $this->normalInput($request);

        Toastr::success('Section Added');
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
        // delete item
        Homepage::findOrFail($id)->delete();

        Toastr::success('Section Deleted');
        return back();
    }


    public function inputValidation($request)
    {
        $request->validate([
            'type' => 'required',
            'order' => 'required'
        ]);
        if ($request->type == 1){
            $request->validate([
                'category_id' => 'required'
            ]);
        }
        if ($request->type == 2){
            $request->validate([
                'sub_category_id' => 'required'
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function normalInput($request, $type = 'store', $id = null)
    {
        if ($type == 'store'){
            $new_item = new Homepage();
        }else{
            $new_item = Homepage::findOrFail($id);
        }
        $new_item->type = $request->type;
        $new_item->order = $request->order;

        // if type is category
        if ($request->type == 1){
            $request->validate([
                'category_id' => 'required'
            ]);
            $new_item->category_id = $request->category_id;
            $new_item->section_title = Category::find($request->category_id)->title;
        }

        // if type is sub category
        if ($request->type == 2){
            $request->validate([
                'sub_category_id' => 'required'
            ]);
            $new_item->category_id = $request->sub_category_id;
            $new_item->section_title = SubCategory::find($request->sub_category_id)->title;
        }

        // if type is writer
        if ($request->type == 3){
            $new_item->section_title = 'জনপ্রিয় লেখকগণ';
        }elseif ($request->type == 4){
            $new_item->section_title = 'এই সপ্তাহের অফার';
        }elseif ($request->type == 5){
            $new_item->section_title = 'একেবারে নতুন বইয়ের তালিকা';
        }elseif ($request->type == 6){
            $new_item->section_title = 'At a Glance';
        }else{
            $new_item->section_title = 'Blank';
        }

        if ($request->section_title){
            $new_item->section_title = $request->section_title;
        }
        $new_item->save();
        return;
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
        // validation
        $this->inputValidation($request);

        // normal inputs
        $this->normalInput($request, 'update', $id);

        Toastr::success('Section Updated');
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
        //
    }
}
