<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\Controller;
use App\MainCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class MaincategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $main_categories = MainCategory::paginate(20);
        return view('admin.category.main_category', compact('main_categories'));
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
           'title' => 'required'
        ]);
        $new_item = new MainCategory();
        $new_item->title = $request->title;
        $new_item->save();

        $slug = slug_maker($request->title);
        if (MainCategory::where('slug', $slug)->exists()){
            $new_item->slug = $slug . '-' . $new_item->id;
        }else{
            $new_item->slug = $slug;
        }
        $new_item->save();

        Toastr::success('Category added', 'Success');
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
            'title' => 'required'
        ]);
        $new_item = MainCategory::findOrFail($id);
        $new_item->title = $request->title;
        $new_item->slug = '';
        $new_item->save();

        $slug = slug_maker($request->title);
        if (MainCategory::where('slug', $slug)->exists()){
            $new_item->slug = $slug . '-' . $new_item->id;
        }else{
            $new_item->slug = $slug;
        }
        $new_item->save();

        Toastr::success('Category Updated', 'Success');
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
            Toastr::error('This category will not be deleted', 'Sorry');
            return back();
        }
        Category::where('main_category_id', $id)->update([
           'main_category_id' => 1
        ]);
        MainCategory::find($id)->delete();

        Toastr::success('Category Deleted', 'Success');
        return back();
    }
}
