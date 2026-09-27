<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    public function definition(): array
    {
        $categories = [
            'Elektronik',
            'Laptop',
            'Smartphone',
            'Aksesoris Komputer',
            'Gaming',
            'Audio',
            'Smart Home',
            'Gadget',
            'Perangkat Kantor',
            'Storage',
        ];

        $name = fake()->unique()->randomElement($categories);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->sentence(10),
            'is_active' => true,
        ];
    }
}