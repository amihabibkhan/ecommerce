<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



//
//Route::get('/config-clear', function() {
//    $status = Artisan::call('config:clear');
//    return '<h1>Configurations cleared</h1>';
//});
//
//Route::get('/cache-clear', function() {
//    $status = Artisan::call('cache:clear');
//    return '<h1>Configurations cache cleared</h1>' . $status;
//});
//
//Route::get('/config-cache', function() {
//    $status = Artisan::call('config:cache');
//    return '<h1>Configurations cached</h1>' . $status;
//});
//
//Route::get('/storage-link', function() {
//    $status = Artisan::call('storage:link');
//    return '<h1>Storage Linked</h1>';
//});
//Route::get('/migrate', function() {
//    $status = Artisan::call('migrate', [
//        '--force' => true
//    ]);
//    return '<h1>Migrated</h1>';
//});
//
//Route::get('/db-seed', function() {
//    $status = Artisan::call('db:seed', [
//        '--force' => true
//    ]);
//    return '<h1>Seeded</h1>';
//});




Route::get('/', 'Frontend\FrontendController@index')->name('index');
Route::get('/search', 'Frontend\FrontendController@search')->name('search');
Route::get('/book/writer/{slug}', 'Frontend\FrontendController@singleWriter')->name('frontend.singleWriter');
Route::get('/book/translator/{slug}', 'Frontend\FrontendController@singleTranslator')->name('frontend.singleTranslator');
Route::get('/book/publication/{slug}', 'Frontend\FrontendController@singlePublication')->name('frontend.singlePublication');
Route::get('/product/{slug}', 'Frontend\FrontendController@singleProduct')->name('frontend.singleProduct');
Route::get('/category-view/{slug}', 'Frontend\FrontendController@singleCategory')->name('frontend.singleCategory');
Route::get('/category/{slug}', 'Frontend\FrontendController@singleMainCategory')->name('frontend.singleMainCategory');
Route::get('/book/book_shop', 'Frontend\FrontendController@bookShop')->name('frontend.bookShop');
Route::get('/book/weekly_offers', 'Frontend\FrontendController@allOffer')->name('frontend.allOffer');
Route::get('/book/all_writers', 'Frontend\FrontendController@allWriters')->name('frontend.allWriters');
Route::get('/book/all_publications', 'Frontend\FrontendController@allPublications')->name('frontend.allPublications');

Route::get('/user_register', 'Frontend\FrontendController@user_register')->name('user_register');
Route::post('/user_register', 'Frontend\FrontendController@user_register_post')->name('user_register_post');


// cart routes
Route::post('/add-to-cart', 'Frontend\CartController@addToCart')->name('add_to_cart');
Route::post('/update-cart', 'Frontend\CartController@updateCart')->name('update_cart');
Route::post('/remove-cart-item/', 'Frontend\CartController@removeCartItem')->name('remove_cart_item');
Route::get('/show_cart', 'Frontend\CartController@showCart')->name('show_cart');
Route::get('/checkout', 'Frontend\CheckoutController@checkoutPage')->name('checkout_page');


Route::resource('manage_review', 'ReviewController');
Route::resource('account_management', 'User\AccountController'); // not using - may be delete
Route::resource('order_management', 'OrderController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/account_settings', 'HomeController@account_settings')->name('account_settings');
Route::post('/update_account', 'HomeController@update_account')->name('update_account');
Route::get('/shopping_history', 'HomeController@shopping_history')->name('shopping_history');
Route::get('/order_details/{order_id}', 'HomeController@order_details')->name('order_details');


Route::group(['middleware'=> 'admin'], function (){
    Route::resource('manage_options', 'Admin\OptionController');
    Route::resource('manage_user', 'Admin\UserController'); // show for delete
    Route::resource('manage_home_page', 'Admin\HomepageController');
    Route::resource('manage_slider', 'Admin\SliderController');

    Route::get('manage_admin_review/view/{type?}', 'ReviewController@viewReviews')->name('admin.viewReviews');
    Route::post('manage_admin_review/changeStatus', 'ReviewController@approveReview')->name('admin.approve_review');
    Route::get('manage_admin_review/delete/{id}', 'ReviewController@deleteReview')->name('admin.delete_review');
});


Route::group(['middleware'=> 'editor'], function (){
    Route::resource('manage_main_category', 'Category\MaincategoryController');
    Route::resource('manage_category', 'Category\CategoryController');
    Route::resource('manage_sub_category', 'Category\SubcategoryController');

    Route::resource('manage_writer', 'Book\WriterController');
    Route::resource('manage_translator', 'Book\TranslatorController');
    Route::resource('manage_publications', 'Book\PublicationController');
    Route::resource('manage_languages', 'Book\LanguageController');
    Route::resource('manage_countries', 'Book\CountryController');

    Route::resource('manage_brands', 'Attributes\BrandController');
    Route::resource('manage_colors', 'Attributes\ColorController');
    Route::resource('manage_sizes', 'Attributes\SizeController');
    Route::resource('manage_tags', 'Attributes\TagController');

    Route::resource('manage_products', 'Ecommerce\ProductController');
    Route::post('manage_product_bulk_cation', 'Ecommerce\ProductController@bulk_action')->name('manage_product.bulk_action');
    Route::resource('manage_product_image', 'Image\ProductimageController'); // edit method for delete one and show for delete all
    Route::resource('manage_product_page', 'Image\ProductpageController'); // edit method for delete one and show for delete all

    Route::get('settings','Admin\SettingController@index')->name('settings');
    Route::post('settings.password','Admin\SettingController@password')->name('settings.password');
    Route::post('settings.user_info','Admin\SettingController@user_info')->name('settings.user_info');
});

Route::group(['middleware'=> 'manager'], function (){
    Route::resource('manage_offer', 'Admin\OfferController');
    Route::resource('manage_coupon', 'Admin\CouponController');
    Route::resource('order_processing', 'Admin\OrderController');
    Route::post('order_customize', 'Admin\OrderController@order_customize')->name('order_customize');
});





Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
