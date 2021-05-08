<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\MainCategory;
use App\Order;
use App\OrderStatus;
use App\Product;
use App\Publication;
use App\Role;
use App\SubCategory;
use App\Tag;
use App\Translator;
use App\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role_id != 3) {

            return $this->adminDashboard();

        }else{
            return view('frontend.user.home');
        }
    }

    private function adminDashboard()
    {
        $orderStatus = OrderStatus::with(['pendings', 'processings', 'cancels', 'deliverts'])->get();
        $roles = Role::with(['super_admins', 'managers', 'general_users', 'editors'])->get();

        $data['publications'] = Publication::count();
        $data['writers'] = Writer::count();
        $data['translators'] = Translator::count();
        $data['products'] = Product::count();
        $data['brands'] = Brand::count();
        $data['main_categories'] = MainCategory::count();
        $data['categories'] = Category::count();
        $data['sub_categories'] = SubCategory::count();
        $data['tags'] = Tag::count();

        return view('admin.dashboard',compact(['orderStatus','roles','data']));
    }

    public function account_settings()
    {
        return view('frontend.user.account_settings');
    }

    public function update_account(Request $request)
    {
        $user = User::find(Auth::id());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'phone' => 'required|min:11',
        ],[
            'name.required' => 'নাম দিতে হবে',
            'name.string' => 'একটি সঠিক নাম দিন',
            'name.max' => 'নাম টি বড় হয়ে গেছে, একটি ছোট নাম দিন',

            'email.required' => 'ই-মেইল দেননি',
            'email.string' => 'ই-মেইল টি সঠিক নয়',
            'email.email' => 'ই-মেইল টি সঠিক নয়',
            'email.unique' => 'ই-মেইল টি আগে ব্যবহৃত হয়েছে',

            'password.required' => 'পাসওয়ার্ড দিন',
            'password.min' => 'পাসওয়ার্ড কমপক্ষে ৮ ক্যারেক্টার হতে হবে',
            'password.confirmed' => 'পাসওয়ার্ড এবং কনফার্ম পাসওয়ার্ড মিলেনি',

            'phone.required' => 'আপনার ফোন নাম্বার দিন',
            'phone.min' => 'ফোন নাম্বার কমপক্ষে ১১ ডিজিটের হতে হবে',
        ]);
        if ($request->old_password){
            if (Hash::check($request->old_password, $user->password)){
                if ($request->new_password){
                    $request->validate([
                        'new_password' => 'min:8',
                    ],[
                        'new_password.min' => 'পাসওয়ার্ড কমপক্ষে ৮ ক্যারেক্টার হতে হবে',
                    ]);
                    $user->password = Hash::make($request->new_password);
                }
                $user->email = $request->email;
            }else{
                return back()->with('error_message','আাপনার পুরাতন পাসওয়ার্ডটি মেলেনি!');
            }
        }
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->save();

        return back()->with('message', 'তথ্যগুলো আপডেট হয়েছে।');
    }

    // shopping history
    public function shopping_history()
    {
        $orders = Order::where('user_id', Auth::id())->orderBy('id', 'desc')->get();
        return view('frontend.user.shoping_history', compact('orders'));
    }

    // order details
    public function order_details($order_id)
    {
        $order_details = Order::findOrFail($order_id);

        return view('frontend.user.invoice', compact('order_details'));
    }
}
