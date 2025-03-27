<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users =[
            [
                'email' => 'm7mdellham77@gmail.com',
                'first_name' => 'Mohamed',
                'last_name' => 'Maher',
                'password' => Hash::make('M7mdmaher11'),
                'role' => 'admin',
                'phone' => '+201024328382',
            ],
            [
                'email' => 'AhmedMaher@gmail.com',
                'first_name' => 'Ahmed',
                'last_name' => 'Maher',
                'password' => Hash::make('Ahmedmaher11'),
                'role' => 'user',
                'phone' => '+201007352061',
            ]
            ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
