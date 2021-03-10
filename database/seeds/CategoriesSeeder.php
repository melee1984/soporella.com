<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Models\Category\CategoryAttractionMapping;


class CategoriesSeeder extends Seeder
{
     private $categories = [
        [
            'title' => 'Waterparks',
            'active' => 1,
            'slug' => 'waterparks',
            'is_menu' => 1
        ],
         [
            'title' => 'Themeparks',
            'active' => 1,
            'slug' => 'themeparks', 
            'is_menu' => 1
        ],
         [
            'title' => 'Sports',
            'active' => 1,
            'slug' => 'sports',
            'is_menu' => 1
        ],
         [
            'title' => 'Sightseeing',
            'active' => 1,
            'slug' => 'sightseeing',
            'is_menu' => 1
        ],
         [
            'title' => 'Family',
            'active' => 1,
            'slug' => 'family',
            'is_menu' => 1
        ],
         [
            'title' => 'Culture',
            'active' => 1,
            'slug' => 'culture',
            'is_menu' => 1
        ],
        [
            'title' => 'Adventure',
            'active' => 1,
            'slug' => 'adventure',
            'is_menu' => 1
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

        CategoryAttractionMapping::create(array('attraction_id' => 1, 'category_id' => 1));
        CategoryAttractionMapping::create(array('attraction_id' => 2, 'category_id' => 1));
    }
}
