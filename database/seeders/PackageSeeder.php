<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Package::factory()->create([
            'id' => 0,
            'title' => 'Regular Entry',
            'description' => 'Acess to the site and scenes',
            'price' => 25,

        ]);
        Package::factory()->create([
            'id' => 0,
            'title' => 'Da Vinci',
            'description' => 'Welcome drink, Surprise gift',
            'price' => 40,

        ]);
        Package::factory()->create([
            'id' => 0,
            'title' => 'VIP',
            'description' => 'Open bar · Food · Seats in vip lodge',
            'price' => 190,

        ]);
    }
}
