<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Builder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* Tallas */
        $sizes = ['small', 'medium', 'large'];

        /* Obtengo los productos que pertenecen a la subcategoria con size y color */
        $products = Product::whereHas('subcategory', function(Builder $query) {
            $query->where('size', '=', 1)
            ->where('color', '=', 1);
        })->get();

        foreach ($products as $product) {
            foreach ($sizes as $size) {
                $product->sizes()->create([
                    'name'          =>  $size,
                ]);  
            }
        }

    }
}
