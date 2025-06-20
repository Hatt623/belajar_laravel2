<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Import
use DB;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->delete();

        Product::create([
            'name' => 'Samsung S25 5g',
            'slug' => 'samsung-s25-5g',
            'category_id' => 1,
            'description' => 'Lorem Ipsum bla bla bla',
            'image' => 'image.png',
            'price' => 2400000,
            'stock' => 100,
        ]);

        Product::create([
            'name' => 'Sapu Lidi',
            'slug' => 'sapu-lidi',
            'category_id' => 2,
            'description' => 'Lorem Ipsum',
            'image' => 'image.png',
            'price' => 5000,
            'stock' => 1000,
        ]);

    }
}
