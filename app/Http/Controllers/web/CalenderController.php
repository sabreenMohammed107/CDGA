<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Year_calendar;
use App\Models\Country;
use App\Models\Course;
use App\Models\Round;
use App\Models\CourseCategory;
use App\Models\CourseSubCategory;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Venue;
use Carbon\Carbon;
class CalenderController extends Controller
{

    public function getCal($current){


        $month=1;
        $years=$current;
        $filterd_rounds = array();
        $subCategory_rounds = array();
        $round_months = array();
     
        $year="";
        $now_date = now();
        $courses = Course::with('rounds')->where('courses.active', '=', 1)->get();
                foreach ($courses as $course) {
                    foreach ($course->rounds as $round) {
                        if ($round->round_start_date > $now_date && $round->active == 1) {
                            $month = date("F", strtotime($round->round_start_date));
                            $round['month'] = $month;
                            array_push($subCategory_rounds, $round);
                            array_push($round_months, $month);
                            
                            //sasa
                            $year=date("Y", strtotime($round->round_start_date));
                            $year= $current;
                        }
                    }
                }


                usort($subCategory_rounds, function ($round1, $round2) {
                    if (strtotime($round1->round_start_date) > strtotime($round2->round_start_date))
                        return 1;
                    else if (strtotime(($round1->round_start_date) < strtotime($round2->round_start_date)))
                        return -1;
                    else
                        return 0;
                });

                $round_months = array_unique($round_months);
               
                foreach ($round_months as $round_month) {
                    $obj = new Collection();
                    $obj->month = $round_month;
                    $obj->year = $year;
                    $obj->rounds = array();
                    foreach ($subCategory_rounds as $round) {
                        if ($round->month === $round_month) {
                            array_push($obj->rounds, $round);
                        }
                    }
                    array_push($filterd_rounds, $obj);
                }
                $now = Carbon::now();
                $yearCal = $now->year;
                $calender =Year_calendar::where('id', '=',1)->firstOrFail();
               return view('web.calender.index', compact('yearCal','calender', 'month', 'years', 'filterd_rounds'));
    }

    public function getCalNext($current){


        $month=1;
        $years=$current;
        $filterd_rounds = array();
        $subCategory_rounds = array();
        $round_months = array();
     
        $year="";
        $now_date = now();
        $courses = Course::with('rounds')->where('courses.active', '=', 1)->get();
                foreach ($courses as $course) {
                    foreach ($course->rounds as $round) {
                        if ($round->round_start_date > $now_date && $round->active == 1) {
                            $month = date("F", strtotime($round->round_start_date));
                            $round['month'] = $month;
                            array_push($subCategory_rounds, $round);
                            array_push($round_months, $month);
                            
                            //sasa
                            $year=date("Y", strtotime($round->round_start_date));
                            $year= $current;
                        }
                    }
                }


                usort($subCategory_rounds, function ($round1, $round2) {
                    if (strtotime($round1->round_start_date) > strtotime($round2->round_start_date))
                        return 1;
                    else if (strtotime(($round1->round_start_date) < strtotime($round2->round_start_date)))
                        return -1;
                    else
                        return 0;
                });

                $round_months = array_unique($round_months);
               
                foreach ($round_months as $round_month) {
                    $obj = new Collection();
                    $obj->month = $round_month;
                    $obj->year = $year;
                    $obj->rounds = array();
                    foreach ($subCategory_rounds as $round) {
                        if ($round->month === $round_month) {
                            array_push($obj->rounds, $round);
                        }
                    }
                    array_push($filterd_rounds, $obj);
                }
                $now = Carbon::now();
                $yearCal = $now->year;
                $calender =Year_calendar::where('id', '=',1)->firstOrFail();
 return view('web.calender.next', compact('yearCal','calender', 'month', 'years', 'filterd_rounds'));
    }
}
