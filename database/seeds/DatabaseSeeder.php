<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
		$this->call(RolesTableSeeder::class);
        $this->call(AttractionsSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(TopAttractionSeeder::class);
        
        $this->call(VisitSeeder::class);
        $this->call(CampaignSeeder::class);
        $this->call(PromotionSeeder::class);
        
    }
}
// php artisan make:seeder VisitSeeder