<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class UpdateCartItemColor extends Component
{

    public $rowId, $qty, $stock;

    public function mount()
    {
        $item = Cart::get($this->rowId);
        $this->qty = $item->qty;
        $this->stock = qty_available($item->id, $item->options->color_id);
    }

    public function decrement()
    {
        $this->qty = $this->qty - 1;
        $item = Cart::update($this->rowId, $this->qty);
        $this->stock = qty_available($item->id, $item->options->color_id);
        $this->emit('render');
    }

    public function increment()
    {
        $this->qty = $this->qty + 1;
        $item = Cart::update($this->rowId, $this->qty);
        $this->stock = qty_available($item->id, $item->options->color_id);
        $this->emit('render');
    }
      

    public function render()
    {
        return view('livewire.update-cart-item-color');
    }
}
