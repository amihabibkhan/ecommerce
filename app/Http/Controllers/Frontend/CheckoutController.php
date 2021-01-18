<?php

namespace App\Http\Controllers\Frontend;

use App\Coupon;
use App\Courier;
use App\District;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    // view checkout page
    public function checkoutPage(Request $request)
    {
        if (count(Cart::content()) < 1){
            Toastr::error('No Product in cart');
            return redirect(route('show_cart'));
        }

        $coupon = false;
        if ($request->coupon_code){
            $coupon_check = $this->checkCoupon($request);
            if ($coupon_check){
                $coupon = Coupon::where('coupon_code', $request->coupon_code)->first();
            }
        }

        $districts = District::all();
        $couriers = Courier::all();
        return view('frontend.pages.cart_n_checkout.checkout', compact('couriers', 'coupon', 'districts'));
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
}
