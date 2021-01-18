<?php

namespace App\Http\Controllers\Ecommerce;

use App\Brand;
use App\Category;
use App\Color;
use App\Country;
use App\Http\Controllers\Controller;
use App\Language;
use App\MainCategory;
use App\PageImage;
use App\Product;
use App\ProductImage;
use App\Publication;
use App\Size;
use App\SubCategory;
use App\Tag;
use App\Writer;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search_items = [];
        if ($request->search_by_name){
            $search_items[] = ['title', 'like', '%' . $request->search_by_name . '%'];
        }
        if ($request->search_by_id){
            $search_items[] = ['product_code', $request->search_by_id];
        }
        if ($request->writer){
            $search_items[] = ['writer_id', $request->writer];
        }
        if ($request->type){
            $search_items[] = ['type', $request->type];
        }
        if ($request->stock){
            $stock = $request->stock == 'out' ? 0 : 1;
            $search_items[] = ['stock', $stock];
        }
        if ($request->publication){
            $search_items[] = ['publication_id', $request->publication];
        }
        if ($request->brand){
            $search_items[] = ['brand_id', $request->brand];
        }
        $data['products'] = Product::where($search_items)->orderBy('id', 'desc')->paginate(15);
        if ($request->category){
            $category_type = substr($request->category, 0,3);
            $category_id = substr($request->category, 4);
            if ($category_type == 'mai'){
                $data['products'] = MainCategory::find($category_id)->products()->paginate(15);
            }elseif($category_type == 'cat'){
                $data['products'] = Category::find($category_id)->products()->paginate(15);
            }else{
                $data['products'] = SubCategory::find($category_id)->products()->paginate(15);
            }
        }
        $data['writers'] = Writer::all();
        $data['publications'] = Publication::all();
        $data['main_categories'] = MainCategory::all();
        $data['categories'] = Category::all();
        $data['sub_categories'] = SubCategory::all();
        $data['brands'] = Brand::all();
        return view('admin.product.all_books', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $data['last_used_writers'] = Product::where('writer_id', '!=', null)->select('writer_id')->distinct()->orderBy('id','desc')->take(5)->get();
        $data['last_used_pubs'] = Product::where('publication_id', '!=', null)->select('publication_id')->distinct()->orderBy('id','desc')->take(5)->get();
        $data['writers'] = Writer::all();
        $data['publications'] = Publication::all();
        $data['languages'] = Language::all();
        $data['countries'] = Country::all();
        $data['brands'] = Brand::all();
        $data['main_categories'] = MainCategory::all();
        $data['colors'] = Color::all();
        $data['sizes'] = Size::all();
        $data['tags'] = Tag::all();
        return view('admin.product.add_product', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // input validation
        $this->inputValidation($request);

        // input normal data
        $product = $this->normalFieldInput($request, 'store');

        // product main image upload
        $this->uploadMainImage($request, $product);

        // attach categories and subcategories
        $this->attachCategories($request, $product);

        // add new category
        $this->add_new_category($request, $product);

        // add new writers, tags and publication
        $this->add_new_writerTagPub($request, $product);

        // attach tag, color and size
        $this->attachTagColorSize($request, $product);

        // upload book pages with watermark
        $this->uploadPages($request, $product);

        // upload product images
        $this->uploadProductImages($request, $product);

        if ($request->save){
            $product->status = 0;
            $product->save();
        }

        Toastr::success('Product added', 'Success');
        return back();
    }

    // add new writer, tag and publication
    protected function add_new_writerTagPub($request, $product)
    {
        if ($request->new_writer){
            $writer = new Writer();
            $writer->name = $request->new_writer;
            $writer->save();

            $slug = slug_maker($request->new_writer);
            if (Writer::where('slug', $slug)->exists()){
                $writer->slug = $slug . '-' . $writer->id;
            }else{
                $writer->slug = $slug;
            }
            $writer->save();
            $product->writer_id = $writer->id;
        }

        if ($request->new_publication){
            $publication = new Publication();
            $publication->name = $request->new_publication;
            $publication->save();

            $slug = slug_maker($request->new_publication);
            if (Publication::where('slug', $slug)->exists()){
                $publication->slug = $slug . '-' . $publication->id;
            }else{
                $publication->slug = $slug;
            }
            $publication->save();
            $product->publication_id = $publication->id;
        }

        if ($request->new_tags) {
            if (count($request->new_tags) > 0) {
                foreach ($request->new_tags as $single_tag) {
                    $tag = Tag::create([
                        'title' => $single_tag
                    ]);
                    $product->tags()->syncWithoutDetaching($tag);
                }
            }
        }
        $product->save();
        return;
    }

    // add new category
    protected function add_new_category($request, $product){
        if ($request->new_category){
            if ($request->new_category_parent){
                $get_parent_type = substr($request->new_category_parent, 0, 1);
                $get_parent_id = substr($request->new_category_parent, 2);
                if ($get_parent_type == 'm'){
                    // it will be added to category table
                    $new_item = new Category();
                    $new_item->title = $request->new_category;
                    $new_item->main_category_id = $get_parent_id;
                    $new_item->save();

                    $slug = slug_maker($request->new_category);
                    if (Category::where('slug', $slug)->exists()){
                        $new_item->slug = $slug . '-' . $new_item->id;
                    }else{
                        $new_item->slug = $slug;
                    }
                    $new_item->save();
                    $product->categories()->syncWithoutDetaching($new_item->id);
                }elseif ($get_parent_type == 'c'){
                    // it will be added to sub category table
                    $new_item = new SubCategory();
                    $new_item->title = $request->new_category;
                    $new_item->category_id = $get_parent_id;
                    $new_item->save();

                    $slug = slug_maker($request->new_category);
                    if (SubCategory::where('slug', $slug)->exists()){
                        $new_item->slug = $slug . '-' . $new_item->id;
                    }else{
                        $new_item->slug = $slug;
                    }
                    $new_item->save();
                    $product->sub_categories()->syncWithoutDetaching($new_item->id);
                }
            }else{
                // it will be added to main category table
                $new_item = new MainCategory();
                $new_item->title = $request->new_category;
                $new_item->save();

                $slug = slug_maker($request->new_category);
                if (MainCategory::where('slug', $slug)->exists()){
                    $new_item->slug = $slug . '-' . $new_item->id;
                }else{
                    $new_item->slug = $slug;
                }
                $new_item->save();

                $product->main_categories()->syncWithoutDetaching($new_item->id);
                return;
            }
        }
        return;
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
        $data['writers'] = Writer::all();
        $data['publications'] = Publication::all();
        $data['languages'] = Language::all();
        $data['countries'] = Country::all();
        $data['brands'] = Brand::all();
        $data['main_categories'] = MainCategory::all();
        $data['colors'] = Color::all();
        $data['sizes'] = Size::all();
        $data['tags'] = Tag::all();
        $data['product'] = Product::findOrFail($id);
        return view('admin.product.edit_product', $data);
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
        // input validation
        $this->inputValidation($request);

        // input normal data
        $product = $this->normalFieldInput($request, 'update', $id);

        // product main image upload
        $this->uploadMainImage($request, $product, 'update');

        // attach categories and subcategories
        $this->detachAttributes($product);
        $this->attachCategories($request, $product);

        // attach tag, color and size
        $this->attachTagColorSize($request, $product);

        // upload book pages with watermark
        $this->uploadPages($request, $product);

        // upload product images
        $this->uploadProductImages($request, $product);

        Toastr::success('Product updated', 'Success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        // delete main iamges
        Storage::delete($product->thumbnail);
        Storage::delete($product->main_image);

        // detach all attributes ans categories
        $this->detachAttributes($product);

        // delete page and product images
        $this->deleteImages($product);

        // finally delete the product
        $product->delete();

        Toastr::success('Product Delete', 'Success');
        return back();
    }

    // detach all attributes category and tags
    protected function detachAttributes($product){
        $product->main_categories()->detach();
        $product->categories()->detach();
        $product->sub_categories()->detach();
        $product->tags()->detach();
        $product->sizes()->detach();
        $product->colors()->detach();
        return;
    }

    // delete page image and product images
    protected function deleteImages($product){
        foreach ($product->page_images as $single_page){
            Storage::delete($single_page->path);
            $single_page->delete();
        }
        foreach ($product->product_images as $single_page){
            Storage::delete($single_page->path);
            $single_page->delete();
        }
        return;
    }

    protected function inputValidation($request)
    {
        $request->validate([
            'title' => 'required',
            'regular_price' => 'required',
        ]);
    }

    protected function normalFieldInput($request, $type, $id = null){
        if ($type == 'store'){
            $product = new Product();
        }else{
            $product = Product::find($id);
        }

        $product->title = $request->title;
        $product->slug = ' ';
        $product->user_id = Auth::id();
        $product->sub_title = $request->sub_title;
        $product->banglish_title = $request->banglish_title;
        $product->writer_id = $request->writer_id;
        $product->publication_id = $request->publication_id;
        $product->isbn = $request->isbn;
        $product->edition = $request->edition;
        $product->total_page = $request->total_page;
        $product->country_id = $request->country_id;
        $product->language_id = $request->language_id;
        $product->regular_price = $request->regular_price;
        $product->sale_price = $request->sale_price;
        $product->description = $request->description;
        $product->brand_id = $request->brand_id;
        $product->model = $request->model;
        $product->video_url = $request->video_url;
        $product->weight = $request->weight;
        $product->cover = $request->cover;
        $product->stock = $request->stock ? 1 : 0;
        $product->status = $request->status ? 1 : 0;
        $product->product_code = $request->product_code;
        $product->type = $request->type;

        $product->save();


        $slug = slug_maker($request->title);
        if (Product::where('slug', $slug)->exists()){
            $product->slug = $slug . '-' . $product->id;
        }else{
            $product->slug = $slug;
        }
        $product->save();

        if ($type == 'store') {
            $product->product_code = date('ym') . $product->id;
        }
        $product->save();
        return $product;
    }

    // upload product main image
    protected function uploadMainImage($request, $product, $type = 'store')
    {
        if ($request->hasFile('main_image')){
            if ($type == 'update'){
                Storage::delete($product->main_image);
                Storage::delete($product->thumbnail);
            }
            $path = $request->file('main_image')->store('product_image');
            $public_path = public_path('storage/' . $path);
            if($request->type == 1){
                // book 200x300
                $img = Image::make($public_path)->resize(200,300);
                $img->save();
            }else{
                // others product 100x1000
                $img = Image::make($public_path)->resize(800,800);
                $img->save();
                // thumbnail upload
                $path_thumbnail = $request->file('main_image')->store('thumbnail');
                $public_path_thumbnail = public_path('storage/' . $path_thumbnail);
                $thumbnail = Image::make($public_path_thumbnail)->resize(200,200);
                $thumbnail->save();
                $product->thumbnail = $path_thumbnail;
            }
            $product->main_image = $path;
            $product->save();
        }
        return;
    }

    // attach category and subcategories
    protected function attachCategories($request, $product)
    {

        // attach main categories
        if ($request->main_categories){
            $product->main_categories()->syncWithoutDetaching($request->main_categories);
        }else{
            $product->main_categories()->syncWithoutDetaching([1]);
        }

        // attach categories
        if ($request->categories){
            $product->categories()->syncWithoutDetaching($request->categories);
        }else{
            $product->categories()->syncWithoutDetaching([1]);
        }

        // attach main categories
        if ($request->sub_categories){
            $product->sub_categories()->syncWithoutDetaching($request->sub_categories);
        }else{
            $product->sub_categories()->syncWithoutDetaching([1]);
        }
        return;
    }

    // attach tag, color and size if any
    protected function attachTagColorSize($request, $product)
    {
        // attach tags
        if ($request->tags){
            $product->tags()->syncWithoutDetaching($request->tags);
        }
        // attach colors
        if ($request->colors){
            $product->colors()->syncWithoutDetaching($request->colors);
        }
        // attach sizes
        if ($request->sizes){
            $product->sizes()->syncWithoutDetaching($request->sizes);
        }
        return;
    }

    // upload pages
    protected function uploadPages($request, $product){
        // upload pages
        $watermark = public_path('images/water_mark_logo.png');
        if ($request->hasFile('pages')){
            $all_images = $request->file('pages');
            if (!empty($all_images)) {
                $loop = 0;
                foreach ($all_images as $single_image) {
                    $storage_path = $single_image->store('pages');
                    $public_path = public_path('storage/' . $storage_path);
                    $img = Image::make($public_path)
                        ->resize(750, 1060)
                        ->insert($watermark, 'center');
                    $img->save();
                    PageImage::create([
                       'product_id' => $product->id,
                       'order' => $loop,
                       'path' => $storage_path,
                    ]);
                    $loop += 1;
                }
            }
        }
        return;
    }

    // upload product images
    protected function uploadProductImages($request, $product){
        $watermark = public_path('images/logo.png');
        if ($request->hasFile('images')){
            $all_images = $request->file('images');
            if (!empty($all_images)) {
                $loop = 0;
                foreach ($all_images as $single_image) {
                    $storage_path = $single_image->store('product_image');
                    $public_path = public_path('storage/' . $storage_path);
                    $img = Image::make($public_path)
                        ->resize(800, 800)
                        ->insert($watermark, 'bottom-right', 10, 10);;
                    $img->save();
                    ProductImage::create([
                        'product_id' => $product->id,
                        'path' => $storage_path,
                    ]);
                    $loop += 1;
                }
            }
        }
    }

    // product bulk action
    public function bulk_action(Request $request)
    {
        $request->validate([
           'selected' => 'required'
        ]);
        Product::wherein('id', $request->selected)->update([
            'stock' => $request->action
        ]);
        Toastr::success('Action completed', 'Success');
        return back();
    }

}
