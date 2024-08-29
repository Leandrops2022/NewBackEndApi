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
        $email = env('ADMIN_EMAIL');
        $password = env('ADMIN_PASSWORD');
        $admin = User::create([
            'name'     => 'Admin',
            'email'    => $email,
            'password' => bcrypt($password),
        ]);

        $admin->assignRole('admin');
    }
}
