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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// middleware will be added for admin
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
