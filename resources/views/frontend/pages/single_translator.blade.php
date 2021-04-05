@extends('frontend.layout.frontend_layout')

@section('main_content')
    <x-inner-page-banner :title="$translator->name" />

    <!-- Start Single Event Area -->
    <section class="single-event-area  ptb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-2 order-md-1">
                    <div class="course_overview">
                        <h2 class="text-center mt-0"><strong>অনুবাদকের বই সমূহ</strong></h2>
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-lg-4 col-md-4 col-6">
                                    <x-product :product="$product"/>
                                </div>
                            @endforeach
                        </div>
                        {{ $products->links() }}
                    </div>
                </div>

                <div class="col-lg-4 order-1 order-md-2">
                    <div class="single-teachers">
                        @if($translator->image)
                            <img src="{{ asset('storage') }}/{{ $translator->image }}" style="width: 100%" alt="{{ $translator->name }}">
                        @else
                            <div class="not_image_writer">
                                <img src="{{ asset('images/default.jpg') }}" style="width: 100%" alt="{{ $translator->name }}">
                            </div>
                        @endif

                        <div class="teachers-content">
                            <h3>{{ $translator->name }}</h3>
                            <p>{{ $translator->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Single Event Area -->

@endsection
