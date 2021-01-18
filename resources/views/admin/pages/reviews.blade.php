@extends('layouts.app')

@section('page_title') Reviews @endsection

@section('plugin_css')
    <style>

        table tr td{
            vertical-align: middle !important;
        }
    </style>
@endsection

@section('main_content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">{{ ucfirst($type) }} Reviews</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.viewReviews', $type) }}" method="get">
                        <div class="row justify-content-end">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="search" placeholder="Search By Product ID">
                                </div>
                            </div>
                            <div class="col-md-2 col-lg-1">
                                <div class="form-group">
                                    <input type="submit" class="form-control btn btn-success" value="Search">
                                </div>
                            </div>
                        </div>
                    </form>
                    <table class="table text-center table-bordered">
                        <tr>
                            <th>Product</th>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Review</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>

                        @forelse($reviews as $single_review)
                            <tr>
                                <td>{{ $single_review->product->title }}</td>
                                <td>{{ $single_review->name }}</td>
                                <td>{{ $single_review->email }}</td>
                                <td>{{ Str::limit($single_review->review, 100) }}</td>
                                <td>{{ $single_review->ratings }}</td>
                                <td>
                                    <a href="#action-{{ $single_review->id }}" class="btn btn-primary waves-effect waves-light m-r-5" data-animation="push" data-plugin="custommodal"
                                       data-overlaySpeed="100" data-overlayColor="#36404a"><i class="far fa-edit"></i></a>


                                    <div id="action-{{ $single_review->id }}" class="modal-demo text-left">
                                        <button type="button" class="close" onclick="Custombox.close();">
                                            <span>&times;</span><span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="custom-modal-title">Review Details</h4>
                                        <div class="custom-modal-text">
                                            <form action="{{ route('admin.approve_review', $single_review->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="review_id" value="{{ $single_review->id }}">
                                                <p>{{ $single_review->review }}</p>
                                                <div class="text-center">
                                                    @if($single_review->status == 1)
                                                        <input type="submit" class="btn btn-success" value="Approve Review">
                                                    @endif
                                                    <a onclick="return confirm('Are you sure to delete this review?')" href="{{ route('admin.delete_review', $single_review->id) }}" class="btn btn-danger">Delete Review</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">No Data Found</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
