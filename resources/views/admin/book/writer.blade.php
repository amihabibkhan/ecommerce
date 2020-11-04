@extends('layouts.app')

@section('page_title') Writers @endsection

@section('main_content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">All Writers</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped text-center">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Profile Picture</th>
                            <th>Action</th>
                        </tr>
                        @foreach($writers as $single_item)
                            <tr>
                                <td style="vertical-align: middle">{{ $loop->index + 1 }}</td>
                                <td style="vertical-align: middle">{{ $single_item->name }}</td>
                                <td style="vertical-align: middle">
                                    @if($single_item->image)
                                        <a href="{{ asset('storage') }}/{{ $single_item->image }}" data-fancybox="gallery" data-caption="{{ $single_item->name }}">
                                            <img class="rounded-circle" src="{{ asset('storage') }}/{{ $single_item->image }}" height="40" alt="">
                                        </a>
                                    @else
                                        <a href="{{ asset('images/default.jpg') }}" data-fancybox="gallery" data-caption="{{ $single_item->name }}">
                                            <img class="rounded-circle" src="{{ asset('images/default.jpg') }}" height="40" alt="">
                                        </a>
                                    @endif
                                </td>
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
                                <h4 class="custom-modal-title">Update Writer Info</h4>
                                <div class="custom-modal-text">
                                    <form action="{{ route('manage_writer.update', $single_item->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method("PUT")
                                        <div class="form-group">
                                            <label for="">Update Name</label>
                                            <input type="text" value="{{ $single_item->name }}" class="form-control" name="name">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Update Description</label>
                                            <textarea name="description" class="form-control">{{ $single_item->description }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Change Profile Picture (200x200) </label>
                                            <input type="file" name="image_update" class="form-control">
                                        </div>
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-success" value="Update Writer">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- Delete Modal -->
                            <div id="delete-modal-{{ $single_item->id }}" class="modal-demo text-left">
                                <button type="button" class="close" onclick="Custombox.close();">
                                    <span>&times;</span><span class="sr-only">Close</span>
                                </button>
                                <h4 class="custom-modal-title">Delete Writer</h4>
                                <div class="custom-modal-text text-center">
                                    <h4 style="font-size: 24px">Are you sure to delete?</h4>
                                    <p>NB: All of books of this writer will be affected.</p>
                                    <form action="{{ route('manage_writer.destroy', $single_item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="text-center">
                                            <input type="submit" class="btn btn-danger m-r-5" value="DELETE WRITER">
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
                    <h3 class="card-title text-white">Add New Writer</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('manage_writer.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" value="{{ old('name') }}" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Profile Picture (200x200) </label>
                            <input type="file" class="dropify" data-height="100" name="image"/>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-success" value="Add Writer">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="{{ asset('admin/plugins') }}/dropify/js/dropify.min.js"></script>
    <script>
        $('.dropify').dropify();
    </script>
    <script src="{{ asset('admin/plugins/fancybox/jquery.fancybox.min.js') }}"></script>
@endsection

@section('plugin_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins') }}/dropify/css/dropify.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/fancybox/jquery.fancybox.min.css') }}" />
@endsection
