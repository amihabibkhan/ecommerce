@extends('layouts.register_layout')

@section('main_content')
    <div class="wrapper-page">

        <div class="m-t-40 account-pages">
            <div class="text-center account-logo-box" style="background-color: #fbcb00">
                <div class="m-b-10">
                    <a href="{{ route('index') }}" class="text-success">
                        <span><img src="{{ asset('storage') }}/{{ get_option('logo') }}" alt=""></span>
                    </a>
                </div>
                <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
            </div>
            <div class="account-content">
                <form class="form-horizontal" method="POST" action="{{ route('account_management.store') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control  @error('name') is-invalid @enderror" type="text" value="{{ old('name') }}" placeholder="Name" name="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control  @error('email') is-invalid @enderror" value="{{ old('email') }}" type="email" name="email"  placeholder="Email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" type="text"  name="phone" placeholder="Phone Number">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control  @error('password') is-invalid @enderror" type="password"  name="password" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="password"   name="password_confirmation" placeholder="Confirm Password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <div class="checkbox checkbox-success pt-1 pl-1">
                                <input id="checkbox-signup" type="checkbox" checked="checked">
                                <label for="checkbox-signup" class="mb-0">I accept <a href="#">Terms and Conditions</a></label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group account-btn text-center m-t-10">
                        <div class="col-12">
                            <button class="btn w-md btn-danger btn-bordered waves-effect waves-light" type="submit">Register</button>
                        </div>
                    </div>

                </form>

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- end card-box-->


        <div class="row m-t-50">
            <div class="col-sm-12 text-center">
                <p class="text-muted">Already have account?<a href="{{ route('login') }}" class="text-primary m-l-5"><b>Sign In</b></a></p>
            </div>
        </div>
    </div>
@endsection
