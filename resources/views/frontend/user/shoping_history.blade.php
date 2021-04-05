@extends('frontend.layout.frontend_layout')

@section('main_content')

    <x-inner-page-banner :title="auth::user()->name" />

    <div class="dashboard my-5">
        <div class="container">
            <div class="card">
                <h5 class="card-header mt-0">আমার সব কেনাকাটা</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            @include('frontend.user.user_menu')
                        </div>
                        <div class="col-md-9 my-3 my-md-0">
                            <div class="table-responsive">
                                <table class="table text-center table-bordered table-striped">
                                    <tr>
                                        <th>অর্ডার নাম্বার</th>
                                        <th>তারিখ</th>
                                        <th>মোট মূল্য</th>
                                        <th>অবস্থা</th>
                                        <th>বিস্তারিত</th>
                                    </tr>
                                    @forelse($orders as $order)
                                        <tr>
                                            <td># {{ $order->id }}</td>
                                            <td>{{ date_maker($order->created_at, 'd M, Y') }}</td>
                                            <td>{{ $order->total }}</td>
                                            <td><x-order-status :status="$order->status" /></td>
                                            <td>
                                                <a href="{{ route('order_details', $order->id) }}">বিস্তারিত</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="5">এখনো কোন কেনাকাটা করা হয়নি।</td></tr>
                                    @endforelse
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
