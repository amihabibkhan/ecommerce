@extends('layouts.app')

{{--@section('page_title') Home Page Management @endsection--}}

@section('main_content')
@push('header_css')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush
<div class="row">
    <div class="col-md-12 m-auto">
        <div class="card">
            <div class="card-heading bg-purple">
                <h3 class="card-title d-inline text-light">Selling Information</h3>
            </div>
            <div class="card-body pt-2">
                <form action="profit" method="get">
                    <div class="row d-flex justify-content-between mb-2">
                        <div class="col-md-4">
                            <span class="pt-2">{{ date_format(date_create($start_date),'M d, Y') }} - {{ date_format(date_create($end_date),'M d, Y') }}</span>
                        </div>
                        <div class="col-md-8">
                            <ul class="list-unstyled m-0 d-flex justify-content-end">
                                <li class="pr-2">
                                    <input placeholder="From" name="start_date" id="start_date" class="form-control" type="text">
                                </li>
                                <li class="pr-2">
                                    <input placeholder="To" name="end_date" id="end_date" class="form-control" type="text">
                                </li>
                                <li>
                                    <input class="form-control cursor-pointer" type="submit" value="Search">
                                </li>
                            </ul>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-md-4">
                        <table class="table table-bordered table-striped text-center">
                            <tr>
                                <td class="text-left">Total Sub-total</td>
                                <td style="width: 100px">{{ number_format($orders_for_total->sum('sub_total'),2) }} ৳</td>
                            </tr>
                            <tr>
                                <td class="text-left">Total Discount</td>
                                <td>{{ number_format($orders_for_total->sum('discount'),2) }} ৳</td>
                            </tr>
                            <tr>
                                <td class="text-left">Total Shipping Charge</td>
                                <td>{{ number_format($orders_for_total->sum('shipping_charge'),2) }} ৳</td>
                            </tr>
                            <tr>
                                <td class="text-left">Grand Total(Including Shipping Charge)</td>
                                <td>{{ number_format($orders_for_total->sum('total'),2) }} ৳</td>
                            </tr>
                            <tr class="text-success">
                                <td class="text-left"><b>Total Revenue (Without Shipping Charge)</b></td>
                                <td><b>{{ number_format($orders_for_total->sum('total') - $orders->sum('shipping_charge'),2) }} ৳</b></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-md-8">
                        <table class="table table-bordered table-striped text-center">
                            <tr>
                                <td>Sub-total</td>
                                <td>Discount</td>
                                <td>Shipping Charge</td>
                                <td>Grand Total</td>
                                <td>Action</td>
                            </tr>
                            @forelse($orders as $order)
                                <tr>
                                    <td class="text-center" style="width: 100px">
                                        {{ number_format($order->sub_total,2) }} ৳
                                    </td>
                                    <td class="text-center" style="width: 100px">
                                        {{ number_format($order->discount,2) }} ৳
                                    </td>
                                    <td class="text-center" style="width: 100px">
                                        {{ number_format($order->shipping_charge,2) }} ৳
                                    </td>
                                    <td class="text-center" style="width: 100px">
                                        {{ number_format($order->total,2) }} ৳
                                    </td>
                                    <td class="text-center" style="width: 100px">
                                        <a href="{{ url('order_processing',$order->id) }}" class="btn btn-dark">Visit Details</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No data found..</td>
                                </tr>
                            @endforelse
                        </table>
                        {{ $orders->appends(Request::except('page'))->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('footer_javascript')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        $( function() {
            var dateFormat = 'yy-mm-dd',
                from = $( "#start_date" )
                    .datepicker({
                        defaultDate: "+1w",
                        changeMonth: true,
                        changeYear: true,
                        numberOfMonths: 1,
                        dateFormat: dateFormat
                    })
                    .on( "change", function() {
                        to.datepicker( "option", "minDate", getDate( this ) );
                    }),
                to = $( "#end_date" ).datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    changeYear: true,
                    numberOfMonths: 1,
                    dateFormat: dateFormat
                })
                    .on( "change", function() {
                        from.datepicker( "option", "maxDate", getDate( this ) );
                    });

            function getDate( element ) {
                var date;
                try {
                    date = $.datepicker.parseDate(dateFormat, element.value );
                } catch( error ) {
                    date = null;
                }

                return date;
            }
        } );
    </script>
@endpush
@endsection
