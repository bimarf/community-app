<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                'username' => 'admin',
                'email' => 'admin@mediadiscuss.com',
                'password' => bcrypt('password'),
                'picture' => config('app.avatar_generator_url') . 'admin',
            ]
        );
    }
}
