<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory()->createMany([
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@orderlikey.com',
                'user_type' => '0',
            ],
            [
                'name' => 'Kesukomp',
                'email' => 'kesukomp@orderlikey.com',
                'user_type' => '1',
            ],
            [
                'name' => 'Kiosk',
                'email' => 'kiosk@orderlikey.com',
                'user_type' => '2',
            ],
            [
                'name' => 'Customer',
                'email' => 'customer@orderlikey.com',
                'user_type' => '3',
            ],
        ]);
    }
}
