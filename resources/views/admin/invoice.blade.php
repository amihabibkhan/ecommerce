@extends('layouts.app')

@section('main_content')

    <style>
        .table-sm td, .table-sm th {
            padding: .3rem !important;
            background: #fff !important;
        }
        #invoice{
            padding: 30px;
        }

        .invoice {
            position: relative;
            background-color: #FFF;
            min-height: 680px;
            padding: 15px
        }

        .invoice header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #3989c6
        }

        .invoice .company-details {
            text-align: right
        }

        .invoice .company-details .name {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .contacts {
            margin-bottom: 20px
        }

        .invoice .invoice-to {
            text-align: left
        }

        .invoice .invoice-to .to {
            margin-top: 0;
            margin-bottom: 0
        }

        .invoice .invoice-details {
            text-align: right
        }

        .invoice .invoice-details .invoice-id {
            margin-top: 0;
            color: #3989c6
        }

        .invoice main {
            padding-bottom: 50px
        }

        .invoice main .thanks {
            margin-top: 0px;
            font-size: 2em;
            margin-bottom: 50px
        }

        .invoice main .notices {
            padding-left: 6px;
            border-left: 6px solid #3989c6
        }

        .invoice main .notices .notice {
            font-size: 1.2em
        }

        .invoice table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px
        }

        .invoice table td,.invoice table th {
            padding: 15px;
            background: #eee;
            border-bottom: 1px solid #fff
        }

        .invoice table th {
            white-space: nowrap;
            font-weight: 400;
            font-size: 16px
        }

        .invoice table td h3 {
            margin: 0;
            font-weight: 400;
            color: #3989c6;
            font-size: 1.2em
        }

        .invoice table .qty,.invoice table .total,.invoice table .unit {
            text-align: right;
            font-size: 1.2em
        }

        .invoice table .no {
            color: #fff;
            font-size: 1.6em;
            background: #3989c6
        }

        .invoice table .unit {
            background: #ddd
        }

        .invoice table .total {
            background: #3989c6;
            color: #fff
        }

        .invoice table tbody tr:last-child td {
            border: none
        }

        .invoice table tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.2em;
            border-top: 1px solid #aaa
        }

        .invoice table tfoot tr:first-child td {
            border-top: none
        }

        .invoice table tfoot tr:last-child td {
            color: #3989c6;
            font-size: 1.4em;
            border-top: 1px solid #3989c6
        }

        .invoice table tfoot tr td:first-child {
            border: none
        }

        .invoice footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #aaa;
            padding: 8px 0
        }


        input {
            border: 1px solid #242323;
            background: #ffffff;
            text-align: right;
            width: 100px;
        }

        .show_in_general{
            display: inline;
        }
        .hide_in_general{
            display: none;
        }

        @media print {
            .invoice {
                font-size: 11px!important;
                overflow: hidden!important
            }

            .invoice footer {
                position: absolute;
                bottom: 10px;
                page-break-after: always
            }

            .invoice>div:last-child {
                page-break-before: always
            }
        }
        @media print{

            .hide_in_invoice{
                display: none;
            }
            .show_in_invoice{
                display: inline;
            }
            header .container,
            footer.footer-top-area,
            footer.footer-bottom-area,
            .nav_container{
                display: none;
            }
            *{
                color: #000 !important;
                font-size: 16px !important;
            }
            table tr th,
            table tr td{
                border: 1px solid black !important;
            }

        }
    </style>
    <style>

        .label {
            position: relative;
            background-color: #FFF;
            min-height: 680px;
            padding: 15px
        }

        .label header {
            padding: 10px 0;
            margin-bottom: 20px;
            border-bottom: 1px solid #3989c6
        }

        .label .company-details {
            text-align: right
        }

        .label .company-details .name {
            margin-top: 0;
            margin-bottom: 0
        }

        .label .contacts {
            margin-bottom: 20px
        }

        .label .label-to {
            text-align: left
        }

        .label .label-to .to {
            margin-top: 0;
            margin-bottom: 0
        }

        .label .label-details {
            text-align: right
        }

        .label .label-details .label-id {
            margin-top: 0;
            color: #3989c6
        }

        .label main {
            padding-bottom: 50px
        }

        .label main .thanks {
            margin-top: 0px;
            font-size: 2em;
            margin-bottom: 50px
        }

        .label main .notices {
            padding-left: 6px;
            border-left: 6px solid #3989c6
        }

        .label main .notices .notice {
            font-size: 1.2em
        }

        .label table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px
        }

        .label table td,.label table th {
            padding: 15px;
            background: #eee;
            border-bottom: 1px solid #fff
        }

        .label table th {
            white-space: nowrap;
            font-weight: 400;
            font-size: 16px
        }

        .label table td h3 {
            margin: 0;
            font-weight: 400;
            color: #3989c6;
            font-size: 1.2em
        }

        .label table .qty,.label table .total,.label table .unit {
            text-align: right;
            font-size: 1.2em
        }

        .label table .no {
            color: #fff;
            font-size: 1.6em;
            background: #3989c6
        }

        .label table .unit {
            background: #ddd
        }

        .label table .total {
            background: #3989c6;
            color: #fff
        }

        .label table tbody tr:last-child td {
            border: none
        }

        .label table tfoot td {
            background: 0 0;
            border-bottom: none;
            white-space: nowrap;
            text-align: right;
            padding: 10px 20px;
            font-size: 1.2em;
            border-top: 1px solid #aaa
        }

        .label table tfoot tr:first-child td {
            border-top: none
        }

        .label table tfoot tr:last-child td {
            color: #3989c6;
            font-size: 1.4em;
            border-top: 1px solid #3989c6
        }

        .label table tfoot tr td:first-child {
            border: none
        }

        .label footer {
            width: 100%;
            text-align: center;
            color: #777;
            border-top: 1px solid #aaa;
            padding: 8px 0
        }

    </style>

    <div class="ptb-70">
        <div class="container">
            <div id="invoice">
                @if($order_details->updator)
                    <p class="hide_in_invoice">Last Updated By: {{ $order_details->updator['name'] }}</p>
                @endif
                <div class="toolbar hidden-print">
                    <form action="{{ route('order_processing.update', $order_details->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-4">
                                <select name="status" class="form-control">
                                    <option disabled selected>Take Action</option>
                                    <option value="2">Processing</option>
                                    <option value="3">Cancel</option>
                                    <option value="4">Delivered</option>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="button" id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
                            </div>
                        </div>
                    </form>
                    <hr>
                </div>

                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <header>
                            <div class="row">
                                <div class="col">
                                    <a target="_blank" href="{{ route('index') }}">
                                        <img src="{{ img($options->where('name','logo')->first()->value ?? '') }}" data-holder-rendered="true" />
                                    </a>
                                </div>
                                <div class="col company-details">
                                    <h2 class="name">
                                        <a target="_blank" href="{{ route('index') }}" class="text-uppercase" style="text-decoration: none;">
                                            {{ config('app.name') }}
                                        </a>
                                    </h2>
                                    <div>{{ $options->where('name','address')->first()->value ?? '' }}</div>
                                    <div>{{ $options->where('name','phone_1')->first()->value ?? '' }}</div>
                                    <div>{{ $options->where('name','email_1')->first()->value ?? '' }}</div>
                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    <div class="text-gray-light">INVOICE TO:</div>
                                    <h2 class="to">{{ $order_details->name }}</h2>
                                    <div class="address">{{ $order_details->full_address }}</div>
                                    <div class="email">{{ $order_details->phone }}</div>
                                </div>
                                <div class="col invoice-details">
                                    <h1 class="invoice-id">INVOICE #{{ $order_details->id }}</h1>
                                    <div class="date">Date of Invoice: {{ date_maker($order_details->created_at, 'd M, Y') }}</div>
                                </div>
                            </div>
                            <form action="{{ route('order_customize') }}" method="post">
                                @csrf
                                <input type="hidden" value="{{ $order_details->id }}" name="order_id">
                                <table border="0" cellspacing="0" cellpadding="0">
                                    <thead>
                                    <tr>
                                        <th class="text-center">SL</th>
                                        <th class="text-left">DESCRIPTION</th>
                                        <th class="text-right">PRICE</th>
                                        <th class="text-right">QTY</th>
                                        <th class="text-right">TOTAL</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($order_details->order_details as $single_product)
                                            <input type="hidden" name="order_details_ids[]" value="{{ $single_product->id }}">
                                            <tr>
                                                <td class="no text-center">{{ $loop->index + 1  }}</td>
                                                <td class="text-left">
                                                    {{ $single_product->product->title }}
                                                </td>
                                                <td class="unit">
                                                    <span>{{ $single_product->price }}</span>
                                                </td>
                                                <td class="qty">
                                                    <span class="hide_in_general show_in_invoice">{{ $single_product->qty }}</span>
                                                    <input name="qty_{{ $single_product->id }}" type="number" value="{{ $single_product->qty }}" class="hide_in_invoice show_in_general">
                                                </td>
                                                <td class="total">
                                                    <span class="hide_in_general show_in_invoice">{{ $single_product->total }}</span>
                                                    <input name="total_{{ $single_product->id }}" type="number" value="{{ $single_product->total }}" class="hide_in_invoice show_in_general">/-
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5">No Product Found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">SUBTOTAL</td>
                                        <td>
                                            <span>{{ $order_details->sub_total }}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">SHIPPING CHARGE</td>
                                        <td>
                                            <span class="hide_in_general show_in_invoice">{{ $order_details->shipping_charge }}</span>
                                            <input type="number" name="shipping_charge" value="{{ $order_details->shipping_charge }}" class="hide_in_invoice show_in_general">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">DISCOUNT</td>
                                        <td>
                                            <span class="hide_in_general show_in_invoice">{{ $order_details->discount }}</span>
                                            <input type="number" name="discount" value="{{ $order_details->discount }}" class="hide_in_invoice show_in_general">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">GRAND TOTAL</td>
                                        <td>
                                            <span>{{ $order_details->total }}</span>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <div class="form-group text-right">
                                    <input type="submit" value="Save" class="btn btn-info btn-lg">
                                </div>
                            </form>
                            <div class="thanks">Thank you!</div>
{{--                            <div class="notices">--}}
{{--                                <div>NOTICE:</div>--}}
{{--                                <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>--}}
{{--                            </div>--}}
                        </main>
                        <footer>
                            Invoice was generated automatically at {{ date('d M, Y') }}
                        </footer>
                    </div>
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>

                <div class="label overflow-auto">
                    <div style="max-width: 350px">
                        <header class="pb-2 mb-1">
                            <div class="row">
                                <div class="col-4" style="border-right: 1px solid #333">
                                    <a target="_blank" href="{{ route('index') }}">
                                        <img class="w-100" src="{{ img($options->where('name','logo')->first()->value ?? '') }}" data-holder-rendered="true" />
                                    </a>
                                </div>
                                <div class="col-2">
                                    <span style="vertical-align: top">From: </span>
                                </div>
                                <div class="col-6 pl-0 company-details">
                                    <h5 class="name">
                                        <a target="_blank" href="{{ route('index') }}" class="text-uppercase" style="text-decoration: none;">
                                            {{ config('app.name') }}
                                        </a>
                                    </h5>
                                    <p style="font-size: 8px;" class="m-0">{{ $options->where('name','address')->first()->value ?? '' }}</p>
                                    <p style="font-size: 8px;" class="m-0">{{ $options->where('name','phone_1')->first()->value ?? '' }}</p>
                                    <p style="font-size: 8px;" class="m-0">{{ $options->where('name','email_1')->first()->value ?? '' }}</p>
                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts mb-0">
                               <div class="col-4 d-flex align-content-center flex-wrap">
                                   <img src="{{ asset('admin/images/book.png') }}" alt="BOOK" class="img-fluid">
                               </div>
                                <div class="col-8 invoice-to">
                                    <div class="text-gray-light">TO:</div>

                                    <table class="table table-sm mb-0">
                                        <tr>
                                            <td>Name</td>
                                            <td>{{ $order_details->shipping_name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>{{ $order_details->shipping_full_address }}</td>
                                        </tr>
                                        <tr>
                                            <td>District</td>
                                            <td>{{ $order_details->shipping_district['name'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>{{ $order_details->phone }}</td>
                                        </tr>
                                        @if($order_details->shipping_emergency_phone)
                                        <tr>
                                            <td>Emergency Phone</td>
                                            <td>{{ $order_details->shipping_emergency_phone }}</td>
                                        </tr>
                                        @endif
                                        @if($order_details->shipping_email)
                                        <tr>
                                            <td>E-mail</td>
                                            <td>{{ $order_details->shipping_email }}</td>
                                        </tr>
                                        @endif
                                    </table>
                                </div>
                            </div>
                            <h5 class="m-0 border-top border-bottom py-2"><b>Order Nr: #{{ $order_details->id }}</b></h5>
                            <h5 class="m-0 border-bottom py-2"><b>Reference: {{ $order_details->name }}</b></h5>
                            <div class="row mb-0">
                                <div class="col-12">
                                    <p class="h4 m-0 pb-2"><b>Item Nr.: {{ $order_details->id }}</b></p>
                                    <p class="text-muted m-0">Delivery Instructions</p>
                                    @if($order_details->shipping_note)
                                        <p class="text-muted m-0">{{ $order_details->shipping_note }}</p>
                                    @endif
                                </div>
                            </div>
                        </main>
                        <footer>
                            Label was generated automatically at {{ date('d M, Y') }}
                        </footer>
                    </div>
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $('#printInvoice').click(function(){
            Popup($('.invoice')[0].outerHTML);
            function Popup(data)
            {
                window.print();
                return true;
            }
        });
    </script>
@endsection
