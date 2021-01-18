<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;

class OfferProductSelect extends Component
{
    public $product_name = '';
    public $product_code;

    public function getProductName($product_id)
    {

        $product = Product::where('product_code', $product_id)->first();
        if ($product){
            $this->product_name = $product->title . ' (' . $product->regular_price . '/-)';
        }else{
            $this->product_name = '';
        }
    }

    public function mount($product_code)
    {
        $this->product_code = $product_code;
    }

    public function render()
    {
        return view('livewire.offer-product-select');
    }
}
