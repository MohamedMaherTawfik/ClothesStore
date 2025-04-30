<?php

namespace Database\Seeders;

use App\Models\brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class brandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            [
                'name'=>'nike',
                'image'=>'nike.png'
            ],
            [
                'name'=>'adidas',
                'image'=>'adidas.png'
            ],
            [
                'name'=>'lacoste',
                'image'=>'lacoste.png'
            ],
            [
                'name'=>'polo',
                'image'=>'polo.png'
            ],
            [
                'name'=>'puma',
                'image'=>'puma.png'
            ]
        ];

        foreach ($brands as $brand) {
            brand::create($brand);
        }
    }
}
