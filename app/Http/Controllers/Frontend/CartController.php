<?php

namespace App\Http\Controllers\Frontend;

use App\Coupon;
use App\Http\Controllers\Controller;
use App\Product;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        // add to cart
        $request->validate([
           'product_id' => 'required',
           'qty' => 'required',
        ]);

        $product = Product::findOrFail($request->product_id);
        Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'qty' => $request->qty,
            'weight' => 0,
            'price' => $product->sale_price ?? $product->regular_price,
            'options' => [
                'image' => $product->thumbnail ?? $product->main_image,
                'slug' => $product->slug,
                'writer_id' => $product->writer_id,
                'publication_id' => $product->publication_id,
            ]
        ]);

        Toastr::success('Product added to cart!');
        return back();
    }

    public function updateCart(Request $request)
    {
        // update total to cart
        Cart::update($request->rowId, $request->qty);

        Toastr::success('Cart Updated!');
        return back();
    }

    public function removeCartItem($rowId)
    {
        // remove cart item
        Cart::remove($rowId);

        Toastr::success('Product removed from cart!');
        return back();
    }

    // show cart page
    public function showCart(Request $request)
    {
        $coupon = false;
        if ($request->coupon_code){
            $coupon_check = $this->checkCoupon($request);
            if ($coupon_check){
                Toastr::success('Coupon added!');
                $coupon = Coupon::where('coupon_code', $request->coupon_code)->first();
            }else{
                Toastr::error('Sorry! invalid coupon code');
            }
        }
        return view('frontend.pages.cart_n_checkout.cart', compact('coupon'));
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
