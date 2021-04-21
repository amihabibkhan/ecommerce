<?php

namespace App\Http\Livewire;

use App\Product;
use Livewire\Component;


class VisitedProduct extends Component
{
    public $show_visited_products = false;

    public $visited_products = [];

    public $product_ids;

    protected $listeners = [
        'localStorage' => 'localStorage_visited_product'
    ];

    public function localStorage_visited_product($products_ids){
        $this->product_ids = $products_ids;
    }

    public function render()
    {
        $product_ids = json_decode($this->product_ids);

        $product_ids = (array) $product_ids;

        $this->visited_products = Product::whereIn('id',$product_ids)->take(12)->get();

        $this->show_visited_products = true;

        return view('livewire.visited-product');
    }


}
