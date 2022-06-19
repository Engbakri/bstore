<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker; 
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
            $factory->define(Product::class, function (Faker $faker) {
                return [
                    'product_name' => $faker->word,
                    'product_description' => $faker->sentence,
                    'product_price' => $faker->randomFloat(2, 0, 10000),
                    'product_image' => $faker->image('public/storage/images',640,480, null, false),
    
                ];
            });
        
    }
}
