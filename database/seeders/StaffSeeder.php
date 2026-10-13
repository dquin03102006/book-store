<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StaffSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'staff@bookstore.com'],
            [
                'name' => 'Nhân viên 1',
                'password' => Hash::make('12345678'),
                'role' => 'staff',
            ]
        );
    }
}
