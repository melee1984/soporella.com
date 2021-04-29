<?php

namespace App\Http\Controllers\Api\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;
use App\Attraction;
use App\Models\Category\CategoryAttractionMapping;
use App\Category;


class AttractionCategoryController extends Controller
{
    public function getCategoryByAttraction(Attraction $attraction) {

      $data = array();
      $data['status'] = 1;

      $categories = DB::table('categories')
                    ->select('id','title', DB::raw('(select count(id) from category_attraction_mapping where category_id = categories.id and attraction_id = '.$attraction->id . ') as mapped'))
                    ->whereActive(1)
                    ->get();

      $data['categories'] = $categories;

     return response()->json($data, 200);


    }

    public function insertAttractionCategoryMapping(Attraction $attraction, Category $category) {

        if (!$attraction) return; 
        $exist = CategoryAttractionMapping::whereAttractionId($attraction->id)->whereCategoryId($category->id)->first();
        if ($exist) {
          $exist->delete();
          $data['status'] = 1;
          $data['message'] = "Successfully deleted attraction";

        } else {
          $categoryAttractionMapping = CategoryAttractionMapping::create([ 
            'category_id' =>  $category->id,
            'attraction_id' => $attraction->id,
          ]);
          if ($categoryAttractionMapping) {
            $data['status'] = 1;
            $data['message'] = "Successfully mapped attraction to the category";
          }
        }
        return response()->json($data, 200);

  }
}
