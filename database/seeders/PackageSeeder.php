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
            'title' => 'Regular Entry',
            'description' => 'Access to the site and scenes',
            'price' => 25,

        ]);
        Package::factory()->create([
            'title' => 'Da Vinci',
            'description' => 'Welcome drink, Surprise gift',
            'price' => 40,

        ]);
        Package::factory()->create([
            'title' => 'VIP',
            'description' => 'Open bar · Food · Seats in vip lodge',
            'price' => 190,

        ]);
    }
}
