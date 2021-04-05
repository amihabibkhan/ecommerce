<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Product;
use App\Translator;
use App\Writer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class TranslatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $translators = Translator::paginate(20);
        return view('admin.book.translator', compact('translators'));
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
        $translator = new Translator();
        if ($request->has('image')){
            $request->validate([
                'image' => 'image'
            ]);
            $path = $request->file('image')->store('translator');
            $public_path = public_path('storage/' . $path);
            Image::make($public_path)->resize(200,200)->save($public_path);
            $translator->image = $path;
        }
        $translator->name = $request->name;
        $translator->description = $request->description;
        $translator->save();

        $slug = slug_maker($request->name);
        if (Translator::where('slug', $slug)->exists()){
            $translator->slug = $slug . '-' . $translator->id;
        }else{
            $translator->slug = $slug;
        }
        $translator->save();

        Toastr::success('Translator added', 'Success');
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
        $translator = Translator::findOrFail($id);
        if ($request->has('image_update')){
            $request->validate([
                'image_update' => 'image'
            ]);
            Storage::delete($translator->image);
            $path = $request->file('image_update')->store('writer');
            $public_path = public_path('storage/' . $path);
            Image::make($public_path)->resize(200,200)->save($public_path);
            $translator->image = $path;
        }
        $translator->name = $request->name;
        $translator->description = $request->description;
        $translator->slug = '';
        $translator->save();

        $slug = slug_maker($request->name);
        if (Translator::where('slug', $slug)->exists()){
            $translator->slug = $slug . '-' . $translator->id;
        }else{
            $translator->slug = $slug;
        }
        $translator->save();

        Toastr::success('Translator Updated', 'Success');
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
            Toastr::error('This translator will not be deleted', 'Sorry');
            return back();
        }
        // products will be changed from this translator
        Product::where('translator_id', $id)->update([
            'translator_id' => 1
        ]);

        $translator = Translator::findOrFail($id);
        Storage::delete($translator->image);
        $translator->delete();

        Toastr::success('Translator Deleted', 'Success');
        return back();
    }
}
