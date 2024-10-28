<div class="book-row__single-book">
    <a href="{{ route('frontend.singleProduct', $product->slug) }}" class="book-row__single-book__image">
        @if($product->main_image)
            <img src="{{ asset('storage') }}/{{ $product->main_image }}" style="width: 100%" alt="Image">
        @else
            <div class="not_image">
                <span>
                    <b>{{ $product->title }}</b>
                    <br>
                    {{ @$product->writer->name }}
                </span>
            </div>
        @endif
    </a>
    <h2 title="{{ $product->title }}" class="book-row__single-boo__title"><a href="{{ route('frontend.singleProduct', $product->slug) }}">{{ $product->title }}</a></h2>
    <h3 title="{{ @$product->writer->name }}" class="book-row__single-boo__author">{{ @$product->writer->name }}</h3>
    <p class="book-row__single-boo__price">
        @if($product->sale_price != null)
            <del>TK{{ $product->regular_price }}</del> TK. {{ $product->sale_price }}
        @else
            TK. {{ $product->regular_price }}
        @endif
    </p>

    <form action="{{ route('add_to_cart') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $product->id }}">
        <input type="hidden" name="qty" value="1">
        <button type="submit" class="book-row__single-boo__buy-icon">
            <i class="fas fa-shopping-basket"></i>
            কিনে ফেলুন
        </button>
    </form>
</div>



