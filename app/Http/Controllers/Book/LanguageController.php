<?php

namespace App\Http\Controllers\Book;

use App\Country;
use App\Http\Controllers\Controller;
use App\Language;
use App\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::paginate(20);
        return view('admin.book.language', compact('languages'));
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
            'name' => 'required'
        ]);
        $new_item = new Language();
        $new_item->name = $request->name;
        $new_item->save();

        $slug = slug_maker($request->name);
        if (Country::where('slug', $slug)->exists()){
            $new_item->slug = $slug . '-' . $new_item->id;
        }else{
            $new_item->slug = $slug;
        }
        $new_item->save();

        Toastr::success('Language added', 'Success');
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
            'name' => 'required'
        ]);
        $new_item = Language::findOrFail($id);
        $new_item->name = $request->name;
        $new_item->slug = ' ';
        $new_item->save();

        $slug = slug_maker($request->name);
        if (Country::where('slug', $slug)->exists()){
            $new_item->slug = $slug . '-' . $new_item->id;
        }else{
            $new_item->slug = $slug;
        }
        $new_item->save();

        Toastr::success('Language updated', 'Success');
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
            Toastr::error('This language will not be deleted', 'Sorry');
            return back();
        }
        // products will be detach from this country
        Product::where('language_id', $id)->update([
            'language_id' => 1
        ]);


        Language::find($id)->delete();

        Toastr::success('Language Deleted', 'Success');
        return back();
    }
}
