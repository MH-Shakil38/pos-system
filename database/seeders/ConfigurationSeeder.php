<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Origin;
use App\Models\PaymentType;
use App\Models\Size;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ConfigurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Electronics',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'Hobby',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'Sports',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'Cloth',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'Shoes',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
        ];
        foreach($categories as $item)
        {
            Category::create([
                'name' => $item['name'],
                'slug' => $item['slug'],
                'created_by' => 2,
            ]);
        }
        $brands = [
            [
                'name' => 'Lotto',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'Apex',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'Bata',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'Oppo',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'Realme',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
        ];
        foreach($brands as $item)
        {
            Brand::create([
                'name' => $item['name'],
                'slug' => $item['slug'],
                'created_by' => 2,
            ]);
        }
        $origins = [
            [
                'name' => 'Bangladesh',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'indian',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'USA',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'Japan',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'Pakistan',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
        ];
        foreach($origins as $item)
        {
            Origin::create([
                'name' => $item['name'],
                'slug' => $item['slug'],
                'created_by' => 2,
            ]);
        }
        $colors = [
            [
                'name' => 'red',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'green',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'blue',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'Yellow',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'cyan',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
        ];
        foreach($colors as $item)
        {
            Color::create([
                'name' => $item['name'],
                'slug' => $item['slug'],
                'created_by' => 2,
            ]);
        }
        $sizes = [
            [
                'name' => 'Xl',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'XXL',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'M',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'S',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => '40',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
        ];
        foreach($sizes as $item)
        {
            Size::create([
                'name' => $item['name'],
                'slug' => $item['slug'],
                'created_by' => 2,
            ]);
        }
        $payment_types = [
            [
                'name' => 'Cash',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'Bkash',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'Nagad',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'Online',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
            [
                'name' => 'Card',
                'slug' => Str::slug(rand(0,9999)),
                'created_by' => '2',
            ],
        ];
        foreach($payment_types as $item)
        {
            PaymentType::create([
                'name' => $item['name'],
                'slug' => $item['slug'],
                'created_by' => 2,
            ]);
        }

    }
}
