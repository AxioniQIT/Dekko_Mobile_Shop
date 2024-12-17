<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'address' => '123 Main St',
                'email' => 'admin@example.com',
                'full_name' => 'Admin1',
                'password' => '12345678',
                'password_hash' => bcrypt('12345678'),
                'phone_number' => '0123456789',
                'role' => 'Admin',
                'username' => 'Admin1',
            ],
            [
                'address' => '123 Main St',
                'email' => 'employee@example.com',
                'full_name' => 'Employee1',
                'password' => '12345678',
                'password_hash' => bcrypt('12345678'),
                'phone_number' => '0123456789',
                'role' => 'Employee',
                'username' => 'Employee1',
            ],
            [
                'address' => '123 Main St',
                'email' => 'superadmin@example.com',
                'full_name' => 'Superadmin1',
                'password' => '12345678',
                'password_hash' => bcrypt('12345678'),
                'phone_number' => '0123456789',
                'role' => 'Superadmin',
                'username' => 'Superadmin1',
            ],
        ]);

    }
}
