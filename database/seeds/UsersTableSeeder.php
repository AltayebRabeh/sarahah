<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name' => 'Altayeb Rabeh',
            'username' => 'altayeb',
            'email' => 'altayeb@gmail.com',
            'bio' => 'leave your message here',
            'password' => bcrypt('123123123'),
            'email_verified_at' => \Carbon\Carbon::now()
        ]);
    }
}
