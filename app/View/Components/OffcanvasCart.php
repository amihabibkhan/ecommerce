<?php

namespace App\View\Components;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\View\Component;

class OffcanvasCart extends Component
{

    public $count = 10;
    public $cart = array();

    public function showCartOffcanvas(){
        $this->count++;
//        $this->render();
//        $this->dispatchBrowserEvent('showCartOffcanvas', []);
    }

    public function increment()
    {
        $this->count++;
    }

//    protected $listeners = ['showCartOffcanvas'=> 'showCartOffcanvas'];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        $this->cart = Cart::content();
        return view('components.offcanvas-cart');
    }
}
