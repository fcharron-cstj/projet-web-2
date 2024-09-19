<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Activity::factory()->create([
            'id' => 1,
            'title' => 'Activity 1',
            'description' => 'Description of Activity 1',
        ]);

        Activity::factory()->create(3);
    }
}
