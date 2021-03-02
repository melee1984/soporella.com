<?php

use Illuminate\Database\Seeder;
use App\Category;


class CategoriesSeeder extends Seeder
{
     private $categories = [
        [
            'title' => 'Waterparks',
            'active' => 1,
            'slug' => 'waterparks'
        ],
         [
            'title' => 'Themeparks',
            'active' => 1,
            'slug' => 'themeparks'
        ],
         [
            'title' => 'Sports',
            'active' => 1,
            'slug' => 'sports'
        ],
         [
            'title' => 'Sightseeing',
            'active' => 1,
            'slug' => 'sightseeing'
        ],
         [
            'title' => 'Family',
            'active' => 1,
            'slug' => 'family'
        ],
         [
            'title' => 'Culture',
            'active' => 1,
            'slug' => 'culture'
        ],
        [
            'title' => 'Adventure',
            'active' => 1,
            'slug' => 'adventure'
        ],
    ];

    public function getCategories()
    {
        return $this->categories;
    }

    public function run()
    {
         foreach ($this->categories as $category) {
            Category::create($category);
        }
    }
}
