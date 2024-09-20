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
        $this->call([
            RoleSeeder::class,
            ArticleSeeder::class,
            ScheduleSeeder::class,
            PackageSeeder::class,
            UserSeeder::class,
            ArtistSeeder::class,
            ReservationSeeder::class,
            ArtistScheduleSeeder::class,
        ]);
    }
}
