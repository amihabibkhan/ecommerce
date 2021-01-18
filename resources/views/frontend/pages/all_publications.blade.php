@extends('frontend.layout.frontend_layout')

@section('main_content')
    <x-inner-page-banner :title="$title" />

    <!-- Start Single Event Area -->
    <section class="single-event-area  ptb-70">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-md-3">
                    <div class="sidebar-widget search">
                        <form class="search-form" method="get" action="{{ route('frontend.allPublications') }}">
                            <input class="form-control" name="search_by_name" placeholder="প্রকাশণী সার্চ করুন" type="text">
                            <button class="search-button" type="submit">
                                <i class="bx bx-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                @forelse($publications as $publication)
                    <div class="col-md-3 col-sm-4 col-6">
                        <x-publication :publication="$publication" />
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <h2>কোন প্রকাশণী খুজে পাওয়া যায় নি।</h2>
                    </div>
                @endforelse
                <div class="col-lg-12 col-md-12 mt-3">
                    <div class="pagination-area">
                        {{ $publications->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Single Event Area -->

@endsection
