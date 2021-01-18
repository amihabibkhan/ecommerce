<div class="form-group">
    <label for="">Product ID</label>
    <input type="text" value="{{ $product_code }}" wire:change="getProductName($event.target.value)" name="product_code" class="form-control">


    @if($product_name != '')
        <span style="padding: 3px 5px; background-color: black; color: white; display: block; margin-top: 5px">{{ $product_name }}</span>
    @endif
</div>
