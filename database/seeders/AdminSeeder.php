<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Users;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $existingAdmin = Users::where('username', 'admin')->first();

        if (!$existingAdmin) {

            Users::create([
                'firstname' => 'Admin',
                'lastname' => 'User',
                'username' => 'admin',
                'password' => Hash::make('admin123'), 
                'confirm_password' => Hash::make('admin123'), 
                'user_type' => 'admin',
                'profile' => null, 
            ]);

            $this->command->info('Default admin account created successfully.');
        } else {
            $this->command->info('Default admin account already exists.');
        }
    }
}

