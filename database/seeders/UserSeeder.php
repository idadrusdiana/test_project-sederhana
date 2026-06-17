<?php

namespace Database\Seeders;

use App\Domain\MasterData\Entities\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $admin = User::create([
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('rahasia'),
        ]);
        $admin->assignRole('superadmin');

        $admin = User::create([
            'username' => 'store',
            'email' => 'store@example.com',
            'password' => bcrypt('rahasia'),
        ]);
        $admin->assignRole('store');
    }
}
