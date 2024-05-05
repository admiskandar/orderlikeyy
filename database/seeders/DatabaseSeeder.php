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
                'name' => 'Kiosk-1',
                'email' => 'kiosk-1@orderlikey.com',
                'user_type' => '2',
            ],
            [
                'name' => 'Kiosk-2',
                'email' => 'kiosk-2@orderlikey.com',
                'user_type' => '2',
            ],
            [
                'name' => 'Kiosk-3',
                'email' => 'kiosk-3@orderlikey.com',
                'user_type' => '2',
            ],
            [
                'name' => 'Customer-1',
                'email' => 'customer-1@orderlikey.com',
                'user_type' => 'Customer',
            ],
            [
                'name' => 'Customer-2',
                'email' => 'customer-2@orderlikey.com',
                'user_type' => 'Customer',
            ],
            [
                'name' => 'Customer-3',
                'email' => 'customer-3@orderlikey.com',
                'user_type' => 'Customer',
            ],
        ]);
    }
}
