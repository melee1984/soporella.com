<?php

use Illuminate\Database\Seeder;
use App\Promotion;
use App\Attraction;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $attractions = Attraction::take(4)->get();

         foreach ($attractions as $attraction) {
            Promotion::create(array('attraction_id' => $attraction->id));
        }
    }
}
