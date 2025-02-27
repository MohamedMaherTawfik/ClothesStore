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
        User::create([
            'email' => 'm7mdellham77@gmail.com',
            'name' => 'Mohamed Maher',
            'password' => Hash::make('M7mdmaher11'),
            'role' => 'admin',
            'address' => 'Elteera Street Mansourah Egypt',
            'phone' => '+201024328382',

        ]);
    }
}
