<div>
    <div class="row">
        @if($show_visited_products)
            @foreach($visited_products as $product)
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <x-product :product="$product"/>
                </div>
            @endforeach
        @endif
    </div>
    @push('footer_javascript')
        <script>
            $(document).ready(function(){
                Livewire.emit('localStorage', localStorage.getItem('visited_products'))
            })
        </script>
    @endpush
</div>
