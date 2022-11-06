<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'User']);
        
        $admin = User::create([
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('12345678'),
        ]);
        $admin->assignRole('Admin');

        $user = User::create([
            'name'      => 'User',
            'email'     => 'user@gmail.com',
            'password'  => bcrypt('12345678'),
        ]);
        $user->assignRole('User');
    }
}
