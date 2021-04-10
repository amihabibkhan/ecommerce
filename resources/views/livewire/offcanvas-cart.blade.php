<div>
    <table class="uk-table uk-table-divider">
        @forelse($cart as $single_cart_item)
            <tr class="cart-item_{{ $single_cart_item->rowId }}">
                <td style="width: 70px;">
                    <img src="{{ img($single_cart_item->options->image)  }}" alt="IMG" class="img-fluid">
                </td>
                <td class="p-0">
                    <ul class="list-unstyled text-dark">
                        <li>
                            <strong>
                                <a href="{{ route('frontend.singleProduct', $single_cart_item->options->slug) }}" class="text-dark">{{ $single_cart_item->name }}</a>
                            </strong>
                        </li>
                        <li>Price: TK. {{ $single_cart_item->price }}</li>
                        <li>QTY: {{ $single_cart_item->qty }}</li>
                        <li>Total Price: {{ $single_cart_item->subtotal }}</li>
                    </ul>
                </td>
                <td style="width: 30px">
                    <a href="#" class="remove" data-rawid="{{ $single_cart_item->rowId }}" style="float: unset;margin-left: 0">
                        <i class="bx bx-x pl-1"></i>
                    </a>
                </td>
            </tr>
        @empty
            <tr><td>কার্টে কোন প্রডাক্ট নেই</td></tr>
        @endforelse

    </table>
    <span wire:click="showCartOffcanvas" id="showCartOffcanvas"></span>
</div>
