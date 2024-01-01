<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersCount = max((int) $this->command->ask('How many users would you like?', 10), 1);
        User::factory()->johnDoe()->create();
        User::factory($usersCount)->create();
    }
}