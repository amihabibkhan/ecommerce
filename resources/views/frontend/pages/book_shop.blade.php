@extends('frontend.layout.frontend_layout')

@section('main_content')

    <x-inner-page-banner :title="$title" />

    <!-- Start Shop Area -->
    <div class="shop-area ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <form action="{{ route('frontend.bookShop', 'ssfdsdff') }}" method="get" id="filter_form">
                        <div class="showing-result mr-0">
                            <div class="showing-top-bar-ordering">
                                <select name="sort_by" onchange="filterBook()">
                                    <option disabled selected>সর্ট করুন</option>
                                    <option {{ $request->sort_by == 'name_a_to_z' ? 'selected' : '' }} value="name_a_to_z">Name (A-Z)</option>
                                    <option {{ $request->sort_by == 'name_z_to_a' ? 'selected' : '' }} value="name_z_to_a">Name (Z-A)</option>
                                    <option {{ $request->sort_by == 'price_high_to_low' ? 'selected' : '' }} value="price_high_to_low">Price High to Low</option>
                                    <option {{ $request->sort_by == 'price_low_to_high' ? 'selected' : '' }} value="price_low_to_high">Price Low to High</option>
                                    <option {{ $request->sort_by == 'new_first' ? 'selected' : '' }} value="new_first">New First</option>
                                    <option {{ $request->sort_by == 'old_first' ? 'selected' : '' }} value="old_first">Old First</option>
                                </select>
                            </div>
                        </div>

                        <div class="widget-sidebar">
                            <div id="accordion">
                                <div class="card mb-3">
                                    <div class="card-header" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="background-color: #ffb607">
                                        <h5 class="mb-0 mt-1"  style="font-size: 16px">প্রকাশক</h5>
                                    </div>

                                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                        <div class="card-body" style="max-height: 300px; overflow-x: hidden; overflow-y: scroll">
                                            @foreach($publications as $single_publication)
                                                <div class="custom-control custom-checkbox mr-sm-2 mb-2">
                                                    <input type="checkbox" {{ in_array($single_publication->id, $pubs) ? 'checked' : '' }} name="pubs[]" onchange="filterBook()" value="{{ $single_publication->id }}" class="custom-control-input" id="field{{ $single_publication->id }}">
                                                    <label class="custom-control-label" for="field{{ $single_publication->id }}">{{ $single_publication->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="true" aria-controls="collapsetwo" style="background-color: #ffb607">
                                        <h5 class="mb-0 mt-1"  style="font-size: 16px">বিষয় সমূহ</h5>
                                    </div>

                                    <div id="collapsetwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                                        <div class="card-body" style="max-height: 300px; overflow-x: hidden; overflow-y: scroll">
                                            @foreach($sub_categories as $single_sub)
                                                <div class="custom-control custom-checkbox mr-sm-2 mb-2">
                                                    <input type="checkbox" {{ in_array($single_sub->id, $topics) ? 'checked' : '' }} name="topics[]" onchange="filterBook()" value="{{ $single_sub->id }}" class="custom-control-input" id="sub{{ $single_sub->id }}">
                                                    <label class="custom-control-label" for="sub{{ $single_sub->id }}">{{ $single_sub->title }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapsethree" aria-expanded="true" aria-controls="collapsethree" style="background-color: #ffb607">
                                        <h5 class="mb-0 mt-1"  style="font-size: 16px">লেখক</h5>
                                    </div>

                                    <div id="collapsethree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
                                        <div class="card-body" style="max-height: 300px; overflow-x: hidden; overflow-y: scroll">
                                            @foreach($writers as $single_writer)
                                                <div class="custom-control custom-checkbox mr-sm-2 mb-2">
                                                    <input type="checkbox" {{ in_array($single_writer->id, $selected_writers) ? 'checked' : '' }} name="selected_writers[]" onchange="filterBook()" value="{{ $single_writer->id }}" class="custom-control-input" id="writer{{ $single_writer->id }}">
                                                    <label class="custom-control-label" for="writer{{ $single_writer->id }}">{{ $single_writer->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>



                    <script>
                        function filterBook() {
                            document.getElementById('filter_form').submit();
                            // window.history.pushState("", "", '/newpage');
                        }
                    </script>




                </div>
                <div class="col-lg-8">
                    <div class="shop-card-wrap">

                        <div class="row">
                            @forelse($products as $product)
                                <div class="col-lg-4 col-sm-6">
                                    <x-product :product="$product"/>
                                </div>
                            @empty
                                <div class="col-12 text-center">
                                    <h2>কোন বই পাওয়া যায়নি!</h2>
                                </div>
                            @endforelse

                            <div class="col-lg-12 col-md-12">
                                <div class="pagination-area">
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


