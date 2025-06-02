<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Product::create(['name' => 'Laptop', 'category_id' => 1, 'description' => 'High-performance laptop', 'price' => 999.99, 'stock' => 10, 'image' => 'images/laptop.jpg']);
        Product::create(['name' => 'Smartphone', 'category_id' => 1, 'description' => 'Latest model smartphone', 'price' => 699.99, 'stock' => 20, 'image' => 'images/smartphone.jpg']);
        Product::create(['name' => 'Headphones', 'category_id' => 2, 'description' => 'Noise-cancelling headphones', 'price' => 199.99, 'stock' => 15, 'image' => 'images/headphones.jpg']);
    }
}
