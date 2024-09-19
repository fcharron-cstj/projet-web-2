<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::factory()->create([
            "title" => "admin"
        ]);
        Role::factory()->create([
            "title" => "client"
        ]);

        /* Role::factory()->create(2); */
    }
}
