<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Shawn',
            'last_name' => 'LeMouton',
            'email' => '1@1.com',
            'password' => Hash::make('password1'),
            'role_id' => 1
        ]);

        User::factory(2)->create();
    }
}