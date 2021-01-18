@extends('layouts.app')

@section('page_title') Coupons @endsection

@section('main_content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">Coupon List</h3>
                </div>
                <div class="card-body">
                    <table class="table text-center table-bordered">
                        <tr>
                            <th>Title</th>
                            <th>Code</th>
                            <th>Discount</th>
                            <th>Last Date</th>
                            <th>Type</th>
                            <th>Offer on</th>
                            <th>Action</th>
                        </tr>
                        @forelse($coupons as $single_coupon)
                            <tr>
                                <td>{{ $single_coupon->offer_title }}</td>
                                <td>{{ $single_coupon->coupon_code }}</td>
                                <td>
                                    @if($single_coupon->discount_amount)
                                        {{ $single_coupon->discount_amount }} TK.
                                    @else
                                        {{ $single_coupon->discount_percent }} %
                                    @endif
                                </td>
                                <td>{{ date_maker($single_coupon->last_date, 'd M, Y') }}</td>
                                <td>
                                    @if($single_coupon->type == 1)
                                        Category
                                    @elseif($single_coupon->type == 2)
                                        Writer
                                    @elseif($single_coupon->type == 3)
                                        Publication
                                    @else
                                        All Product
                                    @endif
                                </td>
                                <td>
                                    @if($single_coupon->type == 1)
                                        {{ $single_coupon->sub_category->title }}
                                    @elseif($single_coupon->type == 2)
                                        {{ $single_coupon->writer->name }}
                                    @elseif($single_coupon->type == 3)
                                        {{ $single_coupon->publication->name }}
                                    @else
                                        All Product
                                    @endif
                                </td>
                                <td>
                                    <form action="{{ route('manage_coupon.destroy', $single_coupon->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('manage_coupon.edit', $single_coupon->id) }}" class="btn btn-success mr-2"><i class="fas fa-edit"></i></a>
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are sure to delete this coupon?')"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="7">No Data Found</td></tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">Add a Coupon</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('manage_coupon.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Offer Title</label>
                            <input type="text" name="offer_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Coupon Code</label>
                            <input type="text" name="coupon_code" class="form-control">
                        </div>
                        <div class="form-group row">
                            <div class="col-6">
                                <label for="">Discount Amount</label>
                                <input type="number" name="discount_amount" class="form-control">
                            </div>
                            <div class="col-6">
                                <label for="">Discount Percent</label>
                                <input type="number" name="discount_percent" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Last Date</label>
                            <input type="date" name="last_date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Offer Type</label>
                            <select name="type" class="form-control" onchange="changType()" id="changer">
                                <option value="4">For All Product</option>
                                <option value="1">For Category</option>
                                <option value="2">For Writer</option>
                                <option value="3">For Publication</option>
                            </select>
                        </div>
                        <div class="form-group d-none" id="sub_category">
                            <label for="">Select a Category</label>
                            <select name="sub_category_id" class="form-control">
                                <option disabled selected>Select One</option>
                                @foreach($sub_categories as $single_category)
                                    <option value="{{ $single_category->id }}">{{ $single_category->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group d-none" id="writer">
                            <label for="">Select a Writer</label>
                            <select name="writer_id" class="form-control">
                                <option disabled selected>Select One</option>
                                @foreach($writers as $single_writer)
                                    <option value="{{ $single_writer->id }}">{{ $single_writer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group d-none" id="publication">
                            <label for="">Select a Publication</label>
                            <select name="publication_id" class="form-control">
                                <option disabled selected>Select One</option>
                                @foreach($publications as $single_pubs)
                                    <option value="{{ $single_pubs->id }}">{{ $single_pubs->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-success" value="Add Coupon">
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
