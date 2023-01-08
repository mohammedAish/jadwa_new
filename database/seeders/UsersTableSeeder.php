<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        User::query()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'phone' => '0592171803',
            'password' => Hash::make('123456789'),
            'type' => 'admin',
            'email_verified_at' => Date::now(),
        ]);

        User::query()->create([
            'name' => 'ahmad',
            'email' => 'user1@app.com',
            'phone' => '0592203534',
            'password' => Hash::make('123456789'),
            'type' => 'client',
            'email_verified_at' => Date::now(),
        ]);
        User::query()->create([
            'name' => 'omar',
            'email' => 'user2@app.com',
            'phone' => '0592203532',
            'password' => Hash::make('123456789'),
            'type' => 'client',
            'email_verified_at' => Date::now(),
        ]);
        User::query()->create([
            'name' => 'akram',
            'email' => 'user3@app.com',
            'phone' => '0592203531',
            'password' => Hash::make('123456789'),
            'type' => 'client',
            'email_verified_at' => Date::now(),
        ]);

    }
}
