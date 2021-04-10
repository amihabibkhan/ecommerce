<?php

namespace App\Http\Controllers\Frontend;

use App\Category;
use App\Homepage;
use App\Http\Controllers\Controller;
use App\MainCategory;
use App\Offer;
use App\Product;
use App\Publication;
use App\Review;
use App\Slider;
use App\SubCategory;
use App\Translator;
use App\User;
use App\Writer;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        $products = Product::orderBy('id')->take(6)->get();
        $sections = Homepage::orderBy('order')->get();
        $writers = Writer::orderBy('id')->take(6)->get();
        $offers = Offer::where('last_date', '>=', date('Y-m-d'))->orderBy('last_date', 'asc')->take(2)->get();
        return view('frontend.index', compact( 'sections', 'writers', 'offers', 'sliders'));
    }

    // single writer
    public function singleWriter($slug)
    {
        $writer = Writer::where('slug', $slug)->firstOrFail();

        $products = Product::where('writer_id', $writer->id)->paginate(18);

        return view('frontend.pages.single_writer', compact('writer', 'products'));
    }

    // single writer
    public function singleTranslator($slug)
    {
        $translator = Translator::where('slug', $slug)->firstOrFail();

        $products = Product::where('translator_id', $translator->id)->paginate(18);

        return view('frontend.pages.single_translator', compact('translator', 'products'));
    }

    // single publication
    public function singlePublication($slug)
    {
        $publication = Publication::where('slug', $slug)->firstOrFail();

        $products = Product::where('publication_id', $publication->id)->paginate(18);

        return view('frontend.pages.single_publication', compact('publication', 'products'));
    }

    // single product
    public function singleProduct($slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();

        $total_review = Review::where([
            ['product_id', $product->id],
            ['status',  2]
        ])->count();

        $average_rating = rating_calculator($product->reviews->sum('ratings'), $total_review);


        $related_product = Product::where('writer_id', $product->writer_id)
                            ->orWhere('publication_id', $product->publication_id)
                            ->paginate(4);
        return view('frontend.pages.single_product', compact( 'product', 'total_review', 'average_rating', 'related_product'));
    }

    // single category page view
    public function singleCategory(Request $request, $slug)
    {
        if ($request->sort_by == 'name_a_to_z'){
            $category = Category::where('slug', $slug)->with(['products' => function($query){
                $query->orderBy('products.title');
            }])->firstOrFail();
        }elseif($request->sort_by == 'name_z_to_a'){
            $category = Category::where('slug', $slug)->with(['products' => function($query){
                $query->orderBy('products.title', 'desc');
            }])->firstOrFail();
        }elseif($request->sort_by == 'price_high_to_low'){
            $category = Category::where('slug', $slug)->with(['products' => function($query){
                $query->orderBy('products.regular_price', 'desc');
            }])->firstOrFail();
        }elseif($request->sort_by == 'price_low_to_high'){
            $category = Category::where('slug', $slug)->with(['products' => function($query){
                $query->orderBy('products.regular_price');
            }])->firstOrFail();
        }elseif($request->sort_by == 'new_first'){
            $category = Category::where('slug', $slug)->with(['products' => function($query){
                $query->orderBy('products.created_at');
            }])->firstOrFail();
        }elseif($request->sort_by == 'old_first'){
            $category = Category::where('slug', $slug)->with(['products' => function($query){
                $query->orderBy('products.created_at', 'desc');
            }])->firstOrFail();
        }else{
            $category = Category::where('slug', $slug)->firstOrFail();
        }

        $products = $category->products()->paginate(18);
        return view('frontend.pages.single_category', compact('category', 'products', 'request'));
    }

    // single category page view
    public function singleMainCategory(Request $request, $slug)
    {
        if ($request->sort_by == 'name_a_to_z'){
            $category = MainCategory::where('slug', $slug)->with(['products' => function($query){
                $query->orderBy('products.title');
            }])->firstOrFail();
        }elseif($request->sort_by == 'name_z_to_a'){
            $category = MainCategory::where('slug', $slug)->with(['products' => function($query){
                $query->orderBy('products.title', 'desc');
            }])->firstOrFail();
        }elseif($request->sort_by == 'price_high_to_low'){
            $category = MainCategory::where('slug', $slug)->with(['products' => function($query){
                $query->orderBy('products.regular_price', 'desc');
            }])->firstOrFail();
        }elseif($request->sort_by == 'price_low_to_high'){
            $category = MainCategory::where('slug', $slug)->with(['products' => function($query){
                $query->orderBy('products.regular_price');
            }])->firstOrFail();
        }elseif($request->sort_by == 'new_first'){
            $category = MainCategory::where('slug', $slug)->with(['products' => function($query){
                $query->orderBy('products.created_at');
            }])->firstOrFail();
        }elseif($request->sort_by == 'old_first'){
            $category = MainCategory::where('slug', $slug)->with(['products' => function($query){
                $query->orderBy('products.created_at', 'desc');
            }])->firstOrFail();
        }else{
            $category = MainCategory::where('slug', $slug)->firstOrFail();
        }

        $products = $category->products()->paginate(18);
        return view('frontend.pages.single_category', compact('category', 'products', 'request'));
    }

    // book shop page
    public function bookShop(Request $request)
    {
        $data['pubs'] = $data['selected_writers'] = $data['topics'] = [];
        if ($request->pubs){
            $data['pubs'] = $request->pubs;
        }
        if ($request->selected_writers){
            $data['selected_writers'] = $request->selected_writers;
        }
        if ($request->topics){
            $data['topics'] = $request->topics;
        }

        if($request->sort_by == 'name_a_to_z'){
            $order_by = 'title';
            $order_to = 'asc';
        }elseif($request->sort_by == 'name_z_to_a'){
            $order_by = 'title';
            $order_to = 'desc';
        }elseif($request->sort_by == 'price_high_to_low'){
            $order_by = 'regular_price';
            $order_to = 'desc';
        }elseif($request->sort_by == 'price_low_to_high'){
            $order_by = 'regular_price';
            $order_to = 'asc';
        }elseif($request->sort_by == 'new_first'){
            $order_by = 'created_at';
            $order_to = 'asc';
        }elseif($request->sort_by == 'old_first'){
            $order_by = 'created_at';
            $order_to = 'desc';
        }else{
            $order_by = 'id';
            $order_to = 'desc';
        }


        $data['request'] = $request;


        if (count($data['pubs']) > 0 && count($data['selected_writers']) > 0){
            $data['products'] = Product::whereHas('sub_categories', function ($query) use(&$data){
                    if (count($data['topics']) > 0){
                        $query->whereIn('sub_categories.id', $data['topics']);
                    }
                })
                ->whereIn('publication_id', $data['pubs'])
                ->whereIn('writer_id', $data['selected_writers'])
                ->orderBy($order_by, $order_to)
                ->paginate(12);
        } elseif (count($data['pubs']) > 0){
            $data['products'] = Product::whereHas('sub_categories', function ($query) use(&$data){
                    if (count($data['topics']) > 0){
                        $query->whereIn('sub_categories.id', $data['topics']);
                    }
                })
                ->whereIn('publication_id', $data['pubs'])
                ->orderBy($order_by, $order_to)
                ->paginate(12);
        }elseif (count($data['selected_writers']) > 0){
            $data['products'] = Product::whereHas('sub_categories', function ($query) use(&$data){
                    if (count($data['topics']) > 0){
                        $query->whereIn('sub_categories.id', $data['topics']);
                    }
                })
                ->whereIn('writer_id', $data['selected_writers'])
                ->orderBy($order_by, $order_to)
                ->paginate(12);
        }else{
            $data['products'] = Product::whereHas('sub_categories', function ($query) use(&$data){
                    if (count($data['topics']) > 0){
                        $query->whereIn('sub_categories.id', $data['topics']);
                    }
                })
                ->orderBy($order_by, $order_to)
                ->paginate(12);
        }

        if ($request->search){
            $data['products'] = Product::where('title', 'like', '%' . $request->search . '%')
                ->orWhere('banglish_title', 'like', '%' . $request->search . '%')
                ->orWhere('product_code', 'like', $request->search)
                ->paginate(12);
        }

        $data['writers'] = Writer::all();
        $data['publications'] = Publication::all();
        $data['sub_categories'] = SubCategory::all();

        $data['title'] = 'সকল বই';
        return view('frontend.pages.book_shop', $data);
    }

    // all offer page view
    public function allOffer()
    {
        $data['offers'] = Offer::where('last_date', '>=', date('Y-m-d'))->orderBy('last_date', 'asc')->paginate(12);
        $data['page_title'] = "অফার সমূহ";
        return view('frontend.pages.all_offers', $data);
    }

    // all writers list
    public function allWriters(Request $request)
    {
        $data['title'] = "লেখক তালিকা";
        $data['writers'] = Writer::paginate(18);
        if ($request->search_by_name){
            $data['writers'] = Writer::where('name', 'like', '%' . $request->search_by_name . '%')->paginate(18);
        }
        return view('frontend.pages.all_writer', $data);
    }
    // all publications list
    public function allPublications(Request $request)
    {
        $data['title'] = "প্রকাশনী তালিকা";
        $data['publications'] = Publication::paginate(20);
        if ($request->search_by_name){
            $data['publications'] = Publication::where('name', 'like', '%' . $request->search_by_name . '%')->paginate(18);
        }
        return view('frontend.pages.all_publications', $data);
    }

    // user registration page view
    public function user_register()
    {
        return view('auth.user_register');
    }

    // user registration
    public function user_register_post(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'phone' => ['required', 'min:11'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect(route('home'));
    }
}


