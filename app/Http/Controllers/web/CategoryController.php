<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CourseSubCategory;
use App\Models\CourseCategory;
use Carbon\Carbon;
use App\Models\Year_calendar;
class CategoryController extends Controller
{
    public function index($id){
        
        $category=CourseCategory::where('id','=',$id)->first();
        $subCategories=CourseSubCategory::where('course_category_id', $id)->paginate(9);
        $now = Carbon::now();
                $yearCal = $now->year;
                $calender =Year_calendar::where('id', '=',1)->firstOrFail();
        return view('web.category.index',compact('yearCal','calender','subCategories','category'));

    }
     /**
             * Make pagination on favourites and return with ajax
             */
              
            
            function fetch_data(Request $request)
            {
             

             if($request->ajax())
             {
                 $id=$request->get("id");
                $category=CourseCategory::where('id','=',$id)->first();
                $subCategories=CourseSubCategory::where('course_category_id', $id)->paginate(9);
                        
              return view('web.category.catList', compact('subCategories','category'))->render();
             }
            }
}
