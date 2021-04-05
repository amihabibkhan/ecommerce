<?php

namespace App\Http\Controllers\Attributes;

use App\Brand;
use App\Http\Controllers\Controller;
use App\Publication;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::paginate(20);
        return view('admin.others_attributes.brand', compact('brands'));
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
        $brand = new Brand();
        if ($request->has('image')){
            $request->validate([
                'image' => 'image'
            ]);
            $path = $request->file('image')->store('brand');
            $public_path = public_path('storage/' . $path);
            Image::make($public_path)->resize(200,200)->save($public_path);
            $brand->logo = $path;
        }
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->save();

        $slug = slug_maker($request->name);
        if (Brand::where('slug', $slug)->exists()){
            $brand->slug = $slug . '-' . $brand->id;
        }else{
            $brand->slug = $slug;
        }
        $brand->save();

        Toastr::success('Brand added', 'Success');
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
        $brand = Brand::findOrFail($id);
        if ($request->has('image')){
            $request->validate([
                'image' => 'image'
            ]);
            Storage::delete($brand->logo);
            $path = $request->file('image')->store('brand');
            $public_path = public_path('storage/' . $path);
            Image::make($public_path)->resize(200,200)->save($public_path);
            $brand->logo = $path;
        }
        $brand->name = $request->name;
        $brand->description = $request->description;
        $brand->slug = ' ';
        $brand->save();

        $slug = slug_maker($request->name);
        if (Brand::where('slug', $slug)->exists()){
            $brand->slug = $slug . '-' . $brand->id;
        }else{
            $brand->slug = $slug;
        }
        $brand->save();

        Toastr::success('Brand updated', 'Success');
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
            Toastr::error('This brand will not be deleted', 'Sorry');
            return back();
        }

        // product related with this publication will be changed

        $brand = Brand::findOrFail($id);
        Storage::delete($brand->logo);
        $brand->delete();

        Toastr::success('Brand Deleted', 'Success');
        return back();
    }
}
