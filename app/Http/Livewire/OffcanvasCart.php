<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class OffcanvasCart extends Component
{

    public $cart = array();

    public function showCartOffcanvas(){
        $this->dispatchBrowserEvent('showCartOffcanvas', []);
    }


//    protected $listeners = ['showCartOffcanvas'=> 'showCartOffcanvas'];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->render();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */

    public function render()
    {
        $this->cart = Cart::content();
        return view('livewire.offcanvas-cart');
    }
}
