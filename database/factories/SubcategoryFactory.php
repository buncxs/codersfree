<?php

namespace Database\Factories;

use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subcategory>
 */
class SubcategoryFactory extends Factory
{
    
    protected $model = Subcategory::class;

    public function definition(): array
    {
        return [
            'image' =>  'subcategories/' . fake()->image('public/storage/subcategories', 640, 480, null, false),
        ];
    }
}
