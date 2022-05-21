<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Faker\Factory;
use Illuminate\Support\Facades\DB;
use  Carbon\Carbon;

class categorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // static $categories = ['Clothes', 'Shoes', 'Electronic', 'adad'];
    static $categories = array('Clothes', 'Shoes', 'Electronic', 'Sports', 'Foods', 'Bags');

    public function run()
    {
        for ($item = 0; $item < count(categorySeed::$categories); $item++) {
            DB::table('Categories')->insert([
                'category_name' => categorySeed::$categories[$item],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
