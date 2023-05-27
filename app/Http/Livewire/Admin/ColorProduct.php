<?php

namespace App\Http\Livewire\Admin;

use App\Models\Color;
use App\Models\Product;
use Livewire\Component;

class ColorProduct extends Component
{

  public $product, $colors, $color_id, $quantity;

  protected $rules = [
    'color_id'    =>  'required',
    'quantity'    =>  'required|numeric',
  ];

  public function mount()
  {
    $this->colors = Color::all();
  }

  public function save()
  {
    $this->validate();
    $this->product->colors()->attach(
      $this->color_id,
      [
        'quantity'   => $this->quantity,
        'created_at' => now(),
        'updated_at' => now(),
      ]
    );

    $this->reset(['color_id', 'quantity']);
    $this->emit('saved');
  }

  public function render()
  {
    $product_colors = $this->product->color;
    return view('livewire.admin.color-product', compact('product_colors'));
  }
}
