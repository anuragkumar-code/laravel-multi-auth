<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@example.com',
                'role' => User::ROLE_ADMIN,
            ],
            [
                'name' => 'Inventory Manager',
                'email' => 'inventory@example.com',
                'role' => User::ROLE_INVENTORY_MANAGER,
            ],
            [
                'name' => 'L3 Engineer',
                'email' => 'l3engineer@example.com',
                'role' => User::ROLE_L3_ENGINEER,
            ],
            [
                'name' => 'L3 Tester',
                'email' => 'l3tester@example.com',
                'role' => User::ROLE_L3_TESTER,
            ],
            [
                'name' => 'Accounts Manager',
                'email' => 'accounts@example.com',
                'role' => User::ROLE_ACCOUNTS_MANAGER,
            ],
            [
                'name' => 'General Manager',
                'email' => 'generalmanager@example.com',
                'role' => User::ROLE_GENERAL_MANAGER,
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make('test@123'),
                'role' => $user['role'],
            ]);
        }
    }
}
