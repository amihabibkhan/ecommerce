@extends('frontend.layout.frontend_layout')

@section('main_content')

    <x-inner-page-banner :title="auth()->user()->name" />

    <div class="dashboard my-5">
        <div class="container">
            <div class="card">
                <h5 class="card-header mt-0">স্বাগতম {{ auth()->user()->name }}</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            @include('frontend.user.user_menu')
                        </div>
                        <div class="col-md-9 d-flex align-items-center my-3 my-md-0">
                            ডেশবোর্ডে আপনাকে স্বাগতম। আপনি আপনার ডেশবোর্ড এ আপনার একাউন্ট সেটিংস, পাসওয়ার্ড চেইঞ্জ, লেনদেন গুলো এখানে খুজে পাবেন।
                            <br>
                            <br> আমাদের সাথে থাকার জন্য ধন্যবাদ
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
