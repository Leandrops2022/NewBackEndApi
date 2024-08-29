<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name'     => 'Admin User',
            'email'    => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);

        // Assign the admin role to the user
        $admin->roles()->attach(Role::where('name', 'admin')->first()->id);
    }
}
