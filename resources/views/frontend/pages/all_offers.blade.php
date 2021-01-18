@extends('frontend.layout.frontend_layout')


@section('main_content')

    <x-inner-page-banner :title="$page_title" />

    <!-- Start Product Details Area -->
    <section class="product-details-area ebeef5-bg-color" style="padding: 50px 0">
        <div class="container">
            <div class="row">
                @forelse($offers as $offer)
                    <div class="col-md-6 col-lg-4">
                        <x-offer-item :offer="$offer" />
                    </div>
                @empty
                    <div class="col-12">
                        <h3>এই সপ্তাহের অফারে কোন প্রডাক্ট টাওয়া যায়নি</h3>
                    </div>
                @endforelse

                <div class="col-lg-12 col-md-12 mt-3">
                    <div class="pagination-area">
                        {{ $offers->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Details Area -->
@endsection


