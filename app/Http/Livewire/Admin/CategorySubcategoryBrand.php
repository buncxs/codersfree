<?php

namespace App\Http\Livewire\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class CategorySubcategoryBrand extends Component
{

  public $categories, $subcategories = [], $brands = [];
  public $category_id, $subcategory_id = "", $brand_id = "";

  public function mount($category_id = "", $subcategory_id = "", $brand_id = "")
  {
    $this->categories = Category::all(['id', 'name']);
    if ($category_id) {
      $this->subcategories = Subcategory::where('category_id', $category_id)->get(['id', 'name']);
      $this->brands = Brand::whereHas('categories', function (Builder $query) use ($category_id) {
        $query->where('category_id', $category_id);
      })->get(['id', 'name']);
    }
    $this->category_id = $category_id;
    $this->subcategory_id = $subcategory_id;
    $this->brand_id = $brand_id;
  }

  public function updatedCategoryId($value)
  {
    $this->subcategories = Subcategory::where('category_id', $value)->get(['id', 'name']);
    $this->brands = Brand::whereHas('categories', function (Builder $query) use ($value) {
      $query->where('category_id', $value);
    })->get(['id', 'name']);
    $this->reset(['subcategory_id', 'brand_id']);
  }

  public function render()
  {
    return view('livewire.admin.category-subcategory-brand');
  }
}
