<?php

namespace App\Http\Controllers\Admin;

use App\Coupon;
use App\Http\Controllers\Controller;
use App\Publication;
use App\SubCategory;
use App\Writer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['coupons'] = Coupon::orderBy('last_date')->get();
        $data['writers'] = Writer::all();
        $data['publications'] = Publication::all();
        $data['sub_categories'] = SubCategory::all();

        return view('admin.offer.coupons', $data);
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
           'offer_title' => 'required',
           'coupon_code' => 'required|unique:coupons',
           'last_date' => 'required',
           'type' => 'required',
        ]);

        if (!$request->discount_amount && !$request->discount_percent){
            Toastr::error('Amount or Percentage required');
            return back();
        }

        Coupon::create([
            'offer_title' => $request->offer_title,
            'coupon_code' => $request->coupon_code,
            'discount_amount' => $request->discount_amount,
            'discount_percent' => $request->discount_percent,
            'last_date' => $request->last_date,
            'type' => $request->type,
            'sub_category_id' => $request->sub_category_id,
            'writer_id' => $request->writer_id,
            'publication_id' => $request->publication_id,
        ]);

        Toastr::success('Coupon added');
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
        $data['coupon'] = Coupon::findOrFail($id);
        $data['writers'] = Writer::all();
        $data['publications'] = Publication::all();
        $data['sub_categories'] = SubCategory::all();
        return view('admin.offer.edit_coupons', $data);
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
            'offer_title' => 'required',
            'coupon_code' => 'required|unique:coupons,coupon_code,' . $id,
            'last_date' => 'required',
            'type' => 'required',
        ]);

        if (!$request->discount_amount && !$request->discount_percent){
            Toastr::error('Amount or Percentage required');
            return back();
        }

        Coupon::findOrFail($id)->update([
            'offer_title' => $request->offer_title,
            'coupon_code' => $request->coupon_code,
            'discount_amount' => $request->discount_amount,
            'discount_percent' => $request->discount_percent,
            'last_date' => $request->last_date,
            'type' => $request->type,
            'sub_category_id' => $request->sub_category_id,
            'writer_id' => $request->writer_id,
            'publication_id' => $request->publication_id,
        ]);

        Toastr::success('Coupon Updated');
        return redirect(route('manage_coupon.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Coupon::findOrFail($id)->delete();
        Toastr::success('Coupon deleted!');
        return back();
    }
}
