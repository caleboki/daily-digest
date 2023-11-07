<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NewsCategory;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['World News', 'Technology', 'Health'];

        foreach ($categories as $category) {
            NewsCategory::create(['name' => $category]);
        }
    }
}
