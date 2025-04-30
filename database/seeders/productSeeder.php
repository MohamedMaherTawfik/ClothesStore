<?php

namespace Database\Seeders;

use App\Models\products;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class productSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Product 1',
                'description' => 'Description for Product 1',
                'price' => 100,
                'quantity' => 10,
                'image' => 'hody.jpg',
                'rating' => 4,
                'discount' => null,
                'status' => 'available',
                'categorey_id' => 1,
                'brand_id' => 1
            ],
            [
                'name' => 'Product 2',
                'description' => 'Description for Product 2',
                'price' => 200,
                'quantity' => 5,
                'image' => 'hody2.jpg',
                'rating' => 4,
                'discount' => 20,
                'status' => 'available',
                'categorey_id' => 1,
                'brand_id' => 1
            ],
            [
                'name' => 'Product 2',
                'description' => 'Description for Product 2',
                'price' => 200,
                'quantity' => 5,
                'image' => 'hody1.jpg',
                'rating' => 3,
                'discount' => 20,
                'status' => 'available',
                'categorey_id' => 1,
                'brand_id' => 1
            ],
            [
                'name' => 'Product 2',
                'description' => 'Description for Product 2',
                'price' => 200,
                'quantity' => 5,
                'image' => 'hody1.jpg',
                'rating' => 2,
                'discount' => 20,
                'status' => 'available',
                'categorey_id' => 1,
                'brand_id' => 1
            ],
            [
                'name' => 'Product 2',
                'description' => 'Description for Product 2',
                'price' => 200,
                'quantity' => 5,
                'image' => 'hody1.jpg',
                'rating' => 5,
                'discount' => 20,
                'status' => 'available',
                'categorey_id' => 1,
                'brand_id' => 1
            ],
            [
                'name' => 'Product 2',
                'description' => 'Description for Product 2',
                'price' => 200,
                'quantity' => 5,
                'image' => 'hody1.jpg',
                'rating' => 3,
                'discount' => 20,
                'status' => 'available',
                'categorey_id' => 2,
                'brand_id' => 2
            ],
            [
                'name' => 'Product 3',
                'description' => 'Description for Product 3',
                'price' => 300,
                'quantity' => 8,
                'image' => 'hody2.jpg',
                'rating' => 1,
                'discount' => null,
                'status' => 'available',
                'categorey_id' => 3,
                'brand_id' => 3
            ],
        ];
        foreach ($products as $product) {
            products::create($product);
        }
    }
}
