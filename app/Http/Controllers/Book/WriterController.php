<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Writer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class WriterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $writers = Writer::all();
        return view('admin.book.writer', compact('writers'));
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
        $writer = new Writer();
        if ($request->has('image')){
            $request->validate([
                'image' => 'image'
            ]);
            $path = $request->file('image')->store('writer');
            $public_path = public_path('storage/' . $path);
            Image::make($public_path)->resize(200,200)->save($public_path);
            $writer->image = $path;
        }
        $writer->name = $request->name;
        $writer->description = $request->description;
        $writer->save();

        $slug = slug_maker($request->name);
        if (Writer::where('slug', $slug)->exists()){
            $writer->slug = $slug . '-' . $writer->id;
        }else{
            $writer->slug = $slug;
        }
        $writer->save();

        Toastr::success('Writer added', 'Success');
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
        $writer = Writer::findOrFail($id);
        if ($request->has('image_update')){
            $request->validate([
                'image_update' => 'image'
            ]);
            Storage::delete($writer->image);
            $path = $request->file('image_update')->store('writer');
            $public_path = public_path('storage/' . $path);
            Image::make($public_path)->resize(200,200)->save($public_path);
            $writer->image = $path;
        }
        $writer->name = $request->name;
        $writer->description = $request->description;
        $writer->slug = '';
        $writer->save();

        $slug = slug_maker($request->name);
        if (Writer::where('slug', $slug)->exists()){
            $writer->slug = $slug . '-' . $writer->id;
        }else{
            $writer->slug = $slug;
        }
        $writer->save();

        Toastr::success('Writer Updated', 'Success');
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
            Toastr::error('This writer will not be deleted', 'Sorry');
            return back();
        }

        // product related with this writer will be changed

        $writer = Writer::findOrFail($id);
        Storage::delete($writer->image);
        $writer->delete();

        Toastr::success('Writer Deleted', 'Success');
        return back();
    }
}
