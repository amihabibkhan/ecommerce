@extends('layouts.app')

@section('page_title') New Product @endsection

@section('main_content')
    <form action="{{ route('manage_products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
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
                            <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="title" placeholder="Enter title">
                        </div>
                        <div class="form-group m-b-20">
                            <label for="title">Banglish Title</label>
                            <input type="text" name="banglish_title" value="{{ old('banglish_title') }}" class="form-control" id="banglish_title" placeholder="Enter banglish title">
                        </div>
                        <div class="form-group m-b-20">
                            <label for="sub_title">Product Sub Title</label>
                            <input type="text" name="sub_title" value="{{ old('sub_title') }}" class="form-control" id="sub_title" placeholder="Enter sub title">
                        </div>
                        <div class="form-group m-b-20">
                            <label>Product Description</label>
                            <textarea id="description" name="description" class="form-control">{!! old('description') !!}</textarea>
                        </div>
                        <div class="form-group m-b-20">
                            <label>Main Image (Cover Photo 200x300 | General Product 800x800)</label>
                            <input type="file" class="dropify" name="main_image" data-height="210" />
                        </div>
                        <div class="form-group m-b-20">
                            <label for="videourl">Product Video URL (Youtube)</label>
                            <input type="text" class="form-control" name="video_url" id="videourl" placeholder="Enter url...">
                        </div>
                        <button type="submit" value="publish" name="publish" class="btn btn-success waves-effect waves-light">Publish</button>
                        <button type="submit" value="save" name="save" class="btn btn-danger waves-effect waves-light">Save as Draft</button>
                    </div>
                </div> <!-- end p-20 -->
            </div> <!-- end col -->
            <div class="col-lg-4">
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
                            <div style="overflow-y: scroll; max-height: 200px; margin-bottom: 15px">
                                @foreach($main_categories as $main_category)
                                    @if($main_category->id == 1)
                                        @continue
                                    @endif
                                    <ul class="category_show">
                                        <li>
                                            <div class="checkbox checkbox-success">
                                                <input type="checkbox" name="main_categories[]" id="main{{ $main_category->id }}" value="{{ $main_category->id }}">
                                                <label for="main{{ $main_category->id }}">{{ $main_category->title }} ({{ count($main_category->products) }})</label>
                                            </div>
                                            @foreach($main_category->categories as $category)
                                                <ul>
                                                    <li>
                                                        <div class="checkbox checkbox-pink">
                                                            <input type="checkbox" name="categories[]" id="cat{{ $category->id }}" value="{{ $category->id }}">
                                                            <label for="cat{{ $category->id }}">{{ $category->title }} ({{ count($category->products) }})</label>
                                                        </div>
                                                        @foreach($category->sub_categories as $sub_category)
                                                            <ul>
                                                                <li>
                                                                    <div class="checkbox checkbox-purple">
                                                                        <input type="checkbox" name="sub_categories[]" id="sub{{ $sub_category->id }}" value="{{ $sub_category->id }}">
                                                                        <label for="sub{{ $sub_category->id }}">{{ $sub_category->title }} ({{ count($sub_category->products) }})</label>
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
                            <a data-toggle="collapse" href="#create_category">+ Create new category</a>
                            <div id="create_category" class="collapse">
                                <div class="form-group mt-3">
                                    <input name="new_category" type="text" placeholder="Category Name" class="form-control">
                                </div>
                                <div class="form-group">
                                    <select name="new_category_parent" class="form-control">
                                        <option disabled selected>Select Parent Category</option>
                                        @foreach($main_categories as $main_category)
                                        <option value="m_{{ $main_category->id }}">{{ $main_category->title }}</option>
                                            @foreach($main_category->categories as $category)
                                            @if($category->id == 1)
                                                @continue
                                            @endif
                                            <option value="c_{{ $category->id }}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $category->title }}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
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
                                           name="type" checked>
                                    <label for="p_book"> Book </label>
                                </div>
                                <div class="radio radio-info form-check-inline pl-2">
                                    <input type="radio" id="p_others" value="2"
                                           name="type">
                                    <label for="p_others"> Others </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Writer</label>
                                <select class="select2 form-control" name="writer_id">
                                    <option disabled selected>Select a Writer</option>
                                    @foreach($last_used_writers as $single_writer)
                                        <option value="{{ @$single_writer->writer->id }}">{{ @$single_writer->writer->name }}</option>
                                    @endforeach
                                    @foreach($writers as $writer)
                                        @if($last_used_writers->where('writer_id', $writer->id)->first())
                                            @continue
                                        @endif
                                        <option {{ old('writer_id') == $writer->id ? 'selected' : '' }} value="{{ $writer->id }}">{{ $writer->name }}</option>
                                    @endforeach
                                </select>
                                <a data-toggle="collapse" href="#create_writer">+ Create new writer</a>
                                <div id="create_writer" class="collapse">
                                    <input type="text" name="new_writer" placeholder="Writer name" class="form-control mt-3">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Translator</label>
                                <select class="select2 form-control" name="translator_id">
                                    <option disabled selected>Select a Translator</option>
                                    @foreach($last_used_translators as $single_translator)
                                        <option value="{{ @$single_translator->translator->id }}">{{ @$single_translator->translator->name }}</option>
                                    @endforeach
                                    @foreach($translators as $translator)
                                        @if($last_used_translators->where('translator_id', $translator->id)->first())
                                            @continue
                                        @endif
                                        <option {{ old('translator_id') == $translator->id ? 'selected' : '' }} value="{{ $translator->id }}">{{ $translator->name }}</option>
                                    @endforeach
                                </select>
                                <a data-toggle="collapse" href="#create_translator">+ Create new translator</a>
                                <div id="create_translator" class="collapse">
                                    <input type="text" name="new_translator" placeholder="Translator name" class="form-control mt-3">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Publication</label>
                                <select class="select2 form-control" name="publication_id">
                                    <option disabled selected>Select a Publication</option>
                                    @foreach($last_used_pubs as $single_pub)
                                        <option value="{{ @$single_pub->publication->id }}">{{ @$single_pub->publication->name }}</option>
                                    @endforeach
                                    @foreach($publications as $publication)
                                        @if($last_used_pubs->where('publication_id', $publication->id)->first())
                                            @continue
                                        @endif
                                        <option {{ old('publication_id') == $publication->id ? 'selected' : '' }} value="{{ $publication->id }}">{{ $publication->name }}</option>
                                    @endforeach
                                </select>
                                <a data-toggle="collapse" href="#create_publication">+ Create new Publication</a>
                                <div id="create_publication" class="collapse">
                                    <input type="text" name="new_publication" placeholder="Publication name" class="form-control mt-3">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">ISBN Number</label>
                                <input type="text" class="form-control" value="{{ old('isbn') }}" name="isbn">
                            </div>
                            <div class="form-group">
                                <label for="">Edition</label>
                                <input type="text" class="form-control" value="{{ old('edition') }}" name="edition" placeholder="ex: 1st, 15th etc">
                            </div>
                            <div class="form-group m-b-20">
                                <label class="m-b-10">Cover Type</label>
                                <br/>
                                <div class="radio radio-info form-check-inline pl-2">
                                    <input type="radio" id="book_cover_hard" value="হার্ড কভার"
                                           name="cover">
                                    <label for="book_cover_hard"> Hard Cover </label>
                                </div>
                                <div class="radio radio-info form-check-inline pl-2">
                                    <input type="radio" id="book_cover_paper" value="পেপার ব্যাক"
                                           name="cover">
                                    <label for="book_cover_paper"> Paper Back </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Total Page</label>
                                <input type="number" class="form-control" value="{{ old('total_page') }}" name="total_page">
                            </div>
                            <div class="form-group">
                                <label for="">Language</label>
                                <select class="select2 form-control" name="language_id">
                                    @foreach($languages as $language)
                                        <option {{ old('language_id') == $language->id ? 'selected' : '' }} value="{{ $language->id }}">{{ $language->name }}</option>
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
                                <input type="number" class="form-control" value="{{ old('regular_price') }}" name="regular_price">
                            </div>
                            <div class="form-group">
                                <label for="">Sale Price (Optional)</label>
                                <input type="number" class="form-control" value="{{ old('sale_price') }}" name="sale_price">
                            </div>
                            <div class="form-group">
                                <label for="">Product Country (Optional)</label>
                                <select class="select2 form-control" name="country_id">
                                    @foreach($countries as $country)
                                        <option {{ old('country_id') == $country->id ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Brand</label>
                                <select class="select2 form-control" name="brand_id">
                                    <option disabled selected>Select a brand</option>
                                    @foreach($brands as $brand)
                                        <option {{ old('brand_id') == $brand->id ? 'selected' : '' }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">MODEL NO.</label>
                                <input type="text" class="form-control" value="{{ old('model') }}" name="model">
                            </div>
                            <div class="form-group">
                                <label for="">Product Code</label>
                                <input type="text" class="form-control" value="{{ old('product_code') }}" name="product_code">
                            </div>
                            <div class="form-group">
                                <label for="">Weight (gm)</label>
                                <input type="number" class="form-control" value="{{ old('weight') }}" name="weight">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="" class="mr-2">Stock Available</label>
                                        <input type="checkbox" name="stock" checked data-plugin="switchery" data-color="#64b0f2" data-size="small"/>
                                    </div>
                                    <div class="col-6">
                                        <label for="" class="mr-2">Publish</label>
                                        <input type="checkbox" name="status" checked data-plugin="switchery" data-color="#64b0f2" data-size="small"/>
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
                                        <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                    @endforeach
                                </select>
                                <a data-toggle="collapse" href="#create_tags">+ Add new tags</a>
                                <div id="create_tags" class="collapse">
                                    <select multiple data-role="tagsinput" name="new_tags[]">
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Colors</label>
                                <select name="colors[]" class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose colors ...">
                                    @foreach($colors as $color)
                                        @if($color->id == 1)
                                            @continue
                                        @endif
                                        <option value="{{ $color->id }}">{{ $color->color_name }}</option>
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
                                        <option value="{{ $size->id }}">{{ $size->title }} ({{ $size->size }})</option>
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
                            </div>
                            <div class="form-group">
                                <label for="">Page Images (Select multiple item)</label>
                                <input type="file" class="form-control" multiple name="pages[]">
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

    <link rel="stylesheet" href="{{ asset('admin/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css') }}">
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
    </style>
@endsection

@section('javascript')

    <!-- Select 2 -->
    <script src="{{ asset('admin/plugins') }}/select2/js/select2.min.js"></script>
    <!-- dropify js -->
    <script src="{{ asset('admin/plugins') }}/dropify/js/dropify.min.js"></script>

    <!-- page specific js -->
    <script src="{{ asset('admin') }}/pages/jquery.blog-add.init.js"></script>
    <script src="{{ asset('admin/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js') }}"></script>

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
