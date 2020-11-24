@extends('layouts.app')

@section('page_title') All Products @endsection

@section('main_content')
    <style>
        table.my_table tr td{
            vertical-align: middle !important;
        }
    </style>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">All Products</h3>
                </div>
                <div class="card-body">
                    <form action="">
                        <div class="row search mb-3">
                            <div class="col-md">
                                <input type="text" placeholder="Search by Name" name="search_by_name" class="form-control">
                            </div>
                            <div class="col-md">
                                <select name="writer" class="form-control">
                                    <option disabled selected>Filter by Writer</option>
                                    @foreach($writers as $writer)
                                        <option value="{{ $writer->id }}">{{ $writer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md">
                                <select name="publication" class="form-control">
                                    <option disabled selected>Filter by Publication</option>
                                    @foreach($publications as $pub)
                                        <option value="{{ $pub->id }}">{{ $pub->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md">
                                <select name="category" class="form-control select2">
                                    <option disabled selected>Filter by Category</option>
                                    <optgroup label="Main Category">
                                        @foreach($main_categories as $cat)
                                            <option value="mai_{{ $cat->id }}">{{ $cat->title }}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="Category">
                                        @foreach($categories as $cat)
                                            <option value="cat_{{ $cat->id }}">{{ $cat->title }}</option>
                                        @endforeach
                                    </optgroup>
                                    <optgroup label="Sub Category">
                                        @foreach($sub_categories as $sub)
                                            <option value="sub_{{ $sub->id }}">{{ $sub->title }}</option>
                                        @endforeach
                                    </optgroup>
                                </select>
                            </div>
                            <div class="col-md">
                                <select name="brand" class="form-control">
                                    <option disabled selected>Filter by Brand</option>
                                    @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md">
                                <select name="stock" class="form-control">
                                    <option disabled selected>Filter by Stock</option>
                                    <option value="available">Available</option>
                                    <option value="out">Stock Out</option>
                                </select>
                            </div>
                            <div class="col-md">
                                <div class="row">
                                    <div class="col-6">
                                        <input type="submit" class="form-control btn btn-success" value="Search">
                                    </div>
                                    <div class="col-6">
                                        <input type="reset" class="form-control btn btn-danger" value="Reset">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <table class="table table-bordered table-striped text-center my_table">
                        <tr>
                            <th style="width: 40px"><input type="checkbox" value="1" id="check_all"></th>
                            <th><i class="fas fa-image"></i></th>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Writer</th>
                            <th>Publication</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                        @forelse($products as $single_product)
                            <tr>
                                <td><input type="checkbox" form="bulk_action" name="selected[]" value="{{ $single_product->id }}" class="checkList"></td>
                                <td><img src="{{ asset('storage') }}/{{ $single_product->main_image }}" alt="IMG" height="50"></td>
                                <td>{{ $single_product->title }}</td>
                                <td><a href="?type={{ $single_product->type }}">{{ $single_product->type == 1 ? 'Book' : 'Others' }}</a></td>
                                <td><a href="?writer={{ $single_product->writer_id }}">{{ $single_product->writer['name'] }}</a></td>
                                <td><a href="?publication={{ $single_product->publication_id }}">{{ $single_product->publication['name'] }}</a></td>
                                <td>
                                    @if($single_product->stock == 1)
                                        <a href="?stock=available"><strong style="color: green">In Stock</strong></a>
                                    @else
                                        <a href="?stock=out"><strong style="color: red">Out of Stock</strong></a>
                                    @endif
                                </td>
                                <td>
                                    @if($single_product->sale_price)
                                        <del>{{ $single_product->regular_price }}</del><br>
                                        <span>{{ $single_product->sale_price }}</span>
                                    @else
                                        <span>{{ $single_product->regular_price }}</span>
                                    @endif
                                </td>
                                <td>
                                    @if($single_product->created_at == $single_product->updated_at)
                                        <span>Published</span> <br>
                                        <span>{{ date_maker($single_product->created_at, 'd-m-Y') }}</span>
                                    @else
                                        <span>Last update</span> <br>
                                        <span>{{ date_maker($single_product->updated_at, 'd-m-Y') }}</span>
                                    @endif
                                </td>
                                <td style="padding: 0; vertical-align: middle">
                                    <a href="{{ route('manage_products.edit', $single_product->id) }}" class="btn btn-success"><i class="far fa-edit"></i></a>
                                    <a href="#delete-modal-{{ $single_product->id }}" class="btn btn-danger waves-effect waves-light" data-animation="sign" data-plugin="custommodal"
                                       data-overlaySpeed="100" data-overlayColor="#36404a"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>

                            <!-- Delete Modal -->
                            <div id="delete-modal-{{ $single_product->id }}" class="modal-demo text-left">
                                <button type="button" class="close" onclick="Custombox.close();">
                                    <span>&times;</span><span class="sr-only">Close</span>
                                </button>
                                <h4 class="custom-modal-title">Delete Product</h4>
                                <div class="custom-modal-text text-center">
                                    <h4 style="font-size: 24px">Are you sure to delete?</h4>
                                    <p>NB: You can stock out this product.</p>
                                    <form action="{{ route('manage_products.destroy', $single_product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-danger m-r-5" value="DELETE PRODUCT">
                                            <button onclick="Custombox.close();" type="button" class="btn btn-success">NOT NOW</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <tr><td colspan="10">No Product Found</td></tr>
                        @endforelse
                    </table>
                    <div class="row">
                        <div class="col-md-4">
                            <form action="{{ route('manage_product.bulk_action') }}" method="post" id="bulk_action">
                                @csrf
                                <div class="row">
                                    <div class="col-md-7">
                                        <select name="action" class="form-control">
                                            <option disabled selected>Select Bulk Action</option>
                                            <option value="1">Stock All Item</option>
                                            <option value="0">Stock Out All Item</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="submit" class="btn btn-success form-control" value="Apply">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8 d-flex justify-content-end">
                            {{ $products->appends(Request::all())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('plugin_css')
    <link href="{{ asset('admin/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('javascript')
    <script src="{{ asset('admin/plugins/select2/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function(){
        //select all checkboxes
        $("#check_all").change(function(){  //"select all" change
            $(".checkList").prop('checked', $(this).prop("checked")); //change all ".checkbox" checked status
        });

        //".checkbox" change
        $('.checkList').change(function(){
            //uncheck "select all", if one of the listed checkbox item is unchecked
            if(false == $(this).prop("checked")){ //if this item is unchecked
                $("#check_all").prop('checked', false); //change "select all" checked status to false
            }
            //check "select all" if all checkbox items are checked
            if ($('.checkList:checked').length == $('.checkList').length ){
                $("#check_all").prop('checked', true);
            }
        });

        $(".select2").select2();
    });
</script>

@endsection
