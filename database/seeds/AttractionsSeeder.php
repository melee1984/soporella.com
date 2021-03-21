<?php

use Illuminate\Database\Seeder;
use App\Attraction; 

class AttractionsSeeder extends Seeder
{
    private $attractions = [
        [
            'title' => 'Yas Waterworld	',
            'description' => "With over 40 rides, slides and attractions Yas truly is the premier Waterpark in Abu Dhabi. With 4 thrill levels the park has plenty for all, ranging from high level adrenaline seekers to slow moving lazy rivers. When you're not in the water make the most of the fantastic shopping and dining",
            'active' => true,
            'slug' => 'yas-waterworld',
            'photo' => 'yas-waterworld-05.jpg',
            'video' => 'XuMpPaft_WI',
            'redemption'   => 'Entry passes, incl. all other bookings will be confirmed electronically after you completed the purchase process. The relevant entry pass will be sent to you electronically after the purchase process is completed. It is therefore imperative that your e-mail address is correctly inserted.',

        ],
         [
            'title' => 'Big Bus Tours (Dubai)',
            'description' => "Hop on our Dubai bus tour to experience a true fusion of traditional Arabian charm. Enjoy panoramic views of Dubai's dramatic skyline, perfect sandy b	Hop on our Dubai bus tour to experience a true fusion of traditional Arabian charm. Enjoy panoramic views of Dubai's dramatic skyline, perfect sandy beaches & the world’s tallest building. Hop off to explore historical souks, forts & palaces, ultra-chic dining & ambient nightlife.",
            'active' => true,
            'slug' => 'big-bus-tours-dubai',
            'photo' => 'big-bus-tours.jpg',
            'video' => 'I4HdO0sJEAw',
            'redemption'    => 'Customers purchasing through Soporella will receive their E-ticket via email.
We then ask the ticket holder to print out their E-ticket and present it along with the credit card used to complete the purchase. The customer should present their E-ticket to a Big Bus uniformed member of staff, at the preferred boarding point. The member of staff will exchange the E-ticket for a valid ticket to travel.',
        ],
         [
            'title' => 'Ferrari World Abu Dhabi',
            'description' => "Home to the fastest roller-coaster in the world! Ferrari World is a truly unique experience that will leave you breathless after each ride. Immerse yo	Home to the fastest roller-coaster in the world! Ferrari World is a truly unique experience that will leave you breathless after each ride. Immerse yourself within this stunning indoor park and enjoy the Ferrari brand which poses excellence throughout its attractions and dining areas.",
            'active' => true,
            'slug' => 'ferrari-world-abu-dhabi',
            'photo' => 'ferrari-world-06.jpg',
            'video' =>'',
            'redemption' => 'Entry passes, incl. all other bookings will be confirmed electronically after you completed the purchase process. The relevant entry pass will be sent to you electronically after the purchase process is completed. It is therefore imperative that your e-mail address is correctly inserted. ',
            'availability' => '',
        ],
        [
            'title' => 'HeliDubai',
            'description' => "HeliDubai is the premier helicopter service provider in the UAE, offering a wide range of services from tours, corporate and VIP transfers, private he	HeliDubai is the premier helicopter service provider in the UAE, offering a wide range of services from tours, corporate and VIP transfers, private helicopter charter and specializing in aerial filming and photography. Coupled with a worldwide reputation and a range of services.",
            'active' => true,
            'slug' => 'heli-dubai',
            'photo' => 'helidubai-01.jpg',
            'video' => 'Ief9eRt-0T8',
            'redemption' => 'Entry passes, incl. all other bookings will be confirmed electronically after you completed the purchase process. The relevant entry pass will be sent to you electronically after the purchase process is completed. It is therefore imperative that your e-mail address is correctly inserted.

Should a destination allow only confirmations but not an actual entry pass(es), you will receive such confirmation electronically. This electronic confirmation has to be converted on the day of your visit to an entry pass at the allocated area at the destination itself. '
        ],
        [
            'title' => 'Wild Wadi Waterpark',
            'description' => "HLocated in Dubai and situated in front of the stunning Burj Al Arab, Wild Wadi offers 30 rides and attractions for all the family. Wild Wadi is themed	Located in Dubai and situated in front of the stunning Burj Al Arab, Wild Wadi offers 30 rides and attractions for all the family. Wild Wadi is themed around the tale of Juha, a known character from the Arabian folklore.",
            'active' => true,
            'slug' => 'wild-wadi-waterpark',
            'photo' => 'soporella-wild-wadi-7.jpg',
            'video' => 'GFPrQ6tRmvM',

            'about' => "Guests must present their online ticket provided by Soporella at any of the Wild Wadi counters prior to issuing of the wristband and entry to the Wild Wadi Waterpark.
Other amenities such as locker rental and towel rental are available at Wild Wadi Waterpark's standard rates.
Please note that no outside food, drinks and glass are permitted in Wild Wadi Water Park - Bags will be checked for inspection prior to entry.",
'availability'  => 'Tickets will only be booked upon receiving a confirmation email from Soporella.',
        ],

    ];

    public function getAttractions()
    {
        return $this->attractions;
    }

    public function run()
    {
         foreach ($this->attractions as $attractions) {
            Attraction::create($attractions);
        }
    }
}
