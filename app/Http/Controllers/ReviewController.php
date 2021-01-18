<?php

namespace App\Http\Controllers;

use App\Product;
use App\Review;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
           'product_id' => 'required',
           'name' => 'required',
           'email' => 'required',
           'ratings' => 'required',
           'review' => 'required',
        ]);

        Review::create([
            'product_id' => $request->product_id,
            'name' => $request->name,
            'email' => $request->email,
            'ratings' => $request->ratings,
            'review' => $request->review,
        ]);

        Toastr::success('রিভিও দেওয়ার জন্য ধন্যবাদ!');
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
        //
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

    // view reviews in admin panel
    public function viewReviews(Request $request, $type = 'all')
    {
        if ($request->search){
            $product = Product::where('product_code', $request->search)->first();


            if (!$product){
                $product_id = null;
            }else{
                $product_id = $product->id;
            }


            if ($type == 'all'){
                $reviews = Review::where([['status', 2], ['product_id', $product_id]])->orderBy('id', 'desc')->paginate(30);
            }else{
                $reviews = Review::where([['status', 1], ['product_id', $product_id]])->orderBy('id', 'desc')->paginate(30);
            }
        }else{
            if ($type == 'all'){
                $reviews = Review::where('status', 2)->orderBy('id', 'desc')->paginate(30);
            }else{
                $reviews = Review::where('status', 1)->orderBy('id', 'desc')->paginate(30);
            }
        }

        return view('admin.pages.reviews', compact('reviews', 'type'));
    }

    // delete review
    public function approveReview(Request $request)
    {
        Review::findOrFail($request->review_id)->update([
            'status' => 2
        ]);

        Toastr::success('Review approved!');
        return back();
    }
    // delete review
    public function deleteReview($id)
    {
        Review::findOrFail($id)->delete();

        Toastr::success('Review Deleted!');
        return back();
    }
}
