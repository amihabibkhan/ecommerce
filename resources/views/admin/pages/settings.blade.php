@extends('layouts.app')

@section('page_title') Settings @endsection

@section('main_content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">User Informations</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('settings.user_info') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Name</label><br>
                            <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
                            @error('name')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">E-mail</label><br>
                            <input type="tex" class="form-control" name="email" value="{{ auth()->user()->email }}">
                            @error('email')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Confirm E-mail</label><br>
                            <input type="text" class="form-control" name="email_confirmation" value="{{ auth()->user()->email }}">
                            @error('email_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label><br>
                            <input type="text" class="form-control" name="phone" value="{{ auth()->user()->phone }}">
                            @error('phone')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success">Update Information</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">Password Change</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('settings.password') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Old Password</label><br>
                            <input type="password" class="form-control" name="old_password">
                            @error('old_password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">New Password</label><br>
                            <input type="password" class="form-control" name="password">
                            @error('password')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Confirm Password</label><br>
                            <input type="password" class="form-control" name="password_confirmation">
                            @error('password_confirmation')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="text-center">
                            <button class="btn btn-success">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
