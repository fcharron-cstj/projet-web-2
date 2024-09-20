<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Alex',
            'last_name' => 'Masi',
            'email' => 'am@email.com',
            'role_id' => 1
        ]);

        User::factory(2)->create();
    }
}
