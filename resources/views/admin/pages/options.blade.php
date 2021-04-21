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
                            <img src="{{ img($options->where('name','logo')->first()->value ?? '' ) }}" alt="Logo"><br> <br>
                            <input type="file" class="form-control" name="logo">
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <textarea name="address" class="form-control">{{ $options->where('name','address')->first()->value ?? '' }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number 1</label>
                            <input type="text" class="form-control" value="{{ $options->where('name','phone_1')->first()->value ?? '' }}" name="phone_1">
                        </div>
                        <div class="form-group">
                            <label for="">Phone Number 2</label>
                            <input type="text" class="form-control" value="{{ $options->where('name','phone_2')->first()->value ?? '' }}" name="phone_2">
                        </div>
                        <div class="form-group">
                            <label for="">Email 1</label>
                            <input type="email" class="form-control" value="{{ $options->where('name','email_1')->first()->value ?? '' }}" name="email_1">
                        </div>
                        <div class="form-group">
                            <label for="">Email 2</label>
                            <input type="email" class="form-control" value="{{ $options->where('name','email_2')->first()->value ?? '' }}" name="email_2">
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
