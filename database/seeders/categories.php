<?php

namespace Database\Seeders;

use App\Models\categorey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categories extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name'=>'winter clothes',
                'description'=>'winter clothes description here',
                'image'=>'hody.jpg'
            ],
            [
                'name'=>'women clothes',
                'description'=>'women clothes description here',
                'image'=>'women.jpg'
            ],
            [
                'name'=>'kids clothes',
                'description'=>'kids clothes description here',
                'image'=>'kids.jpeg'
            ],
            [
                'name'=>'suits',
                'description'=>'suits description here',
                'image'=>'suits.jpg'
            ],
            [
                'name'=>'summer clothes',
                'description'=>'summer clothes description here',
                'image'=>'summer.jpeg'
            ],
            [
                'name'=>'trousers',
                'description'=>'trousers description here',
                'image'=>'trouser.jpg'
            ],
        ];

        foreach ($categories as $category) {
            categorey::create($category);
        }
    }
}
