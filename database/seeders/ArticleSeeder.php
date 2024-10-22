<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Article::factory()->create([
            'title' => 'Live Doodle artist!',
            'description' => "This Saturday at 3 PM, the festival will come alive with a mesmerizing live doodle performance by Alec, an artist renowned for his vibrant and spontaneous creations. Armed with just a marker and a blank canvas, Alec’s doodling magic unfolds before your eyes, as he transforms a simple sheet into an expressive piece of art filled with whimsical characters, bold lines, and splashes of color. Whether it's abstract or inspired by the audience’s energy, each doodle tells a story unique to the moment, drawing in the crowd and sparking wonder among both children and adults.
            Alec's performances are not just about creating art but also about engaging with the audience. He often invites viewers to suggest ideas, making each session a collaborative experience. It's a wonderful opportunity to witness creativity in its purest form—spontaneous, fun, and interactive. Be ready to be a part of this artistic journey and perhaps even take home a piece of Alec's lively imagination captured on canvas!",
            'media' => 'medias/doodle_artist.jpg',
            'created_by' => 1
        ]);
        Article::factory()->create([
            'title' => 'Graphitis by the main scene',
            'description' => "The festival's main scene will host a special fusion of art and music as graffiti artists bring their street art to life amidst the beats of live music and dance performances. From bold lettering to striking urban characters, these artists will transform a large canvas into a colorful mural that reflects the vibrant essence of the festival. The raw energy of graffiti, combined with the rhythm of music and the movement of dancers, creates a dynamic spectacle that perfectly captures the spirit of modern street culture.
            This event is more than just art—it's an expression of freedom and creativity. As the mural evolves, festival-goers are welcome to observe the process, engage with the artists, or even contribute with small additions. This celebration of street art will highlight the skill and passion of the graffiti community, showcasing how music, dance, and visual art can coexist harmoniously in an urban setting.",
            'media' => 'medias/graphiti_artist.jpg',
            'created_by' => 2
        ]);
        Article::factory()->create([
            'title' => 'Fire dancers',
            'description' => "Get ready for an electrifying show that combines the beauty of dance with the thrill of fire! Our talented fire dancers will light up the night, twirling blazing torches and performing breathtaking routines that blend traditional dance moves with daring acrobatics. Their fiery performance will captivate your senses as sparks fly, illuminating the performers in a mesmerizing glow that echoes the energy of the crowd.
            This display of skill, precision, and bravery is more than just a spectacle; it’s a celebration of ancient fire rituals reimagined in a modern context. The performers aim to evoke a sense of primal wonder, connecting the audience to the elemental power of fire and the rhythm of the earth. As the night unfolds, the intensity of the flames will match the festival's crescendo, making it an unforgettable experience filled with heat, passion, and awe.",
            'media' => 'medias/fire-dancer.webp',
            'created_by' => 1
        ]);
        Article::factory()->create([
            'title' => 'Fireworks',
            'description' => "As the festival reaches its climax, an awe-inspiring fireworks display will illuminate the night sky, painting it with bursts of color, light, and sound. Expect a magical show filled with intricate patterns, from cascading waterfalls of sparks to loud, heart-pounding explosions. Each burst of light symbolizes the vibrant spirit of the festival, leaving the audience breathless as the night sky transforms into a kaleidoscope of hues.
            The fireworks not only mark a spectacular end to the festivities but also embody the joyous atmosphere that has defined the event. Accompanied by uplifting music that syncs with the bursts, this display promises to be a feast for the senses. Find a good spot, perhaps near the main stage or by the food stalls, and let the colors and sounds wrap you in a sense of celebration and wonder.",
            'media' => 'medias/fireworks.webp',
            'created_by' => 1
        ]);
        Article::factory()->create([
            'title' => 'Lili & Graphitis',
            'description' => "Meet Lili, a rising graffiti artist who will be adding a personal touch to the main stage area with her bold and expressive work. Known for her street art pieces that blend realism with surreal, dream-like elements, Lili’s art often features powerful messages of unity, freedom, and the celebration of diversity. She'll be working on a large-scale mural throughout the day, allowing the audience to witness the full process, from the initial sketch to the vibrant final touches.
            Lili’s approach to graffiti is deeply personal, with each piece reflecting her journey as an artist navigating the streets of the city. She often incorporates themes inspired by music, love, and resilience—key aspects of the festival’s ethos. As she collaborates with other graffiti artists near the main scene, expect an exciting mix of different styles that will create an unforgettable visual landscape for festival-goers.",
            'media' => 'medias/graphiti_artist.jpg',
            'created_by' => 1
        ]);
        Article::factory()->create([
            'title' => 'Meet folk singer Noah',
            'description' => "Folk singer Noah Fraser brings his soulful voice and heartfelt lyrics to the festival stage, offering a blend of acoustic melodies that speak to the heart. His songs, often inspired by nature, love, and life's unexpected turns, have a way of resonating with listeners on a deep level. Noah’s set promises to be a soothing yet powerful experience, as he shares stories through music, transporting the audience to peaceful meadows, serene riversides, and nostalgic moments of the past.
            Noah’s performance is not just about the music but the connection he builds with his listeners. With his guitar in hand and a voice that carries both warmth and wisdom, Noah's presence on stage is a reminder of the beauty of simplicity. His show is the perfect opportunity to pause and reflect, taking a break from the high-energy events to enjoy a more intimate and emotional experience.",
            'media' => 'medias/folk-noah-fraser.jpg',
            'created_by' => 1
        ]);

        Article::factory()->create([
            'title' => 'The fun awaits!',
            'description' => "The festival is all about bringing joy, excitement, and unforgettable experiences to everyone in attendance, and this event epitomizes that spirit! With a lineup filled with live performances, interactive art, and dance sessions, there’s always something happening to keep the energy high. Whether you’re a music lover, an art enthusiast, or simply looking for a good time, the fun truly awaits you here.
            Roam the grounds, explore the vibrant stalls, and immerse yourself in the diverse activities that the festival offers. From exciting live acts to delicious food and drinks, every moment is designed to ignite your sense of wonder and make memories that will last a lifetime. So come ready to dance, laugh, and lose yourself in the lively atmosphere!",
            'media' => 'medias/stage-purple-crowd.webp',
            'created_by' => 1
        ]);
        Article::factory()->create([
            'title' => 'Jazzy feels!',
            'description' => "As the sun sets and the evening air cools, get ready to unwind with some smooth jazz by talented singer Lila Martine. Known for her sultry voice and heartfelt renditions, Lila will be performing jazz classics along with her original compositions, setting the perfect vibe for a relaxing evening. Accompanied by a live band, her music will resonate with a mix of elegance, nostalgia, and feel-good rhythms that make you want to sway along.
            The jazz segment promises to bring a sophisticated touch to the festival, offering an escape into the soulful world of jazz melodies and rhythms. Grab a drink, find a cozy spot, and let Lila’s performance transport you to the lively jazz clubs of yesteryears. It’s the perfect way to cap off your festival experience with a touch of class and timeless music.",
            'media' => 'medias/jazz-singer-lila-martine.jpg',
            'created_by' => 1
        ]);
    }
}
