<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
              'name' => 'user1',
              'email' => 'user1@user1',
              'password' => bcrypt('user1'),
            ],
        ]);
    }
}
