<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Offer;
use App\Product;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::orderBy('last_date', 'desc')->get();
        return view('admin.offer.offer', compact('offers'));
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
           'product_code' => 'required',
           'offer_price' => 'required',
           'last_date' => 'required',
        ]);

        $product = Product::where('product_code', $request->product_code)->first();
        if (!$product){
            Toastr::error('Invalid Product ID');
            return back();
        }

        Offer::create([
           'product_id' => $product->id,
           'offer_price' => $request->offer_price,
           'last_date' => $request->last_date,
        ]);

        Toastr::success('Offer Added for this product');
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
        $offer = Offer::findOrFail($id);
        $product_code = $offer->product->product_code;
        return view('admin.offer.edit_offer', compact('offer', 'product_code'));
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
            'product_code' => 'required',
            'offer_price' => 'required',
            'last_date' => 'required',
        ]);

        $product = Product::where('product_code', $request->product_code)->first();
        if (!$product){
            Toastr::error('Invalid Product ID');
            return back();
        }

        Offer::findOrFail($id)->update([
            'product_id' => $product->id,
            'offer_price' => $request->offer_price,
            'last_date' => $request->last_date,
        ]);

        Toastr::success('Offer updated!');
        return redirect()->route('manage_offer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Offer::findOrFail($id)->delete();

        Toastr::success('Offer Deleted!');
        return back();
    }
}
