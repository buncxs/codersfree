<?php

namespace Database\Seeders;

use App\Models\Subcategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = [
            /*Celulares y Tablets*/
            [
                'name'          =>  'Celulares y Smartphones',
                'slug'          =>  Str::slug('Celulares y Smartphones'),
                'category_id'   =>  1,
                'color'         =>  1,
            ],
            [
                'name'          =>  'Accesorios para Celulares',
                'slug'          =>  Str::slug('Accesorios para Celulares'),
                'category_id'   =>  1,
            ],
            [
                'name'          =>  'Smartwatch',
                'slug'          =>  Str::slug('Smartwatch'),
                'category_id'   =>  1,
            ],
            /* Tv, Audio y Video */
            [
                'name'          =>  'Tv y Audio',
                'slug'          =>  Str::slug('Tv y Audio'),
                'category_id'   =>  2,
            ],
            [
                'name'          =>  'Audios',
                'slug'          =>  Str::slug('Audios'),
                'category_id'   =>  2,
            ],
            [
                'name'          =>  'Audio para Autos',
                'slug'          =>  Str::slug('Audio para Autos'),
                'category_id'   =>  2,
            ],
            /* Consola y Videojuegos*/
            [
                'name'          =>  'Xbox',
                'slug'          =>  Str::slug('Xbox'),
                'category_id'   =>  3,
            ],
            [
                'name'          =>  'Playstation',
                'slug'          =>  Str::slug('Playstation'),
                'category_id'   =>  3,
            ],
            [
                'name'          =>  'Pc Gaming',
                'slug'          =>  Str::slug('Pc Gaming'),
                'category_id'   =>  3,
            ],
            [
                'name'          =>  'Nintendo',
                'slug'          =>  Str::slug('Nintendo'),
                'category_id'   =>  3,
            ],
            /* Computacion*/
            [
                'name'          =>  'Portatiles',
                'slug'          =>  Str::slug('Portatiles'),
                'category_id'   =>  4,
            ],
            [
                'name'          =>  'Pc Desktop',
                'slug'          =>  Str::slug('Pc Desktop'),
                'category_id'   =>  4,
            ],
            [
                'name'          =>  'Storage',
                'slug'          =>  Str::slug('Storage'),
                'category_id'   =>  4,
            ],
            [
                'name'          =>  'Pc Peripherals',
                'slug'          =>  Str::slug('Pc Peripherals'),
                'category_id'   =>  4,
            ],
             /* Moda */
             [
                'name'          =>  'Mujeres',
                'slug'          =>  Str::slug('Mujeres'),
                'category_id'   =>  5,
                'color'         =>  1,
                'size'          =>  1,
            ],
             [
                'name'          =>  'Hombres',
                'slug'          =>  Str::slug('Hombres'),
                'category_id'   =>  5,
                'color'         =>  1,
                'size'          =>  1,
            ],
             [
                'name'          =>  'Lentes',
                'slug'          =>  Str::slug('Lentes'),
                'category_id'   =>  5,
            ],
            [
                'name'          =>  'Relojes',
                'slug'          =>  Str::slug('Relojes'),
                'category_id'   =>  5,
            ],
        ];
        foreach ($subcategories as $subcategory) {
            Subcategory::factory(1)->create($subcategory);
        }
    }
}
