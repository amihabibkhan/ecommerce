@extends('layouts.app')

@section('page_title') Update Product @endsection

@section('main_content')
    <form action="{{ route('manage_products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-heading bg-purple">
                        <h3 class="card-title text-white" style="font-size: 20px">
                            Title and Description
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group m-b-20">
                            <label for="title">Product Title</label>
                            <input type="text" name="title" value="{{ old('title', $product->title) }}" class="form-control" id="title" placeholder="Enter title">
                        </div>
                        <div class="form-group m-b-20">
                            <label for="sub_title">Product Sub Title</label>
                            <input type="text" name="sub_title" {{ old('sub_title', $product->sub_title) }} class="form-control" id="sub_title" placeholder="Enter sub title">
                        </div>
                        <div class="form-group m-b-20">
                            <label>Product Description</label>
                            <textarea id="description" name="description" class="form-control">{!! old('description', $product->description) !!}</textarea>
                        </div>
                        <div class="form-group m-b-20">
                            <label>Main Image (Cover Photo 200x300 | General Product 800x800)</label>
                            <input type="file" class="dropify" name="main_image" data-default-file="{{ asset('storage') }}/{{ $product->main_image }}" data-height="210" />
                        </div>
                        <div class="form-group m-b-20">
                            <label for="videourl">Product Video URL (Youtube)</label>
                            <input type="text" class="form-control" value="{{ old('video_url', $product->video_url  ) }}" name="video_url" id="videourl" placeholder="Enter url..">
                        </div>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                    </div>
                </div> <!-- end p-20 -->
            </div> <!-- end col -->
            <div class="col-md-4">
                {{-- categories --}}
                <div class="portlet">
                    <a data-toggle="collapse" href="#categories">
                        <div class="portlet-heading bg-purple">
                            <h3 class="portlet-title">
                                Categories and Subjects
                            </h3>
                            <div class="portlet-widgets">
                                <i class="ion ion-md-remove"></i>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                    <div id="categories" class="panel-collapse collapse show">
                        <div class="portlet-body">
                            <div style="overflow-y: scroll; max-height: 200px">
                                @foreach($main_categories as $main_category)
                                    @if($main_category->id == 1)
                                        @continue
                                    @endif
                                    <ul class="category_show">
                                        <li>
                                            <div class="checkbox checkbox-success">
                                                <input type="checkbox" name="main_categories[]" {{ $main_category->products()->find($product->id) ? 'checked' : '' }} id="main{{ $main_category->id }}" value="{{ $main_category->id }}">
                                                <label for="main{{ $main_category->id }}">{{ $main_category->title }}</label>
                                            </div>
                                            @foreach($main_category->categories as $category)
                                                <ul>
                                                    <li>
                                                        <div class="checkbox checkbox-pink">
                                                            <input type="checkbox" name="categories[]" {{ $category->products()->find($product->id) ? 'checked' : '' }} id="cat{{ $category->id }}" value="{{ $category->id }}">
                                                            <label for="cat{{ $category->id }}">{{ $category->title }}</label>
                                                        </div>
                                                        @foreach($category->sub_categories as $sub_category)
                                                            <ul>
                                                                <li>
                                                                    <div class="checkbox checkbox-purple">
                                                                        <input type="checkbox" name="sub_categories[]" {{ $sub_category->products()->find($product->id) ? 'checked' : '' }} id="sub{{ $sub_category->id }}" value="{{ $sub_category->id }}">
                                                                        <label for="sub{{ $sub_category->id }}">{{ $sub_category->title }}</label>
                                                                    </div>
                                                                </li>
                                                            </ul>
                                                        @endforeach
                                                    </li>
                                                </ul>
                                            @endforeach
                                        </li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- book --}}
                <div class="portlet">
                    <a data-toggle="collapse" href="#book_info">
                        <div class="portlet-heading bg-purple">
                            <h3 class="portlet-title">
                                Book Info
                            </h3>
                            <div class="portlet-widgets">
                                <i class="ion ion-md-remove"></i>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                    <div id="book_info" class="panel-collapse collapse show">
                        <div class="portlet-body">
                            <div class="form-group m-b-20">
                                <label class="m-b-10">Product Type</label>
                                <br/>
                                <div class="radio radio-info form-check-inline pl-2">
                                    <input type="radio" id="p_book" value="1"
                                           name="type" {{ $product->type == 1 ? 'checked' : '' }}>
                                    <label for="p_book"> Book </label>
                                </div>
                                <div class="radio radio-info form-check-inline pl-2">
                                    <input type="radio" id="p_others" value="2"
                                           name="type" {{ $product->type == 2 ? 'checked' : '' }}>
                                    <label for="p_others"> Others </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Writer</label>
                                <select class="select2 form-control" name="writer_id">
                                    <option disabled selected>Select a Writer</option>
                                    @foreach($writers as $writer)
                                        <option {{ old('writer_id', $product->writer_id) == $writer->id ? 'selected' : '' }} value="{{ $writer->id }}">{{ $writer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Publication</label>
                                <select class="select2 form-control" name="publication_id">
                                    <option disabled selected>Select a Publication</option>
                                    @foreach($publications as $publication)
                                        <option {{ old('publication_id', $product->publication_id) == $publication->id ? 'selected' : '' }} value="{{ $publication->id }}">{{ $publication->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">ISBN Number</label>
                                <input type="text" class="form-control" value="{{ old('isbn', $product->isbn) }}" name="isbn">
                            </div>
                            <div class="form-group">
                                <label for="">Edition</label>
                                <input type="text" class="form-control" value="{{ old('edition', $product->edition) }}" name="edition" placeholder="ex: 1st, 15th etc">
                            </div>
                            <div class="form-group">
                                <label for="">Total Page</label>
                                <input type="number" class="form-control" value="{{ old('total_page', $product->total_page) }}" name="total_page">
                            </div>
                            <div class="form-group">
                                <label for="">Language</label>
                                <select class="select2 form-control" name="language_id">
                                    @foreach($languages as $language)
                                        <option {{ old('language_id', $product->language_id) == $language->id ? 'selected' : '' }} value="{{ $language->id }}">{{ $language->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Others info --}}
                <div class="portlet">
                    <a data-toggle="collapse" href="#others_info">
                        <div class="portlet-heading bg-purple">
                            <h3 class="portlet-title">
                                Price and Others Info
                            </h3>
                            <div class="portlet-widgets">
                                <i class="ion ion-md-remove"></i>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                    <div id="others_info" class="panel-collapse collapse">
                        <div class="portlet-body">
                            <div class="form-group">
                                <label for="">Regular Price</label>
                                <input type="number" class="form-control" value="{{ old('regular_price', $product->regular_price) }}" name="regular_price">
                            </div>
                            <div class="form-group">
                                <label for="">Sale Price (Optional)</label>
                                <input type="number" class="form-control" value="{{ old('sale_price', $product->sale_price) }}" name="sale_price">
                            </div>
                            <div class="form-group">
                                <label for="">Product Country (Optional)</label>
                                <select class="select2 form-control" name="country_id">
                                    @foreach($countries as $country)
                                        <option {{ old('country_id', $product->country_id) == $country->id ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Brand</label>
                                <select class="select2 form-control" name="brand_id">
                                    <option disabled selected>Select a brand</option>
                                    @foreach($brands as $brand)
                                        <option {{ old('brand_id', $product->brand_id) == $brand->id ? 'selected' : '' }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">MODEL NO.</label>
                                <input type="text" class="form-control" value="{{ old('model', $product->model) }}" name="model">
                            </div>
                            <div class="form-group">
                                <label for="">Product Code</label>
                                <input type="text" class="form-control" value="{{ old('product_code', $product->product_code) }}" name="product_code">
                            </div>
                            <div class="form-group">
                                <label for="">Weight (gm)</label>
                                <input type="number" class="form-control" value="{{ old('weight', $product->weight) }}" name="weight">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="" class="mr-2">Stock Available</label>
                                        <input type="checkbox" name="stock" {{ $product->stock ? 'checked' : '' }} data-plugin="switchery" data-color="#64b0f2" data-size="small"/>
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="mr-2">Publish</label>
                                        <input type="checkbox" name="status" {{ $product->status ? 'checked' : '' }} data-plugin="switchery" data-color="#64b0f2" data-size="small"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- attributes --}}
                <div class="portlet">
                    <a data-toggle="collapse" href="#attributes">
                        <div class="portlet-heading bg-purple">
                            <h3 class="portlet-title">
                                Attributes
                            </h3>
                            <div class="portlet-widgets">
                                <i class="ion ion-md-remove"></i>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                    <div id="attributes" class="panel-collapse collapse">
                        <div class="portlet-body">
                            <div class="form-group">
                                <label for="">Tags</label>
                                <select name="tags[]" class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose tags...">
                                    @foreach($tags as $tag)
                                        @if($tag->id == 1)
                                            @continue
                                        @endif
                                        <option {{ $tag->products()->find($product->id) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Colors</label>
                                <select name="colors[]" class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose colors ...">
                                    @foreach($colors as $color)
                                        @if($color->id == 1)
                                            @continue
                                        @endif
                                        <option {{ $color->products()->find($product->id) ? 'selected' : '' }} value="{{ $color->id }}">{{ $color->color_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Sizes</label>
                                <select name="sizes[]" class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose sizes...">
                                    @foreach($sizes as $size)
                                        @if($size->id == 1)
                                            @continue
                                        @endif
                                        <option {{ $size->products()->find($product->id) ? 'selected' : '' }} value="{{ $size->id }}">{{ $size->title }} ({{ $size->size }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- images and pages --}}
                <div class="portlet">
                    <a data-toggle="collapse" href="#page_and_images">
                        <div class="portlet-heading bg-purple">
                            <h3 class="portlet-title">
                                Product Image and pages
                            </h3>
                            <div class="portlet-widgets">
                                <i class="ion ion-md-remove"></i>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                    <div id="page_and_images" class="panel-collapse collapse">
                        <div class="portlet-body">
                            <div class="form-group">
                                <label for="">Product Images (Select multiple item)</label>
                                <input type="file" class="form-control" name="images[]" multiple>
                                <div class="row mt-3">
                                    @foreach($product->product_images as $single_image)
                                        <div class="col-4 mb-3 img_container">
                                            <img src="{{ asset('storage') }}/{{ $single_image->path }}" style="width: 100%" alt="">
                                            <div class="overlay_delete">
                                                <a href="{{ route('manage_product_image.edit', $single_image->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this image?')">DELETE</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="text-center {{ count($product->product_images) > 0 ? '' : 'd-none' }}"><a href="{{ route('manage_product_image.show', $product->id) }}" onclick="return confirm('Are you sure to delete all image?')" style="padding: 2px 5px; background-color: red; color: #fff;">Delete all images</a></div>
                            </div>
                            <div class="form-group mb-0">
                                <label for="">Page Images (Select multiple item)</label>
                                <input type="file" class="form-control" multiple name="pages[]">
                                <div class="row mt-3">
                                    @foreach($product->page_images as $single_image)
                                        <div class="col-4 mb-3 img_container">
                                            <img src="{{ asset('storage') }}/{{ $single_image->path }}" style="width: 100%" alt="">
                                            <div class="overlay_delete">
                                                <a href="{{ route('manage_product_page.edit', $single_image->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this image?')">DELETE</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="text-center {{ count($product->page_images) > 0 ? '' : 'd-none' }}"><a href="{{ route('manage_product_page.show', $product->id) }}" onclick="return confirm('Are you sure to delete all image?')" style="padding: 2px 5px; background-color: red; color: #fff;">Delete all images</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('plugin_css')
    <!-- Summernote css -->
    <link href="{{ asset('admin/plugins') }}/summernote/summernote-bs4.css" rel="stylesheet" />

    <!-- Select2 -->
    <link href="{{ asset('admin/plugins') }}/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

    <!-- dropify css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins') }}/dropify/css/dropify.css" />
    <style>
        .switchery{
            margin-top: -3px;
        }
        ul.category_show {
            margin-bottom: 0;
        }
        ul.category_show, ul.category_show ul{
            list-style-type: none;
            padding-left: 20px;
        }
        .img_container{
            position: relative;
            overflow: hidden;
        }
        .img_container .overlay_delete{
            position:absolute;
            top: -50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: calc(100% - 30px);
            background-color: rgba(0,0,0,.5);
            padding: 30px 0;
            text-align: center;
            transition: .3s;
        }
        .img_container:hover .overlay_delete{
            top: 50%;
        }
    </style>
@endsection

@section('javascript')

    <!-- Select 2 -->
    <script src="{{ asset('admin/plugins') }}/select2/js/select2.min.js"></script>
    <!-- dropify js -->
    <script src="{{ asset('admin/plugins') }}/dropify/js/dropify.min.js"></script>

    <!-- page specific js -->
    <script src="{{ asset('admin') }}/pages/jquery.blog-add.init.js"></script>

    <script>

        jQuery(document).ready(function(){
            $(".select2").select2();

            $(".select2-limiting").select2({
                maximumSelectionLength: 2
            });
        });
    </script>
    <script src="{{ asset('admin/plugins/ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('description', options = {
            height: '405px',
            toolbarGroups: [{
                "name": "basicstyles",
                "groups": ["basicstyles"]
            },
                {
                    "name": "links",
                    "groups": ["links"]
                },
                {
                    "name": "paragraph",
                    "groups": ["list", "blocks"]
                },
                {
                    "name": "document",
                    "groups": ["mode"]
                },
                {
                    "name": "insert",
                    "groups": ["insert"]
                },
                {
                    "name": "styles",
                    "groups": ["styles"]
                },
                {
                    "name": "about",
                    "groups": ["about"]
                }
            ],
            // Remove the redundant buttons from toolbar groups defined above.
            removeButtons: 'Underline,Strike,Subscript,Superscript,Anchor,Styles,Specialchar',
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        });
    </script>


@endsection
