<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Notifications\Action;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            ArticleSeeder::class,
            DaySeeder::class,
            PackageSeeder::class,
            ActivitySeeder::class,
            ReservationSeeder::class,
            ScheduleSeeder::class,
        ]);
    }
}
