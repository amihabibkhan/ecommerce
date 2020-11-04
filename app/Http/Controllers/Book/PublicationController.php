<?php

namespace App\Http\Controllers\Book;

use App\Http\Controllers\Controller;
use App\Publication;
use App\Writer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publications = Publication::all();
        return view('admin.book.publication', compact('publications'));
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
        $publication = new Publication();
        if ($request->has('image')){
            $request->validate([
                'image' => 'image'
            ]);
            $path = $request->file('image')->store('publication');
            $public_path = public_path('storage/' . $path);
            Image::make($public_path)->resize(200,200)->save($public_path);
            $publication->logo = $path;
        }
        $publication->name = $request->name;
        $publication->description = $request->description;
        $publication->save();

        $slug = slug_maker($request->name);
        if (Publication::where('slug', $slug)->exists()){
            $publication->slug = $slug . '-' . $publication->id;
        }else{
            $publication->slug = $slug;
        }
        $publication->save();

        Toastr::success('Publication added', 'Success');
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
        $publication = Publication::findOrFail($id);
        if ($request->has('image')){
            $request->validate([
                'image' => 'image'
            ]);
            Storage::delete($publication->logo);
            $path = $request->file('image')->store('publication');
            $public_path = public_path('storage/' . $path);
            Image::make($public_path)->resize(200,200)->save($public_path);
            $publication->logo = $path;
        }
        $publication->name = $request->name;
        $publication->description = $request->description;
        $publication->slug = '';
        $publication->save();

        $slug = slug_maker($request->name);
        if (Publication::where('slug', $slug)->exists()){
            $publication->slug = $slug . '-' . $publication->id;
        }else{
            $publication->slug = $slug;
        }
        $publication->save();

        Toastr::success('Publication updated', 'Success');
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
            Toastr::error('This publication will not be deleted', 'Sorry');
            return back();
        }

        // product related with this publication will be changed

        $publication = Publication::findOrFail($id);
        Storage::delete($publication->logo);
        $publication->delete();

        Toastr::success('Publication Deleted', 'Success');
        return back();
    }
}
