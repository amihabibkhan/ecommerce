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
                                            <form action="{{ route('manage_slider.update', $single_slider->id) }}" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="">Slider Title</label>
                                                    <input type="text" value="{{ $single_slider->title }}" name="title" class="form-control">
                                                </div>

                                                <label class="m-b-10">Title Position</label>
                                                <br/>
                                                <div class="radio radio-info form-check-inline pl-2">
                                                    <input type="radio" value="uk-position-top-left"
                                                           name="title_position" id="title_pos_11"
                                                        {{ ($single_slider->title_position == 'uk-position-top-left') ? 'checked' : '' }}>
                                                    <label for="title_pos_11"> top-left </label>
                                                </div>
                                                <div class="radio radio-info form-check-inline pl-2">
                                                    <input type="radio" value="uk-position-top-center"
                                                           name="title_position" id="title_pos_22"
                                                        {{ ($single_slider->title_position == 'uk-position-top-center') ? 'checked' : '' }}>
                                                    <label for="title_pos_22"> top-center </label>
                                                </div>
                                                <div class="radio radio-info form-check-inline pl-2">
                                                    <input type="radio" value="uk-position-top-right"
                                                           name="title_position" id="title_pos_33"
                                                        {{ ($single_slider->title_position == 'uk-position-top-right') ? 'checked' : '' }}>
                                                    <label for="title_pos_33"> top-right </label>
                                                </div>
                                                <div class="radio radio-info form-check-inline pl-2">
                                                    <input type="radio" value="uk-position-center"
                                                           name="title_position" id="title_pos_44"
                                                        {{ ($single_slider->title_position == 'uk-position-center') ? 'checked' : '' }}>
                                                    <label for="title_pos_44"> center </label>
                                                </div>
                                                <div class="radio radio-info form-check-inline pl-2">
                                                    <input type="radio" value="uk-position-center-left"
                                                           name="title_position" id="title_pos_55"
                                                        {{ ($single_slider->title_position == 'uk-position-center-left') ? 'checked' : '' }}>
                                                    <label for="title_pos_55"> center-left </label>
                                                </div>
                                                <div class="radio radio-info form-check-inline pl-2">
                                                    <input type="radio" value="uk-position-center-right"
                                                           name="title_position" id="title_pos_66"
                                                        {{ ($single_slider->title_position == 'uk-position-center-right') ? 'checked' : '' }}>
                                                    <label for="title_pos_66"> center-right </label>
                                                </div>
                                                <div class="radio radio-info form-check-inline pl-2">
                                                    <input type="radio" value="uk-position-bottom-left"
                                                           name="title_position" id="title_pos_77"
                                                        {{ ($single_slider->title_position == 'uk-position-bottom-left') ? 'checked' : '' }}>
                                                    <label for="title_pos_77"> bottom-left </label>
                                                </div>
                                                <div class="radio radio-info form-check-inline pl-2">
                                                    <input type="radio" value="uk-position-bottom-center"
                                                           name="title_position" id="title_pos_88"
                                                        {{ ($single_slider->title_position == 'uk-position-bottom-center') ? 'checked' : '' }}>
                                                    <label for="title_pos_88"> bottom-center </label>
                                                </div>
                                                <div class="radio radio-info form-check-inline pl-2">
                                                    <input type="radio" value="uk-position-bottom-right"
                                                           name="title_position" id="title_pos_99"
                                                        {{ ($single_slider->title_position == 'uk-position-bottom-right') ? 'checked' : '' }}>
                                                    <label for="title_pos_99"> bottom-right </label>
                                                </div>

                                                <hr>

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

                        <label class="m-b-10">Title Position</label>
                        <br/>
                        <div class="radio radio-info form-check-inline pl-2">
                            <input type="radio" value="uk-position-top-left"
                                   name="title_position" id="title_pos_1">
                            <label for="title_pos_1"> top-left </label>
                        </div>
                        <div class="radio radio-info form-check-inline pl-2">
                            <input type="radio" value="uk-position-top-center"
                                   name="title_position" id="title_pos_2">
                            <label for="title_pos_2"> top-center </label>
                        </div>
                        <div class="radio radio-info form-check-inline pl-2">
                            <input type="radio" value="uk-position-top-right"
                                   name="title_position" id="title_pos_3">
                            <label for="title_pos_3"> top-right </label>
                        </div>
                        <div class="radio radio-info form-check-inline pl-2">
                            <input type="radio" value="uk-position-center"
                                   name="title_position" id="title_pos_4">
                            <label for="title_pos_4"> center </label>
                        </div>
                        <div class="radio radio-info form-check-inline pl-2">
                            <input type="radio" value="uk-position-center-left"
                                   name="title_position" id="title_pos_5">
                            <label for="title_pos_5"> center-left </label>
                        </div>
                        <div class="radio radio-info form-check-inline pl-2">
                            <input type="radio" value="uk-position-center-right"
                                   name="title_position" id="title_pos_6">
                            <label for="title_pos_6"> center-right </label>
                        </div>
                        <div class="radio radio-info form-check-inline pl-2">
                            <input type="radio" value="uk-position-bottom-left"
                                   name="title_position" id="title_pos_7">
                            <label for="title_pos_7"> bottom-left </label>
                        </div>
                        <div class="radio radio-info form-check-inline pl-2">
                            <input type="radio" value="uk-position-bottom-center"
                                   name="title_position" id="title_pos_8">
                            <label for="title_pos_8"> bottom-center </label>
                        </div>
                        <div class="radio radio-info form-check-inline pl-2">
                            <input type="radio" value="uk-position-bottom-right"
                                   name="title_position" id="title_pos_9">
                            <label for="title_pos_9"> bottom-right </label>
                        </div>

                        <hr>


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
