<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class ColorProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* Obtengo los productos que pertenecen a la subcategoria con color */
        $products = DB::table('products')
        ->join('subcategories', 'products.subcategory_id', 'subcategories.id')
        ->select('products.*')
        ->where('subcategories.color', '=', 1)
        ->where('subcategories.size', '=', 0)
        ->get();

        foreach ($products as $product) {
            DB::table('color_product')->insert([
                ['color_id' => 1, 'product_id' => $product->id, 'quantity' => 10, 
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['color_id' => 2, 'product_id' => $product->id, 'quantity' => 10,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['color_id' => 3, 'product_id' => $product->id, 'quantity' => 10,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['color_id' => 4, 'product_id' => $product->id, 'quantity' => 10,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
                ['color_id' => 5, 'product_id' => $product->id, 'quantity' => 10,
                'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ]);
        }


    }


}
