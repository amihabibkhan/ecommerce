@extends('layouts.app')

@section('page_title') Orders @endsection

@section('main_content')
    <style>
        table tr td{
            vertical-align: middle !important;
        }
    </style>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">Order List</h3>
                </div>
                <div class="card-body">
                    <table class="table text-center table-bordered">
                        <tr>
                            <th>Order ID</th>
                            <th>Client</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        <form action="">
                            <tr>
                                <td><input type="text" name="id" class="form-control" placeholder="Search by ID"></td>
                                <td><input type="text" name="name" class="form-control" placeholder="Search by Name"></td>
                                <td><input type="text" name="phone" class="form-control" placeholder="Search by Phone"></td>
                                <td><input type="date" name="date" class="form-control"></td>
                                <td><input type="number" name="total" class="form-control" placeholder="Search by Total"></td>
                                <td>
                                    <select name="status" class="form-control">
                                        <option disabled selected>Select an status</option>
                                        <option value="1">Pending</option>
                                        <option value="2">Processing</option>
                                        <option value="3">Cancel</option>
                                        <option value="4">Delivered</option>
                                    </select>
                                </td>
                                <td><input type="submit" class="form-control btn btn-success" value="Search" ></td>
                            </tr>
                        </form>
                        @forelse($orders as $single_order)
                            <tr>
                                <td>#{{ $single_order->id }}</td>
                                <td>{{ $single_order->name }} <br> {{ $single_order->district->name }}</td>
                                <td>{{ $single_order->phone }} <br> {{ $single_order->emergency_phone }}</td>
                                <td>{{ date_maker($single_order->created_at, 'd M, Y') }}</td>
                                <td>{{ $single_order->total }}/-</td>
                                <td><x-order-status :status="$single_order->status"/></td>
                                <td>
                                    <a href="{{ route('order_processing.show', $single_order->id) }}" class="btn btn-dark">Details</a>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="7">No Data Found</td></tr>
                        @endforelse
                    </table>
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>

@endsection

