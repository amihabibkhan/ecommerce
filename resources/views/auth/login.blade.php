@extends('frontend.layout.frontend_layout')

@section('main_content')
    <style>
        .account-pages {
            box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.2), 0 1px 0px 0 rgba(0, 0, 0, 0.02) !important;
        }
    </style>
    <div class="wrapper-page overflow-hidden">
        <div class="row">
            <div class="col-md-4 m-auto py-3">

                <div class="m-t-40 account-pages">
                    <div class="text-center account-logo-box" style="background-color: #fbcb00">
                        <div class="m-b-10">
                            <a href="{{ route('index') }}" class="text-success">
                                <span><img src="{{ asset('images/only_logo.png') }}" alt=""></span>
                            </a>
                        </div>
                        <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                    </div>
                    <div class="account-content py-2 px-3">
                        <h2 class="text-center m-0 pb-3">Login</h2>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-12">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <div class="checkbox checkbox-success pl-1">
                                        <input id="checkbox-signup" name="remember" type="checkbox" checked>
                                        <label for="checkbox-signup">
                                            Remember me
                                        </label>
                                    </div>

                                </div>
                            </div>

                            <div class="form-group text-center m-t-30">
                                <div class="col-sm-12">
                                    <a href="{{ route('password.request') }}" class="text-muted"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                                </div>
                            </div>

                            <div class="form-group account-btn text-center m-t-10">
                                <div class="col-12">
                                    <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>

                        </form>

                        <div class="clearfix"></div>

                    </div>
                </div>
                <!-- end card-box-->


                <div class="row m-t-50">
                    <div class="col-sm-12 text-center">
                        <p class="text-muted">Don't have an account? <a href="{{ route('user_register') }}" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
