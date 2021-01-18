@extends('frontend.layout.frontend_layout')

@section('main_content')

    <x-inner-page-banner :title="$category->title" />

    <!-- Start Shop Area -->
    <div class="shop-area ptb-70">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-3 col-md-5 col-sm-6">
                    <div class="showing-result mr-0">
                        <div class="showing-top-bar-ordering">
                            <select onchange="filterProduct()" id="changer">
                                <option disabled selected>সর্ট করুন</option>
                                <option {{ $request->sort_by ==  'name_a_to_z' ? 'selected' : ''}} value="name_a_to_z">Name (A-Z)</option>
                                <option {{ $request->sort_by ==  'name_z_to_a' ? 'selected' : ''}} value="name_z_to_a">Name (Z-A)</option>
                                <option {{ $request->sort_by ==  'price_high_to_low' ? 'selected' : ''}} value="price_high_to_low">Price High to Low</option>
                                <option {{ $request->sort_by ==  'price_low_to_high' ? 'selected' : ''}} value="price_low_to_high">Price Low to High</option>
                                <option {{ $request->sort_by ==  'new_first' ? 'selected' : ''}} value="new_first">New First</option>
                                <option {{ $request->sort_by ==  'old_first' ? 'selected' : ''}} value="old_first">Old First</option>
                            </select>
                        </div>
                    </div>


                    <script>
                        function filterProduct() {
                            var selectedDate = document.getElementById('changer').value;
                            var urlMaker = "?sort_by=" + selectedDate;
                            location.replace(urlMaker)
                        }
                    </script>


                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-card-wrap">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-lg-3 col-md-4 col-6">
                                    <x-product :product="$product"/>
                                </div>
                            @endforeach

                            <div class="col-lg-12 col-md-12">
                                <div class="pagination-area">
                                    <!--
                                    <a href="#" class="prev page-numbers">
                                        <i class="bx bx-chevron-left"></i>
                                    </a>
                                    -->
                                    <style>
                                        .pagination-area .pagination{
                                            display: block;
                                        }
                                        .pagination-area .page-item {
                                            width: 40px;
                                            height: 40px;
                                            line-height: 40px;
                                            color: var(--heading-color);
                                            text-align: center;
                                            display: inline-block;
                                            position: relative;
                                            margin-left: 5px;
                                            margin-right: 5px;
                                            font-size: 18px;
                                            background-color: #f5f6fa;
                                            border: 0;
                                        }
                                        .pagination-area .page-item.active .page-link {
                                            z-index: 3;
                                            color: #fff;
                                            background-color: #ffb607;
                                            border-color: #ffb607;
                                        }
                                    </style>
                                    {{ $products->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Area -->
@endsection


