<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Category::create(['category_name' => 'Apartment']);
        Category::create(['category_name' => 'House']);
        Category::create(['category_name' => 'Condo']);
        // Add more categories as needed
    }
}
