<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name'  =>  'Celulares y Tablets',
                'slug'  =>  Str::slug('Celulares y Tablets'),
                'icon'  =>  '<i class="fa-solid fa-mobile-screen-button"></i>'
            ],
            [
                'name'  =>  'Tv, Audio y Video',
                'slug'  =>  Str::slug('Tv, Audio y Video'),
                'icon'  =>  '<i class="fa-solid fa-tv"></i>'
            ],
            [
                'name'  =>  'Consola y Videojuegos',
                'slug'  =>  Str::slug('Consola y Videojuegos'),
                'icon'  =>  '<i class="fa-brands fa-playstation"></i>'
            ],
            [
                'name'  =>  'Computacion',
                'slug'  =>  Str::slug('Computacion'),
                'icon'  =>  '<i class="fa-solid fa-computer"></i>'
            ],
            [
                'name'  =>  'Moda',
                'slug'  =>  Str::slug('Moda'),
                'icon'  =>  '<i class="fa-solid fa-shirt"></i>'
            ],
        ];

        foreach ($categories as $category) {
            /* Retorna el primer elemento */
            $cat = Category::factory(1)->create($category)->first();
            /* Retorna una Coleccion*/
            $brands = Brand::factory(4)->create();
            foreach ($brands as $brand) {
                $brand->categories()->attach($cat->id);
            }
        }

    }
}
