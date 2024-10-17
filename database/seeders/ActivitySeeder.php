<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds fir developpement
     */
    public function run(): void
    {
        // Friday schedule
        $activities = [
            ['title' => 'Singer', 'artists' => 'Aurélie Roy', 'media' => 'medias/singer-aurélie-roy.jpg', 'time' => '12:00:00'],
            ['title' => 'Humorist', 'artists' => 'Léo Tremblay', 'media' => 'medias/humorist-leo-tremblay.jpg', 'time' => '13:00:00'], 
            ['title' => 'Guitar player', 'artists' => 'Nicolas Fortin', 'media' => 'medias/guitar-chantal-fortin.jpg', 'time' => '14:00:00'],
            ['title' => 'Rock Band', 'artists' => 'DownHill', 'media' => 'medias/rockband-downhill.jpg', 'time' => '15:00:00'], 
            ['title' => 'Fire Dancer', 'artists' => 'Sophia Castillo', 'media' => 'medias/fire-dancer-sophia-castillo.jpg', 'time' => '16:00:00'],
            ['title' => 'Dance Crew', 'artists' => 'Las chicass', 'media' => 'medias/dance-crew-las-chicass.jpg', 'time' => '17:00:00'],
            ['title' => 'Acoustic Singer', 'artists' => 'Rose Williams', 'media' => 'medias/acoustic-lucas-williams.jpg', 'time' => '18:00:00'],
            ['title' => 'Music Band', 'artists' => 'Rockies', 'media' => 'medias/music-band-rockies.jpg', 'time' => '19:00:00'],
            ['title' => 'DJ', 'artists' => 'DJ Wave', 'media' => 'medias/dj-dj-wave.jpg', 'time' => '20:00:00'],
            ['title' => 'Acrobats', 'artists' => 'Sunchilds', 'media' => 'medias/acrobats-sunchilds.jpg', 'time' => '21:00:00'],
            ['title' => 'Fireworks', 'artists' => 'Mont-Tremblant', 'media' => 'medias/fireworks.jpg', 'time' => '22:00:00'],
            ['title' => 'Percussion Band', 'artists' => 'Rhythm Pulse', 'media' => 'medias/percussion-rhythm-pulse.jpg', 'time' => '23:00:00']
        ];

        foreach ($activities as $activity) {
            Activity::factory()->create([
                'title' => $activity['title'],
                'artists' => $activity['artists'],
                'date' => '2025-04-04 ' . $activity['time'],
                'media' => $activity['media']
            ]);
        }

        // Saturday schedule
        $activitiesDay2 = [
            ['title' => 'Singer', 'artists' => 'Isabelle Tremblay', 'media' => 'medias/singer-isabelle-tremblay.jpg', 'time' => '12:00:00'],
            ['title' => 'Humorist', 'artists' => 'Nathan Green', 'media' => 'medias/humorist-nathan-green.jpg', 'time' => '13:00:00'],
            ['title' => 'Violinist', 'artists' => 'Fern Dupont', 'media' => 'medias/violinist-fern-dupont.jpg', 'time' => '14:00:00'],
            ['title' => 'Rock Band', 'artists' => 'Northern Lights', 'media' => 'medias/rockband-northern-lights.jpg', 'time' => '15:00:00'], 
            ['title' => 'Fire Dancer', 'artists' => 'Ethan Rivera', 'media' => 'medias/fire-dancer-ethan-rivera.jpg', 'time' => '16:00:00'],
            ['title' => 'Visual artist', 'artists' => 'Matt Siew', 'media' => 'medias/ballet-graceful-steps.jpg', 'time' => '17:00:00'],
            ['title' => 'Folk Singer', 'artists' => 'Noah Fraser', 'media' => 'medias/folk-noah-fraser.jpg', 'time' => '18:00:00'],
            ['title' => 'Jazz Band', 'artists' => 'Blue Notes', 'media' => 'medias/jazz-blue-notes.jpg', 'time' => '19:00:00'],
            ['title' => 'DJ', 'artists' => 'DJ Flow', 'media' => 'medias/dj-flow.jpg', 'time' => '20:00:00'],
            ['title' => 'Circus Performers', 'artists' => 'The Cirque Collective', 'media' => 'medias/circus-collective.jpg', 'time' => '21:00:00'],
            ['title' => 'Jazz Singer', 'artists' => 'Lila Martine', 'media' => 'medias/jazz-singer-lila-martine.jpg', 'time' => '22:00:00'], 
            ['title' => 'Electronic Band', 'artists' => 'Neon Pulse', 'media' => 'medias/electronic-neon-pulse.jpg', 'time' => '23:00:00']
        ];
        
        foreach ($activitiesDay2 as $activity) {
            Activity::factory()->create([
                'title' => $activity['title'],
                'artists' => $activity['artists'],
                'date' => '2025-04-05 ' . $activity['time'],
                'media' => $activity['media']
            ]);
        }
    
        // Sunday schedule
        $activitiesDay3 = [
            ['title' => 'Experimental DJ Set', 'artists' => 'DJ Meeko', 'media' => 'medias/dj-meeko-experimental.jpg', 'time' => '12:00:00'],
            ['title' => 'Interactive Art Installation', 'artists' => 'Samantha Clarkson', 'media' => 'medias/art-installation-samantha.jpg', 'time' => '13:00:00'],
            ['title' => 'Indie Folk Performance', 'artists' => 'The Maple Leaves', 'media' => 'medias/indie-folk-maple-leaves.jpg', 'time' => '14:00:00'],
            ['title' => 'Live Painting Session', 'artists' => 'Lucie Andretti', 'media' => 'medias/live-painting-luca-andretti.jpg', 'time' => '15:00:00'],
            ['title' => 'Modern Dance Showcase', 'artists' => 'Nova Dance Crew', 'media' => 'medias/dance-nova-crew.jpg', 'time' => '16:00:00'],
            ['title' => 'Acoustic Set', 'artists' => 'Lena McGregor', 'media' => 'medias/acoustic-lena-mcgregor.jpg', 'time' => '17:00:00'],
            ['title' => 'Digital Art Exhibition', 'artists' => 'Pixel Dreams Collective', 'media' => 'medias/digital-art-pixel-dreams.jpg', 'time' => '18:00:00'],
            ['title' => 'Synthwave Band', 'artists' => 'Neon Skies', 'media' => 'medias/synthwave-neon-skies.jpg', 'time' => '19:00:00'],
            ['title' => 'Fire Show Performance', 'artists' => 'Blaze Performers', 'media' => 'medias/fire-show-blaze.jpg', 'time' => '20:00:00'],
            ['title' => 'Jazz Fusion Band', 'artists' => 'Midnight Grooves', 'media' => 'medias/jazz-midnight-grooves.jpg', 'time' => '21:00:00'],
            ['title' => 'Projection Mapping Experience', 'artists' => 'Visual Vibes', 'media' => 'medias/projection-mapping-visual-vibes.jpg', 'time' => '22:00:00'],
            ['title' => 'Electronic Music Finale', 'artists' => 'DJ Pulse', 'media' => 'medias/electronic-dj-pulse.jpg', 'time' => '23:00:00']
        ];
        
        foreach ($activitiesDay3 as $activity) {
            Activity::factory()->create([
                'title' => $activity['title'],
                'artists' => $activity['artists'],
                'date' => '2025-04-06 ' . $activity['time'],
                'media' => $activity['media']
            ]);
        } 
    }
}
