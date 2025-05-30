<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Administrator',
            'email' => 'superadmin@adms.com',
            'password' => Hash::make('password123'),
            'role' => User::ROLE_SUPERADMIN,
            'branch_id' => null,
            'last_activity' => now(),
        ]);
    }
}
