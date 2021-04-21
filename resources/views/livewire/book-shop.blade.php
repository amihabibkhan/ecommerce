<div>

    <div class="row">
        @forelse($products as $product)
            <div class="col-lg-3 col-md-4 col-6">
                <x-product :product="$product"/>
            </div>
        @empty
            <div class="col-12 text-center">
                <h2>কোন বই পাওয়া যায়নি!</h2>
            </div>
        @endforelse

        <div class="col-lg-12 col-md-12">
            <div class="pagination-area">
                {{ $products->links() }}
            </div>
        </div>
    </div>

@push('footer_javascript')
    <script>
        function filterBook() {
            var request = $("#filter_form").serialize();
            window.history.pushState(request, "", "{{ route('frontend.bookShop') }}?"+request);
            Livewire.emit('request',request)
        }
    </script>
@endpush
</div>
