<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // =========================
        // USERS
        // =========================

        User::create([
            'name' => 'Admin E-Commerce',
            'email' => 'admin@ecommerce.test',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'Editor E-Commerce',
            'email' => 'editor@ecommerce.test',
            'password' => Hash::make('password'),
            'role' => 'editor',
        ]);

        User::factory(8)->create([
            'role' => 'user',
        ]);

        // =========================
        // CATEGORIES
        // =========================

        Category::factory(10)->create();

        // =========================
        // PRODUCTS
        // =========================

        Product::factory(60)->create();
    }
}