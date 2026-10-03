<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@bookstore.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
            ]
        );

        User::updateOrCreate(
            ['email' => 'customer1@bookstore.com'],
            [
                'name' => 'Khách hàng 1',
                'password' => Hash::make('12345678'),
                'role' => 'customer',
            ]
        );

        User::updateOrCreate(
            ['email' => 'customer2@bookstore.com'],
            [
                'name' => 'Khách hàng 2',
                'password' => Hash::make('12345678'),
                'role' => 'customer',
            ]
        );
    }
}
