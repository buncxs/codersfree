<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryFilter extends Component
{
    use WithPagination;

    public $category, $subcategoryF, $brandF;

    public $view = 'grid';

    public function cleanFilters()
    {
        $this->reset(['subcategoryF', 'brandF']);
    }

    public function render()
    {
        /*$products = $this->category->products()
                    ->where('status', 2)->paginate(20);*/

        /* Query */
        $productsQuery = Product::query()->whereHas('subcategory.category', function (Builder $query){
             $query->where('id', $this->category->id);
        });

        /* Filters */
        if($this->subcategoryF)
        {
            $productsQuery = $productsQuery->whereHas('subcategory', function(Builder $query){
                $query->where('name', $this->subcategoryF);
            });
        }
        if($this->brandF)
        {
            $productsQuery = $productsQuery->whereHas('brand', function(Builder $query){
                $query->where('name', $this->brandF);
            });
        }

        /* Get collection */
        $products = $productsQuery->paginate(20);

        return view('livewire.category-filter', compact('products'));
    }
}
