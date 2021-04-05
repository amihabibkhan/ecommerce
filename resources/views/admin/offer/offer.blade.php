@extends('layouts.app')

@section('page_title') Weekly Offer @endsection

@section('main_content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">Weekly Offer</h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered ">
                        <tr>
                            <th>Product Code</th>
                            <th>Product Title</th>
                            <th>Regular Price</th>
                            <th>Offer Price</th>
                            <th>Last Date</th>
                            <th>Action</th>
                        </tr>
                        @forelse($offers as $single_offer)
                            <tr>
                                <td>{{ @$single_offer->product->product_code }}</td>
                                <td>{{ @$single_offer->product->title }}</td>
                                <td>{{ @$single_offer->product->regular_price }}</td>
                                <td>{{ $single_offer->offer_price }}</td>
                                <td>{{ date_maker($single_offer->last_date, 'd M, Y') }}</td>
                                <td class="text-center">
                                    <form action="{{ route('manage_offer.destroy', $single_offer->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('manage_offer.edit', $single_offer->id) }}" class="btn btn-success mr-2">Edit</a>
                                        <button onclick="return confirm('Are you sure to delete this offer?')" class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center">No Data Found</td></tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">Add a Product to Offer</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('manage_offer.store') }}" method="POST">
                        @csrf
                        @livewire('offer-product-select', ['product_code' => ''])
                        <div class="form-group">
                            <label for="">Offer Price</label>
                            <input type="number" name="offer_price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Last Date</label>
                            <input type="date" name="last_date" class="form-control">
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-success" value="Make Offer">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('plugin_css')
    @livewireStyles
@endsection

@section('javascript')
    @livewireScripts
@endsection
