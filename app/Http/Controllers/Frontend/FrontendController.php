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
use App\VisitedProduct;
use App\Writer;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
    public function singleProduct(Request $request,$slug)
    {
        $product = Product::with(['main_categories','page_images'])->where('slug', $slug)->firstOrFail();

        $total_review = Review::where([
            ['product_id', $product->id],
            ['status',  2]
        ])->count();

        $page_type = true;

        $average_rating = rating_calculator($product->reviews->sum('ratings'), $total_review);

        $related_product = Product::where('writer_id', $product->writer_id)
                            ->orWhere('publication_id', $product->publication_id)
                            ->paginate(4);
        $single_product = $product;

        return view('frontend.pages.single_product', compact( 'product', 'single_product','total_review', 'average_rating', 'related_product','page_type'));
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
        $data['request'] = $request;
        $data['writers'] = Writer::all();
        $data['publications'] = Publication::all();
        $data['sub_categories'] = SubCategory::all();

        $data['title'] = 'সকল বই';
        $data['query_url'] = parse_url(url()->full(),PHP_URL_QUERY);

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


