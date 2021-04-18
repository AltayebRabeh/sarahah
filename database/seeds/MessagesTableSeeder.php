<?php

use App\Models\Message;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $users = collect(User::all()->modelKeys());

        for($i = 0; $i < 20; $i++) {
            Message::create([
               'message' => $faker->paragraph(),
               'ip_address' => $faker->ipv6(),
               'user_id' => $users->random(),
            ]);
        }
    }
}
