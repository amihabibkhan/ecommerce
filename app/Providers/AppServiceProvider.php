<?php

namespace App\Providers;

use App\Category;
use App\MainCategory;
use App\Product;
use App\Publication;
use App\SubCategory;
use App\Writer;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('*', function ($view){
            $main_menu = MainCategory::all();
            $cart = Cart::content();
            $writers = Writer::orderBy('id', 'desc')->take(5)->get();
            $menu_writers = Writer::orderBy('id')->take(27)->get();
            $menu_pubs = Publication::orderBy('id')->take(27)->get();
            $menu_topics = SubCategory::orderBy('id')->take(27)->get();
            $book_menu = Category::where('main_category_id', 2)->get();
            $books = Product::where('type', 1)->orderBy('id', 'desc')->take(5)->get();
            $view->with('main_menu', $main_menu)
                ->with('cart', $cart)
                ->with('footer_books', $books)
                ->with('book_menu', $book_menu)
                ->with('menu_writers', $menu_writers)
                ->with('menu_pubs', $menu_pubs)
                ->with('menu_topics', $menu_topics)
                ->with('footer_writers', $writers);
        });
    }
}
