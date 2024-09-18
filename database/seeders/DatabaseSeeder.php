<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $roles = [['title' => 'admin'], ['title' => 'user']];

        collect($roles)->each(function ($roles) {
            Role::factory()->create($roles);
        });
        User::factory(1)->create();
    }
}
