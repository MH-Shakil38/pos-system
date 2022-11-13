<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\admin\Product;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 200) as $index)  {
            DB::table('products')->insert([
                'name' => $faker->city,
                'slug' => $faker->unique()->slug,
                'sku_no' => $faker->unique()->slug,
                'product_code' => $faker->unique()->slug,
                'thumbnail' =>$faker->image(null, 360, 360, 'animals', true),
                'details' => $faker->paragraph($nb =2),
                'price' => $faker->numberBetween($min = 500, $max = 8000),
                'stock' => rand(1,100),
                'created_by'=> 2

            ]);
        }
    }
}
