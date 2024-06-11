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
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@paneladmin.com',
            'password' => Hash::make('admin'),
        ]);

        $admin->assignRole('admin');

        $editor = User::create([
            'name' => 'editos',
            'email' => 'editor@paneladmin.com',
            'password' => Hash::make('editor'),
        ]);

        $editor ->assignRole('editor');
    }
}
