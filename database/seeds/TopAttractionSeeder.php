<?php

use Illuminate\Database\Seeder;

use App\Attraction;
use App\TopAttraction;


class TopAttractionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attractions = Attraction::take(5)->get();

         foreach ($attractions as $attraction) {
            TopAttraction::create(array('attraction_id' => $attraction->id));
        }
    }
}