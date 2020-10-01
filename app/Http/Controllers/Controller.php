<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use View;
use App\Models\CourseCategory;
use App\Models\Branch;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct() {
        $branch =Branch::with('country')->with('venue')->where('active', '=',1)->where('hq', '=',1)->firstOrFail();
        $courseCategories =CourseCategory::with('courseSubCategories')->where('id', '!=',4)->where('id', '!=',6)->where('active', '=',1)->get();
        View::share(['courseCategories' => $courseCategories, 'branch' => $branch]);
       
    }
}
