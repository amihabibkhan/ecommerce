<?php

namespace App\Http\Controllers;

use App\Notifications\Admin\NewOrderNotification;
use App\Coupon;
use App\Courier;
use App\Order;
use App\OrderDetail;
use App\User;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
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
           'name' => 'required',
           'email' => 'required',
           'phone' => 'required',
           'district_id' => 'required',
           'full_address' => 'required',
           'courier_id' => 'required',
        ]);

        if($request->diff_shipping_address_checkbox == 'true'){
            $request->validate([
                'shipping_name' => 'required',
                'shipping_email' => 'required',
                'shipping_phone' => 'required',
                'shipping_district_id' => 'required',
                'shipping_full_address' => 'required',
            ]);
        }

        $order = new Order();

        if ($request->account_create){
            $request->validate([
               'password' => ['required', 'string', 'min:8']
            ]);

            // create account if required
            $user = $this->createAccount($request);
            $order->user_id = $user->id;
        }
        $shipping_charge = Courier::find($request->courier_id)->cost;
        $discount = 0;
        $discount_type = '';
        $sub_total = Cart::subtotal(0, '', '');
        if ($request->coupon_code){
            $coupon_check = $this->checkCoupon($request);
            if ($coupon_check){
                $coupon = Coupon::where('coupon_code', $request->coupon_code)->first();
                $discount = $coupon->discount_amount ? $coupon->discount_amount : ($sub_total * $coupon->discount_percent / 100);
                $discount_type = 'Coupon';
            }
        }

        if (Auth::check()){
            $order->user_id = Auth::id();
        }

        $order->courier_id = $request->courier_id;

        $order->district_id = $request->district_id;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->emergency_phone = $request->emergency_phone;
        $order->full_address = $request->full_address;
        $order->note = $request->note;

        if($request->diff_shipping_address_checkbox == 'true'){
            $order->shipping_district_id = $request->shipping_district_id;
            $order->shipping_name = $request->shipping_name;
            $order->shipping_email = $request->shipping_email;
            $order->shipping_phone = $request->shipping_phone;
            $order->shipping_emergency_phone = $request->shipping_emergency_phone;
            $order->shipping_full_address = $request->shipping_full_address;
            $order->shipping_note = $request->shipping_note;
        }else{
            $order->shipping_district_id = $request->district_id;
            $order->shipping_name = $request->name;
            $order->shipping_email = $request->email;
            $order->shipping_phone = $request->phone;
            $order->shipping_emergency_phone = $request->emergency_phone;
            $order->shipping_full_address = $request->full_address;
            $order->shipping_note = $request->note;
        }

        $order->shipping_charge = $shipping_charge;
        $order->payment_method = 'Cash On Delivery';
        $order->discount = $discount;
        $order->sub_total = $sub_total;
        $order->total = $sub_total + $shipping_charge - $discount;
        $order->discount_type = $discount_type;
        $order->save();

        // add product detail
         $this->productDetail($order);

        $admins = User::where('role_id','<=',3)->get();

        foreach($admins as $admin){
            Notification::send($admin,new NewOrderNotification($order));
        }

         // empty cart
        Cart::destroy();

         Toastr::success('ধন্যবাদ। অর্ডারটি সম্পন্ন হয়েছে। অনুগ্রহ করে অপেক্ষা করুন।');
         return redirect(route('frontend.bookShop'));
    }

    public function productDetail($order)
    {
        foreach (Cart::content() as $single_item){
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $single_item->id,
                'price' => $single_item->price,
                'qty' => $single_item->qty,
                'total' => $single_item->price * $single_item->qty,
            ]);
        }
    }

    public function createAccount($request)
    {
        $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
           'phone' => $request->phone,
           'password' => Hash::make($request->password),
            'role_id' => 3
        ]);

        return $user;
    }

    // check coupon
    public function checkCoupon($request)
    {
        $coupon = Coupon::where([['coupon_code', $request->coupon_code], ['last_date', '>=', date('Y-m-d')]])->first();
        $cart_items = Cart::content();
        if (!$coupon){
            return false;
        }else{
            if ($coupon->type == 4){
                // for all
                return true;
            }elseif($coupon->type == 1){
                // for sub_category
                $products_under_coupon = $coupon->sub_category->products;
                $ids = [];
                foreach ($products_under_coupon as $single_product){
                    $ids[]= $single_product->id;
                }
                foreach ($cart_items as $item){
                    if (!in_array($item->id, $ids)){
                        return false;
                    }
                }
                return true;
            }elseif($coupon->type == 2){
                // for writer
                foreach ($cart_items as $item){
                    if ($item->options->writer_id != $coupon->writer_id){
                        return false;
                    }
                }
                return true;
            }elseif($coupon->type == 3){
                // for publication
                foreach ($cart_items as $item){
                    if ($item->options->publication_id != $coupon->publication_id){
                        return false;
                    }
                }
                return true;
            }
        }
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
}
