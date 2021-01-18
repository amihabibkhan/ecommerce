@extends('layouts.app')

@section('page_title') Update Coupons @endsection

@section('main_content')

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">Update Coupon</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('manage_coupon.update', $coupon->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Offer Title</label>
                            <input type="text" value="{{ $coupon->offer_title }}" name="offer_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Coupon Code</label>
                            <input type="text" value="{{ $coupon->coupon_code }}" name="coupon_code" class="form-control">
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="">Discount Amount</label>
                                <input type="number" value="{{ $coupon->discount_amount }}" name="discount_amount" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="">Discount Percent</label>
                                <input type="number" value="{{ $coupon->discount_percent }}" name="discount_percent" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Last Date</label>
                            <input type="date" value="{{ $coupon->last_date }}" name="last_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Offer Type</label>
                            <select name="type" class="form-control" onchange="changType()" id="changer">
                                <option {{ $coupon->type == 4 ? 'selected' : '' }} value="4">For All Product</option>
                                <option {{ $coupon->type == 1 ? 'selected' : '' }} value="1">For Category</option>
                                <option {{ $coupon->type == 2 ? 'selected' : '' }} value="2">For Writer</option>
                                <option {{ $coupon->type == 3 ? 'selected' : '' }} value="3">For Publication</option>
                            </select>
                        </div>
                        <div class="form-group {{ $coupon->type == 1 ? " " : 'd-none' }}" id="sub_category">
                            <label for="">Select a Category</label>
                            <select name="sub_category_id" class="form-control">
                                <option disabled selected>Select One</option>
                                @foreach($sub_categories as $single_category)
                                    <option {{ $coupon->sub_category_id == $single_category->id ? 'selected' : '' }} value="{{ $single_category->id }}">{{ $single_category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group {{ $coupon->type == 2 ? " " : 'd-none' }}" id="writer">
                            <label for="">Select a Writer</label>
                            <select name="writer_id" class="form-control">
                                <option disabled selected>Select One</option>
                                @foreach($writers as $single_writer)
                                    <option {{ $coupon->writer_id == $single_writer->id ? 'selected' : '' }} value="{{ $single_writer->id }}">{{ $single_writer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group {{ $coupon->type == 3 ? " " : 'd-none' }}" id="publication">
                            <label for="">Select a Publication</label>
                            <select name="publication_id" class="form-control">
                                <option disabled selected>Select One</option>
                                @foreach($publications as $single_pubs)
                                    <option {{ $coupon->publication_id == $single_pubs->id ? 'selected' : '' }} value="{{ $single_pubs->id }}">{{ $single_pubs->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-success" value="Update Coupon">
                        </div>

                        <script>
                            function changType(){
                                var type = document.getElementById('changer').value;
                                var writer = document.getElementById('writer');
                                var publication = document.getElementById('publication');
                                var sub_category = document.getElementById('sub_category');
                                if (type == 4){
                                    writer.classList.add('d-none');
                                    publication.classList.add('d-none');
                                    sub_category.classList.add('d-none');
                                }else if(type == 1){
                                    writer.classList.add('d-none');
                                    publication.classList.add('d-none');
                                    sub_category.classList.remove('d-none');
                                }else if(type == 3){
                                    writer.classList.add('d-none');
                                    publication.classList.remove('d-none');
                                    sub_category.classList.add('d-none');
                                }else if(type == 2){
                                    writer.classList.remove('d-none');
                                    publication.classList.add('d-none');
                                    sub_category.classList.add('d-none');
                                }
                            }
                        </script>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('plugin_css')
    @livewireStyles
@endsection

@section('javascript')
    @livewireScripts
@endsection
