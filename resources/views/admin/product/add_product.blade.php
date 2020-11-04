@extends('layouts.app')

@section('page_title') New Product @endsection

@section('main_content')

    <form action="">
        <div class="row">
            <div class="col-lg-8">
                <div class="card-box">
                    <div class="">
                        <div class="form-group m-b-20">
                            <label for="exampleInputEmail1">Product Title</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter title">
                        </div>
                        <div class="form-group m-b-20">
                            <label for="exampleInputEmail1">Product Sub Title</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter sub title">
                        </div>
                        <div class="form-group m-b-20">
                            <label>Product Description</label>
                            <textarea name="description" class="summernote">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group m-b-20">
                            <label>Post Category</label>
                            <select class="select2 form-control select2-multiple" multiple="multiple" data-placeholder="Choose ...">
                                <option value="lifestyle">Lifestyle</option>
                                <option value="Music">Music</option>
                                <option value="Travel">Travel</option>
                                <option value="Fashion">Fashion</option>
                            </select>
                        </div>
                        <div class="form-group m-b-20">
                            <label>Main Image (Cover Photo)</label>
                            <input type="file" class="dropify" name="main_image" data-height="210" />
                        </div>
                        <div class="form-group m-b-20">
                            <label for="videourl">Product Video URL (Youtube)</label>
                            <input type="text" class="form-control" id="videourl" placeholder="Enter url..">
                        </div>
                        <button type="submit" class="btn btn-success waves-effect waves-light">Publish</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light">Save as Draft</button>
                    </div>
                </div> <!-- end p-20 -->
            </div> <!-- end col -->
            <div class="col-md-4">
                <div class="card-box">
                    <div class="form-group">
                        <label for="">Categories and Subjects</label>
                        <div style="overflow-y: scroll; max-height: 200px">
                            @foreach($main_categories as $main_category)
                                @if($main_category->id == 1)
                                    @continue
                                @endif
                                <ul class="category_show">
                                    <li>
                                        <div class="checkbox checkbox-success">
                                            <input type="checkbox" id="main{{ $main_category->id }}" value="option1">
                                            <label for="main{{ $main_category->id }}">{{ $main_category->title }}</label>
                                        </div>
                                        @foreach($main_category->categories as $category)
                                            <ul>
                                                <li>
                                                    <div class="checkbox checkbox-pink">
                                                        <input type="checkbox" id="cat{{ $category->id }}" value="option1">
                                                        <label for="cat{{ $category->id }}">{{ $category->title }}</label>
                                                    </div>
                                                    @foreach($category->sub_categories as $sub_category)
                                                        <ul>
                                                            <li>
                                                                <div class="checkbox checkbox-purple">
                                                                    <input type="checkbox" id="sub{{ $sub_category->id }}" value="option1">
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










{{--                    <div class="">--}}
{{--                        <div class="form-group m-b-20">--}}
{{--                            <label class="m-b-10">Product Type</label>--}}
{{--                            <br/>--}}
{{--                            <div class="radio radio-info form-check-inline pl-2">--}}
{{--                                <input type="radio" id="inlineRadio1" value="1"--}}
{{--                                       name="type" checked>--}}
{{--                                <label for="inlineRadio1"> Book </label>--}}
{{--                            </div>--}}
{{--                            <div class="radio radio-info form-check-inline">--}}
{{--                                <input type="radio" id="inlineRadio2" value="2"--}}
{{--                                       name="type">--}}
{{--                                <label for="inlineRadio2"> Others </label>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="if_book">
                        <div class="form-group">
                            <label for="">Select a Writer</label>
                            <select class="select2 form-control" name="writer_id">
                                @foreach($writers as $writer)
                                    <option {{ old('writer_id') == $writer->id ? 'selected' : '' }} value="{{ $writer->id }}">{{ $writer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Select a Publication</label>
                            <select class="select2 form-control" name="publication_id">
                                @foreach($publications as $publication)
                                    <option {{ old('publication_id') == $publication->id ? 'selected' : '' }} value="{{ $publication->id }}">{{ $publication->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">ISBN Number</label>
                            <input type="text" class="form-control" name="isbn">
                        </div>
                        <div class="form-group">
                            <label for="">Edition</label>
                            <input type="text" class="form-control" name="edition" placeholder="ex: 1st, 15th etc">
                        </div>
                        <div class="form-group">
                            <label for="">Total Page</label>
                            <input type="number" class="form-control" name="total_page">
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
                    <div class="">
                        <div class="form-group">
                            <label for="">Regular Price</label>
                            <input type="number" class="form-control" name="regular_price">
                        </div>
                        <div class="form-group">
                            <label for="">Sale Price (Optional)</label>
                            <input type="number" class="form-control" name="sale_price">
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
                                @foreach($brands as $brand)
                                    <option {{ old('brand_id') == $brand->id ? 'selected' : '' }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">MODEL NO.</label>
                            <input type="text" class="form-control" name="model">
                        </div>
                        <div class="form-group">
                            <label for="">Weight (gm)</label>
                            <input type="number" class="form-control" name="weight">
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

    </style>
@endsection

@section('javascript')
    <!--Summernote js-->
    <script src="{{ asset('admin/plugins') }}/summernote/summernote-bs4.min.js"></script>
    <!-- Select 2 -->
    <script src="{{ asset('admin/plugins') }}/select2/js/select2.min.js"></script>
    <!-- dropify js -->
    <script src="{{ asset('admin/plugins') }}/dropify/js/dropify.min.js"></script>

    <!-- page specific js -->
    <script src="{{ asset('admin') }}/pages/jquery.blog-add.init.js"></script>

    <script>

        jQuery(document).ready(function(){

            $('.summernote').summernote({
                height: 240,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: false                 // set focus to editable area after initializing summernote
            });
            // Select2
            $(".select2").select2();

            $(".select2-limiting").select2({
                maximumSelectionLength: 2
            });
        });
    </script>

@endsection
