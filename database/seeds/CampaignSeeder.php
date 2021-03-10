<?php

use Illuminate\Database\Seeder;
use App\Campaign;

class CampaignSeeder extends Seeder
{
    private $campaigns = [
        [
            'title' => 'IMG Worlds of Adventure Winter Festive 20% Promotion',
            'attraction_id' => 1,
            'description' => 'on all Fast Track options. Valid from 25th November 2019 – 31st December 2019.'
        ],
        [
            'title' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry',
            'attraction_id' => 2,
            'description' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry'
        ],
         
    ];
    
	public function run()
    {
        foreach ($this->campaigns as $campaign) {
           Campaign::create($campaign);
        }

    }
}