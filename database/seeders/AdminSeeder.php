<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin::factory(20)->create();

        Admin::create([
            'name' => '管理者',
            'email' => 'admin@admin.admin',
            'password' => Hash::make('password'),
            'access_auth' => '9'
        ]);
    }
}
