<?php

use Illuminate\Database\Seeder;
use App\Attractions; 

class AttractionsSeeder extends Seeder
{
    private $attractions = [
        [
            'title' => 'Yas Waterworld	',
            'description' => "With over 40 rides, slides and attractions Yas truly is the premier Waterpark in Abu Dhabi. With 4 thrill levels the park has plenty for all, ranging from high level adrenaline seekers to slow moving lazy rivers. When you're not in the water make the most of the fantastic shopping and dining",
            'active' => true,
            'slug' => 'yas-waterworld',
            'photo' => 'yas-waterworld-05.jpg'
        ],
         [
            'title' => 'Big Bus Tours (Dubai)',
            'description' => "Hop on our Dubai bus tour to experience a true fusion of traditional Arabian charm. Enjoy panoramic views of Dubai's dramatic skyline, perfect sandy b	Hop on our Dubai bus tour to experience a true fusion of traditional Arabian charm. Enjoy panoramic views of Dubai's dramatic skyline, perfect sandy beaches & the world’s tallest building. Hop off to explore historical souks, forts & palaces, ultra-chic dining & ambient nightlife.",
            'active' => true,
            'slug' => 'big-bus-tours-dubai',
            'photo' => 'big-bus-tours.jpg'
        ],
         [
            'title' => 'Ferrari World Abu Dhabi',
            'description' => "Home to the fastest roller-coaster in the world! Ferrari World is a truly unique experience that will leave you breathless after each ride. Immerse yo	Home to the fastest roller-coaster in the world! Ferrari World is a truly unique experience that will leave you breathless after each ride. Immerse yourself within this stunning indoor park and enjoy the Ferrari brand which poses excellence throughout its attractions and dining areas.",
            'active' => true,
            'slug' => 'ferrari-world-abu-dhabi',
            'photo' => 'ferrari-world-06.jpg',
        ],
        [
            'title' => 'HeliDubai',
            'description' => "HeliDubai is the premier helicopter service provider in the UAE, offering a wide range of services from tours, corporate and VIP transfers, private he	HeliDubai is the premier helicopter service provider in the UAE, offering a wide range of services from tours, corporate and VIP transfers, private helicopter charter and specializing in aerial filming and photography. Coupled with a worldwide reputation and a range of services.",
            'active' => true,
            'slug' => 'heli-dubai',
            'photo' => 'helidubai-01.jpeg',
        ],
        [
            'title' => 'Wild Wadi Waterpark',
            'description' => "HLocated in Dubai and situated in front of the stunning Burj Al Arab, Wild Wadi offers 30 rides and attractions for all the family. Wild Wadi is themed	Located in Dubai and situated in front of the stunning Burj Al Arab, Wild Wadi offers 30 rides and attractions for all the family. Wild Wadi is themed around the tale of Juha, a known character from the Arabian folklore.",
            'active' => true,
            'slug' => 'wild-wadi-waterpark',
            'photo' => 'soporella-wild-wadi-7.jpg'
        ],

    ];

    public function getAttractions()
    {
        return $this->attractions;
    }

    public function run()
    {
         foreach ($this->attractions as $attractions) {
            Attractions::create($attractions);
        }
    }
}
