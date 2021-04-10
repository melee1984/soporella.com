<?php

use Illuminate\Database\Seeder;

use App\Country;

class CountrySeeder extends Seeder
{
    private $data = [
        [
            'country_code' => 'en',
            'active' => 1,
            'flag' => 'eng_flag.svg'
        ],
        [
            'country_code' => 'de',
            'active' => 1,
            'flag' => 'german_flag.svg'
        ],
    ];
    
	public function run()
    {
        foreach ($this->data as $country) {
           Country::create($country);
        }

    }
}
