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

Route::get('/', 'Frontend\FrontendController@index')->name('index');
Route::resource('account_management', 'User\AccountController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=> 'admin'], function (){
    Route::resource('manage_main_category', 'Category\MaincategoryController');
    Route::resource('manage_category', 'Category\CategoryController');
    Route::resource('manage_sub_category', 'Category\SubcategoryController');

    Route::resource('manage_writer', 'Book\WriterController');
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
});
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
