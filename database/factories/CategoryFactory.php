<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    
    protected $model = Category::class;

    public function definition(): array
    {
        return [
            'image' =>  'categories/' . fake()->image('public/storage/categories', 640, 480, null, false),
        ];
    }
}
