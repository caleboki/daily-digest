<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\NewsCategory;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'Caleb',
            'email' => 'caleboki@gmail.com',
            'password' => Hash::make('password'), // Use Hash facade for security
        ]);

        $categories = NewsCategory::all();
        $user->newsCategories()->attach($categories);
    }
}
