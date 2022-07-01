<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

use Faker\Factory;

class productsSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 1; $i <= 100; $i++) {
            Product::create([
                'category_id' => $faker->numberBetween(1, 6),
                'product_name' => $faker->company,
                'price' => $faker->numberBetween(23_000, 940_000),
                // 'image' => $faker->imageUrl(450, 300, 'product'),
                'image' => 'https://picsum.photos/450/300?random=' . $faker->numberBetween(1, 100),
                // 'image' => $faker->imageUrl(450, 300),
                // 'image' => $faker->image('public/storage/images', 450, 300, null, false),
                'description' => $faker->paragraph(1),
            ]);
        }
    }
}
