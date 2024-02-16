<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Emre',
                'email' => 'emre@bulut.com',
                'password' => bcrypt('12345678'),
                'role' => 'admin'
            ],
            [
                'name' => 'mehmet',
                'email' => 'mehmet@mail.com',
                'password' => bcrypt('12345678'),
                'role' => 'admin'
            ]
        ]);
    }
}
