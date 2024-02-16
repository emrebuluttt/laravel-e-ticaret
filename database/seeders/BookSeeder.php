<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = User::admins()->get();
        foreach ($users as $user) {
            Book::factory(['user_id'=> $user->id])->count(10)->create();
        }
    }
}
