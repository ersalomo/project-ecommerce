<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        return [
            'category_id' => $this->faker->numberBetween(1, 6),
            'product_name' => $this->faker->bothify('???-#?##'),
            'price' => $this->faker->numberBetween(23_000, 940_000),
            'image' => 'https://picsum.photos/450/300?random=' . $this->faker->numberBetween(1, 100),
            'description' => $this->faker->paragraph(1),
        ];
    }
}
