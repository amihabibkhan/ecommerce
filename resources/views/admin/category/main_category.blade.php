@extends('layouts.app')

@section('page_title') Main Category @endsection

@section('main_content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">All main categories</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped text-center">
                        <tr>
                            <th>SL</th>
                            <th>Main Category</th>
                            <th>Action</th>
                        </tr>
                        @foreach($main_categories as $single_item)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $single_item->title }}</td>
                                <td style="padding: 0; vertical-align: middle">
                                    <a href="#custom-modal-{{ $single_item->id }}" class="btn btn-primary waves-effect waves-light m-r-5" data-animation="push" data-plugin="custommodal"
                                       data-overlaySpeed="100" data-overlayColor="#36404a"><i class="far fa-edit"></i></a>
                                    @if($single_item->id != 1)
                                    <a href="#delete-modal-{{ $single_item->id }}" class="btn btn-danger waves-effect waves-light" data-animation="sign" data-plugin="custommodal"
                                       data-overlaySpeed="100" data-overlayColor="#36404a"><i class="far fa-trash-alt"></i></a>
                                    @endif
                                </td>
                            </tr>

                            <!-- Update Modal -->
                            <div id="custom-modal-{{ $single_item->id }}" class="modal-demo text-left">
                                <button type="button" class="close" onclick="Custombox.close();">
                                    <span>&times;</span><span class="sr-only">Close</span>
                                </button>
                                <h4 class="custom-modal-title">Update Category</h4>
                                <div class="custom-modal-text">
                                    <form action="{{ route('manage_main_category.update', $single_item->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group">
                                            <label for="">Name</label>
                                            <input type="text" value="{{ $single_item->title }}" class="form-control" name="title">
                                        </div>
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-success" value="Update Category">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Delete Modal -->
                            <div id="delete-modal-{{ $single_item->id }}" class="modal-demo text-left">
                                <button type="button" class="close" onclick="Custombox.close();">
                                    <span>&times;</span><span class="sr-only">Close</span>
                                </button>
                                <h4 class="custom-modal-title">Delete Category</h4>
                                <div class="custom-modal-text text-center">
                                    <h4 style="font-size: 24px">Are you sure to delete?</h4>
                                    <p>NB: All of child of this will be uncategorised.</p>
                                    <form action="{{ route('manage_main_category.destroy', $single_item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-danger m-r-5" value="DELETE CATEGORY">
                                            <button onclick="Custombox.close();" type="button" class="btn btn-success">NOT NOW</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">Add New</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('manage_main_category.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="title">
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-success" value="Add Main Category">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
