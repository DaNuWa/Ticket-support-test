<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //Client users seeder
        \App\Models\User::factory(10)->create();

        //Supporter users seeder
        foreach (range(1, 10) as $key => $value) {
            \App\Models\User::factory(1)->create(['email' => 'supporter'.$value.'@test.com', 'password' => Hash::make('password'), 'is_supporter' => true]);
        }
        //Tickets seeder
        $this->call(TicketSeeder::class);
    }
}
