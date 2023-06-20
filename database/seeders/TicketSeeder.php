<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Ticket::create([
                'description' => $faker->paragraph(2),
                'reference_id' => $faker->uuid(),
                'user_id' => rand(1, 10),
            ]);
        }
    }
}
