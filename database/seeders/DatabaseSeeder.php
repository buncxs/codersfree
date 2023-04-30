<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $routes = ['products', 'categories', 'subcategories'];
        foreach ($routes as $route) {
            Storage::deleteDirectory($route);
            Storage::makeDirectory($route);
        }
        
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            SubcategorySeeder::class,
            ProductSeeder::class,
            ColorSeeder::class,
            ColorSizeSeeder::class,
            ColorProductSeeder::class,
            SizeSeeder::class,
        ]);
    }
}
