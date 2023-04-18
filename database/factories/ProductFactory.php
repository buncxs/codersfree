<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;



class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        $name           = fake()->sentence(2);
        $subcategory    = Subcategory::all()->random();
        $category       = $subcategory->category;
        $brand          = $category->brands->random();

        /* Validar en que tabla se guarda la cantidad de acuerdo al valor de color y size */
        ($subcategory->color) ? $quantity = null : $quantity = 15;
        
        return [
            'name'              => $name,
            'slug'              => Str::slug($name),
            'description'       => fake()->text(),
            'price'             => fake()->randomElement([19.99, 49.99, 99.99]),
            'subcategory_id'    => $subcategory->id,
            'brand_id'          => $brand->id,
            'quantity'          => $quantity,
            'status'            => 2,
        ];
    }
}
