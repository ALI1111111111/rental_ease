<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
      // Admin User
      User::create([
        'username' => 'admin_user',
        'name' => 'Admin User',
        'email' => 'admin@example.com',
        'password' => bcrypt('admin_password'),
        'role_id' => 1, // Admin role
    ]);

    // Landlord User
    User::create([
        'username' => 'landlord_user',
        'name' => 'Landlord User',
        'email' => 'landlord@example.com',
        'password' => bcrypt('landlord_password'),
        'role_id' => 2, // Landlord role
    ]);

    // Customer User
    User::create([
        'username' => 'customer_user',
        'name' => 'Customer User',
        'email' => 'customer@example.com',
        'password' => bcrypt('customer_password'),
        'role_id' => 3, // Customer role
    ]);
}
}
