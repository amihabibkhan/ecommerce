@extends('layouts.app')

@section('page_title') Slider Management @endsection

@section('main_content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">Slider Management</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped text-center">
                        <tr>
                            <th>SL</th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        @forelse($sliders as $single_slider)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $single_slider->title }}</td>
                                <td>
                                    <img width="100" src="{{ asset('storage') }}/{{ $single_slider->image }}" alt="">
                                </td>
                                <td>
                                    <form action="{{ route('manage_slider.destroy', $single_slider->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="#update_slider{{ $single_slider->id }}" class="btn btn-primary waves-effect waves-light m-r-5" data-animation="push" data-plugin="custommodal"
                                           data-overlaySpeed="100" data-overlayColor="#36404a"><i class="far fa-edit"></i></a>
                                        <button type="submit" onclick="return confirm('Are you sure to delete?')" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>

                                    <div id="update_slider{{ $single_slider->id }}" class="modal-demo text-left">
                                        <button type="button" class="close" onclick="Custombox.close();">
                                            <span>&times;</span><span class="sr-only">Close</span>
                                        </button>
                                        <h4 class="custom-modal-title">Update Slider</h4>
                                        <div class="custom-modal-text">
                                            <form action="{{ route('manage_slider.update', $single_slider->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="">Slider Title</label>
                                                    <input type="text" value="{{ $single_slider->title }}" name="title" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Background Image (Height 400px) (Max Size: 1 MB)</label>
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-success">Update Slider</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10">No Data Found</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">Add Slider</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('manage_slider.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Slider Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Background Image (Height 400px) (Max Size: 1 MB)</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-success" value="Add Slider">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
