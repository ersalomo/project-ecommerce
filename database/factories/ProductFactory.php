<?php

namespace Database\Factories;

// use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
        $faker = Factory::create();
        return [
            'category_id' => $faker->numberBetween(1, 6),
            'product_name' => $faker->bothify('???-#?##'),
            'price' => $faker->numberBetween(23_000, 940_000),
            'image' => 'https://picsum.photos/450/300?random=' . $this->faker->numberBetween(1, 100),
            'description' => $faker->paragraph(1),
        ];
    }
}
