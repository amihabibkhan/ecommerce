@extends('layouts.app')

@section('page_title') Slider Management @endsection

@section('main_content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">Slider Management</h3>
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
                            <label for="">Slider Short Text</label>
                            <input type="text" name="sub_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Slider Subtitle</label>
                            <input type="text" name="description" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Link</label>
                            <input type="text" name="link" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">PNG Image</label>
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
