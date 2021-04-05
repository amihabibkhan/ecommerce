@extends('layouts.app')

@section('page_title') Home Page Management @endsection

@section('main_content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">Options</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('manage_options.update', 1) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="">Logo</label><br>
                            <img src="{{ asset('storage') }}/{{ get_option('logo') }}" alt="Logo"><br> <br>
                            <input type="file" class="form-control" name="logo">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" class="form-control">{{ get_option('address') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number 1</label>
                            <input type="text" class="form-control" value="{{ get_option('phone_1') }}" name="phone_1">
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number 2</label>
                            <input type="text" class="form-control" value="{{ get_option('phone_2') }}" name="phone_2">
                        </div>
                        <div class="form-group">
                            <label for="">Email 1</label>
                            <input type="email" class="form-control" value="{{ get_option('email_1') }}" name="email_1">
                        </div>
                        <div class="form-group">
                            <label for="">Email 2</label>
                            <input type="email" class="form-control" value="{{ get_option('email_2') }}" name="email_2">
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success">Update Options</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
