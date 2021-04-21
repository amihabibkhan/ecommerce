<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Option;
use App\Order;
use App\OrderDetail;
use App\OrderStatus;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

        $order_statuses = OrderStatus::all();


        return view('admin.orders', compact(['orders','order_statuses']));
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
        $options = Option::get();
        $order_details = Order::findOrFail($id);
        return view('admin.invoice', compact(['order_details','options']));
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

    }


    public function order_customize(Request $request){

        $order_id = $request->order_id;

        $request->validate([
            'order_id' => ['required',Rule::exists('orders','id')],
        ]);

        $i = 0;
        foreach($request->order_details_ids as $order_details_id){
            $request->validate([
                $i => [Rule::exists('order_details','id')->where(function($query) use ($order_id){
                    return $query->where('order_id',$order_id);
                })],
            ]);
            $i++;
        }


        foreach($request->order_details_ids as $order_details_id){
            $order_detail = OrderDetail::where([['order_id',$request->order_id],['id',$order_details_id]])->first();
            if($order_detail){
                $qty = "qty_$order_details_id";
                $total = "total_$order_details_id";

                $order_detail->qty = $request->$qty;
                $order_detail->price = $request->$total / $request->$qty;
                $order_detail->total = $request->$total;
                $order_detail->save();
            }
        }

        $order_details = OrderDetail::where('order_id',$request->order_id)->get();

        $order = Order::findOrFail($request->order_id);

        $order->sub_total = $order_details->sum('total');
        $order->shipping_charge = $request->shipping_charge;
        $order->discount = $request->discount;
        $order->total = ($order_details->sum('total') + $request->shipping_charge) + $request->discount;
        $order->updated_by = auth()->id();
        $order->save();

        Toastr::success('Action applied');
        return back();

    }
}
