<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = [];
        if ($request->id){
            $search[] = ['id', $request->id];
        }
        if ($request->name){
            $search[] = ['name', 'like', '%' . $request->name . '%'];
        }
        if ($request->phone){
            $search[] = ['phone', 'like', '%' . $request->phone . '%'];
        }
        if ($request->date){
            $search[] = ['created_at', 'like',  $request->date . '%'];
        }
        if ($request->total){
            $search[] = ['total', $request->total];
        }
        if ($request->status){
            $search[] = ['status', $request->status];
        }
        if ($request->type == 'new'){
            $orders = Order::where('status', 1)->orderBy('id', 'desc')->paginate(20);
        }else{
            $orders = Order::where($search)->orderBy('id', 'desc')->paginate(20);
        }


        return view('admin.orders', compact('orders'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order_details = Order::findOrFail($id);
        return view('admin.invoice', compact('order_details'));
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
        $order = Order::findOrFail($id);
        $order->status = $request->status;
        $order->save();

        Toastr::success('Action applied');
        return redirect(route('order_processing.index') . '?id=' . $id);
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
}
