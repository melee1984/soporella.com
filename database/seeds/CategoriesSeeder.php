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

        CategoryAttractionMapping::create(array('attraction_id' => 1, 'category_id' => 1));
        CategoryAttractionMapping::create(array('attraction_id' => 2, 'category_id' => 1));
    }
}
