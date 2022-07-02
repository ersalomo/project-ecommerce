<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i <= 100; $i++) {
            DB::table('products')->insert([
                'category_id' => $faker->numberBetween(1, 6),
                'product_name' => $faker->bothify('???-#?##'),
                'price' => $faker->numberBetween(23_000, 940_000),
                'image' => 'https://picsum.photos/450/300?random=' . $this->faker->numberBetween(1, 100),
                'description' => $faker->paragraph(1),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
        // return [
        //     'category_id' => $faker->numberBetween(1, 6),
        //     'product_name' => $faker->bothify('???-#?##'),
        //     'price' => $faker->numberBetween(23_000, 940_000),
        //     'image' => 'https://picsum.photos/450/300?random=' . $this->faker->numberBetween(1, 100),
        //     'description' => $faker->paragraph(1),
        // ];
    }
}
