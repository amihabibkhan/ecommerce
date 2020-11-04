<?php

namespace App\Http\Controllers\Category;

use App\Category;
use App\Http\Controllers\Controller;
use App\SubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        return view('admin.category.sub_category', compact('categories', 'subcategories'));
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
            'title' => 'required',
            'category_id' => 'required',
        ]);
        $new_item = new SubCategory();
        $new_item->title = $request->title;
        $new_item->category_id = $request->category_id;
        $new_item->save();

        $slug = slug_maker($request->title);
        if (SubCategory::where('slug', $slug)->exists()){
            $new_item->slug = $slug . '-' . $new_item->id;
        }else{
            $new_item->slug = $slug;
        }
        $new_item->save();

        Toastr::success('Sub category added', 'Success');
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
            'title' => 'required',
            'category_id' => 'required',
        ]);
        $new_item = SubCategory::findOrFail($id);
        $new_item->title = $request->title;
        $new_item->category_id = $request->category_id;
        $new_item->slug = ' ';
        $new_item->save();

        $slug = slug_maker($request->title);
        if (SubCategory::where('slug', $slug)->exists()){
            $new_item->slug = $slug . '-' . $new_item->id;
        }else{
            $new_item->slug = $slug;
        }
        $new_item->save();

        Toastr::success('Sub category Updated', 'Success');
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

        // have to product transfer to general sub category

        SubCategory::findOrFail($id)->delete();

        Toastr::success('Category Deleted', 'Success');
        return back();
    }
}
