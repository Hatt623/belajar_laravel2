<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Import
use DB;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->delete();

        Category::create([
            'name' => 'Elektronik',
            'slug' => 'elektronik',
        ]);

        Category::create([
            'name' => 'Perabotan Rumah',
            'slug' => 'perabotan-rumah'
        ]);
    }
}
