<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    public function definition(): array
    {
        $products = [
            'Laptop ASUS Vivobook',
            'Laptop Lenovo IdeaPad',
            'Laptop HP Pavilion',
            'Smartphone Samsung Galaxy',
            'Smartphone Xiaomi Redmi',
            'Smartphone OPPO Reno',
            'iPhone Series',
            'Tablet Samsung Galaxy Tab',
            'Tablet Xiaomi Pad',
            'Headphone Wireless',
            'Earbuds Bluetooth',
            'Keyboard Mechanical',
            'Mouse Wireless',
            'Monitor LED 24 Inch',
            'Webcam Full HD',
            'Power Bank 20000mAh',
            'Charger USB-C',
            'Smartwatch Digital',
            'Flashdisk 128GB',
            'SSD External 1TB',
        ];

        $baseName = fake()->randomElement($products);
        $name = $baseName . ' ' . fake()->unique()->numberBetween(1000, 9999);

        return [
            'category_id' => Category::inRandomOrder()->first()->id,
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->paragraph(2),
            'price' => fake()->numberBetween(50000, 15000000),
            'stock' => fake()->numberBetween(5, 100),
            'image' => null,
            'is_active' => true,
            'is_featured' => fake()->boolean(25),
        ];
    }
}