<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(20)->create();
        User::create([
            'name' => 'ユーザー',
            'email' => 'user@user.user',
            'password' => Hash::make('password'),
            'access_auth' => '9'
        ]);
    }
}
