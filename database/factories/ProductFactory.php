<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
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
        $brands = Brand::all();
        return [
            'name' => $this->faker->name(),
            'barcode' => $this->faker->numberBetween(1000, 300000000),
            'brand_id' => ($brands->first()) ? $brands->random()->id : null,
            'price' => rand(11, 221) / 10,
            'image_url' => $this->faker->imageUrl()
        ];
    }
}