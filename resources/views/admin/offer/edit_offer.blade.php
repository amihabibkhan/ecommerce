@extends('layouts.app')

@section('page_title') Weekly Offer Update @endsection

@section('main_content')

    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-heading bg-purple">
                    <h3 class="card-title text-white">Update Offer</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('manage_offer.update', $offer->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        @livewire('offer-product-select', ['product_code' => $product_code])
                        <div class="form-group">
                            <label for="">Offer Price</label>
                            <input type="number" value="{{ $offer->offer_price }}" name="offer_price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Last Date</label>
                            <input type="date" name="last_date" value="{{ $offer->last_date }}" class="form-control">
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-success" value="Update Make Offer">
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
