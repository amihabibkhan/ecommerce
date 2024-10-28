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
                <h2 class="text-center m-0 pb-3">Register</h2>
                <form method="POST" action="{{ route('user_register_post') }}">
                    @csrf

                    <div class="form-group row">
                        <div class="col-12">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-12">
                            <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Phone Number" autofocus>

                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
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


                    <div class="form-group account-btn text-center m-t-10">
                        <div class="col-12">
                            <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit">Register Now</button>
                        </div>
                    </div>

                </form>

                <div class="clearfix"></div>

            </div>
        </div>
        <!-- end card-box-->


        <div class="row m-t-50">
            <div class="col-sm-12 text-center">
                <p class="text-muted">Already have an account? <a href="{{ route('login') }}" class="text-primary m-l-5"><b>Sign In</b></a></p>
            </div>
        </div>

    </div> @endsection
