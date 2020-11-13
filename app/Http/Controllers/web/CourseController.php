<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\Applicant;
use App\Models\ApplicantSalut;
use App\Models\BillingDetails;
use App\Models\Country;
use App\Models\Course;
use App\Models\Round;
use App\Models\CourseCategory;
use App\Models\CourseSubCategory;
use App\Models\RelatedCourses;
use App\Models\Venue;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use App\Mail\QuickEnqueryNotification;
use App\Mail\DawnloadNotification;
use App\Mail\CouseOfferNotification;
use App\Mail\RegisterNotification;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

public function searchForm(Request $request){
    
    $word= $request->input('wordName');
    $category_id=$request->input('category_id');
    $city_id=$request->input('city_id');
   $start= $request->input('start');
   $end=$request->input('end');
  
   $now_date = now();
   $filtters = Round::where('active','=',1)->where('round_start_date', '>', $now_date);

  
   if(!empty($request->get("category_id"))){

    $filtters->whereHas('course', function ($q)use ( $request) {
        $q->where('course_sub_category_id', '=',$request->get('category_id'));
     });

    }

      if(!empty($request->get("city_id"))){

    $filtters->where('venue_id','=',$request->get("city_id"));
       }
         if(!empty($request->get("start"))){
    $filtters->where('round_start_date','>=',Carbon::parse($request->get("start")));
      }
if(!empty($request->get("end"))){
    $filtters->where('round_end_date','<=',Carbon::parse($request->get("end")));
} 

if(!empty($request->get("wordName"))){

    $filtters->whereHas('course', function ($q)use ( $request) {
        $q->where('course_en_name', 'like', '%'.$request->get("wordName"). '%');
     });
   
} 

if(!empty($request->get("wordName"))){

    $filtters->whereHas('course', function ($q)use ( $request) {
        $q->where('course_en_name', 'like', '%'.$request->get("wordName"). '%');
     });
   
} 
        $filterd = $filtters->get();
        
        $now_date = now();
         \Log::info(['xx',$filterd]);  
           $randomRounds = Round::where('active','=',1)->where('rounds.round_start_date', '>', $now_date)->paginate(8);
           $objectCourses =Course::orderBy("course_en_name", "asc")->get();
        return view('web.search.index', compact('objectCourses','randomRounds', 'filterd'));
}

    public  function filterCourses($category_id, $subCategory_id, $filter_type)
    {
        $objectCourses =Course::orderBy("course_en_name", "asc")->get();
        $now_date = now();
        $filterd_rounds = array();
        $round_months = array();
        $round_days = array();
        $round_places = array();
        $round_year=array();
        $subCategory_rounds = array();
        $courseCategory = CourseCategory::where('id', '=', $category_id)->firstOrFail();
        $courseSubCategory = CourseSubCategory::with('rounds')->where('id', '=', $subCategory_id)->firstOrFail();
       
        $view_page = 'web.courses.';
        switch ($filter_type) {
            case 'title':
                $filterd_rounds = $courseSubCategory->rounds()->where('rounds.active', '=', 1)->orderBy('course_en_name', 'asc')->get();
               
                $view_page .= 'byTitle';
                break;
            case 'venue':
                $subCategory_rounds = $courseSubCategory->rounds()->where('rounds.active', '=', 1)->orderBy('round_start_date', 'asc')->get();
                // dd($subCategory_rounds);
                foreach ($subCategory_rounds as $round) {
                    array_push($round_places, $round->country->country_en_name);
                }
                $round_places = array_unique($round_places);
                foreach ($round_places as $round_country) {
                    $obj = new Collection();
                    $obj->country = $round_country;

                    $obj->rounds = array();
                    foreach ($subCategory_rounds as $round) {
                        if ($round->country->country_en_name === $round_country) {
                            array_push($obj->rounds, $round);
                            $obj->venue = $round->venue->venue_en_name;
                        }
                    }
                    array_push($filterd_rounds, $obj);
                }
                $view_page .= 'byVenue';
                break;
            case 'date':
                $courses = Course::with('rounds')->where('courses.active', '=', 1)->where('courses.course_sub_category_id', '=', $subCategory_id)->get();
                foreach ($courses as $course) {
                    foreach ($course->rounds as $round) {
                        if ($round->round_start_date > $now_date && $round->active == 1) {
                            $month = date("F", strtotime($round->round_start_date)).'-'.date("Y", strtotime($round->round_start_date));
                            $round['month'] = $month;
                             //sasa
                             $year=date("Y", strtotime($round->round_start_date));
                             $round['year'] = $year;
                            array_push($subCategory_rounds, $round);
                            array_push($round_months, $month);
                            array_push($round_year, $year);
                            
                           
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
                    $round_year = array_unique($round_year);
                   
                    usort( $round_months , function($a, $b){
                        $a = strtotime($a);
                        $b = strtotime($b);
                        return $a - $b;
                    });

                    usort( $round_year , function($a, $b){
                        $a = strtotime($a);
                        $b = strtotime($b);
                        return $a - $b;
                    });
                  
                
                    foreach ($round_months as $round_month) {
                        $short = substr($round_month, 0, strrpos($round_month, '-'));
                      $long= substr($round_month, strrpos($round_month, '-'));
                        // return($short);
              
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

              

                $view_page .= 'byDate';
                break;
            case 'duration':
                $subCategory_rounds = $courseSubCategory->rounds()->where('rounds.active', '=', 1)->orderBy('course_duration', 'desc')->get();
                foreach ($subCategory_rounds as $round) {
                    array_push($round_days, $round->course->course_duration);
                }
                $round_days = array_unique($round_days);
                foreach ($round_days as $round_day) {
                    $obj = new Collection();
                    $obj->day = $round_day;
                    $obj->rounds = array();
                    foreach ($subCategory_rounds as $round) {
                        if ($round->course->course_duration === $round_day) {
                            array_push($obj->rounds, $round);
                        }
                    }
                    array_push($filterd_rounds, $obj);
                }
                $view_page .= 'byDuration';
                break;
            default:
                break;
        };
        $randomRounds = $courseSubCategory->rounds()->where('rounds.active', '=', 1)->where('rounds.round_start_date', '>', $now_date)->paginate(8);
        return view($view_page, compact('randomRounds', 'courseCategory', 'courseSubCategory', 'filterd_rounds','objectCourses'));
    }

    public function courseDetails($course_id)
    {
        $now_date = now();
        $course = Course::with('subCategory')->where('id', '=', $course_id)->firstOrFail();
        $rounds = $course->rounds()->where('rounds.active', '=', 1)->where('round_start_date', '>', $now_date)->orderBy('round_start_date', 'asc')->get();
        $specfic_round =  $course->rounds()->where('rounds.active', '=', 1)->where('round_start_date', '>', $now_date)->orderBy('round_start_date', 'asc')->firstOrFail();
        $related_courses = RelatedCourses::with('course')->where('course_id', $course_id)->get();
        $venues = Venue::all();
        $countries = Country::all();
        $saluts = ApplicantSalut::all();
        $objectCourses =Course::orderBy("course_en_name", "asc")->get();
        return view('web.courses.courseDetails', compact('objectCourses','venues', 'countries', 'course', 'rounds', 'specfic_round', 'related_courses', 'saluts'));
    }

    public function registerApplicants(Request $request)
    {
        $request->validate([
          
            'captcha' => 'required|captcha'
        ]);
        $data = $request->all();
       $quick= Applicant::create($data);
       $emails = ['senior.steps.info@gmail.com','info@btsconsultant.com','nasser@btsconsultant.com'];
 
          \Mail::to($emails)->send(new QuickEnqueryNotification($quick));
       
          if (!$request->get('courseBrochure')) {
            return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');
       }
    }
   
    public function registerApplicantsDawnload(Request $request)
    {
        $request->validate([
          
            'captcha' => 'required|captcha'
        ]);
        $data = $request->all();
       $dawnload= Applicant::create($data);
      
       $emails = ['senior.steps.info@gmail.com','info@btsconsultant.com','nasser@btsconsultant.com'];
 
           \Mail::to($emails)->send(new DawnloadNotification($dawnload));
       
          if (!$request->get('courseBrochure')) {
           
            return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');
        }
    }

    public function downloadBrochure($course_id)
    {
        $countries = Country::all();
        $course = Course::with('subCategory')->where('id', '=', $course_id)->firstOrFail();
      
        return view('web.courses.downloadBrochure', compact('course', 'countries'));
    }

    public function requestInHouse($course_id)
    {
        $now_date = now();
        $course = Course::with('subCategory')->where('id', '=', $course_id)->firstOrFail();
        $rounds = Round::where('rounds.active', '=', 1)->where('round_start_date', '>', $now_date)->orderBy('round_start_date', 'asc')->take(7)->get();
        $venues = Venue::all();
        $countries = Country::all();
        $saluts = ApplicantSalut::all();
        return view('web.courses.requestInHouse', compact('course', 'countries', 'venues', 'saluts', 'rounds'))->with('message', 'Thanks; your request has been submitted successfully !');
    }

    public function terms()
    {
        // return view('web.courses.terms&conditions');
    }

    public function registerCourse($round_id)
    {
        $now_date = now();
        $course = Round::where('id', '=', $round_id)->firstOrFail()->course;
        $course_rounds = $course->rounds()->with('course')->where('rounds.active', '=', 1)->where('round_start_date', '>', $now_date)->orderBy('round_start_date', 'asc')->get();
        $venues = Venue::all();
        $countries = Country::all();
        $saluts = ApplicantSalut::all();
        $rounds = Round::where('rounds.active', '=', 1)->where('round_start_date', '>', $now_date)->orderBy('round_start_date', 'asc')->take(7)->get();
        return view('web.courses.registerCourse', compact('course_rounds', 'rounds', 'course', 'countries', 'venues', 'saluts'));
    }

    public function registerApplicantRounds(Request $request)
    {
        $request->validate([
          
            'captcha' => 'required|captcha'
        ]);
        $applicant_data['salut_id']=$request->get('salut_id');
        $applicant_data['name']=$request->get('name');
        $applicant_data['country_id']=$request->get('country_id');
        $applicant_data['job_title']=$request->get('job_title');
        $applicant_data['company']=$request->get('company');
        $applicant_data['venue_id']=$request->get('venue_id');
        $applicant_data['address']=$request->get('address');
        $applicant_data['email']=$request->get('email');
        $applicant_data['phone']=$request->get('phone');
        $applicant_data['mobile']=$request->get('mobile');
        $applicant_data['fax']=$request->get('fax');
        $applicant_data['register_round_id']=$request->get('register_round_id');
        $applicant_data['applicant_type_id']=$request->get('applicant_type_id');
        $applicant_id =Applicant::create($applicant_data);
       
        $billing_data['salut_id']=$request->get('billing_salut_id');
        $billing_data['name']=$request->get('billing_name');
        $billing_data['job_title']=$request->get('billing_job_title');
        $billing_data['company']=$request->get('billing_company');
        $billing_data['address']=$request->get('billing_address');
        $billing_data['venue_id']=$request->get('billing_venue_id');
        $billing_data['country_id']=$request->get('billing_country_id');
        $billing_data['phone']=$request->get('billing_phone');
        $billing_data['email']=$request->get('billing_email');
        $billing_data['applicant_id']=$applicant_id->id;
        $billingDetails=BillingDetails::create($billing_data);
       
        $emails = ['senior.steps.info@gmail.com','info@btsconsultant.com','nasser@btsconsultant.com'];
 
         \Mail::to($emails)->send(new RegisterNotification($applicant_id,$billingDetails));
        return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');
    
    }

    public function refreshCaptcha()
    {
      
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function reducedForm(Request $request){
        $request->validate([
            'name'=>'required',
            'phone' => 'required',
            'email'=>'required',
            'course_id' => 'required',
           
       
        ]);
     
        $data=[
            'name'=>$request->input('name'),
             'phone'=>$request->input('phone'),
             'email'=>$request->input('email'),
             'course_id'=>$request->input('course_id'),
             'applicant_type_id'=>4,
            
            
             
                         ];
 
              
            $App=Applicant::create($data);
            $emails = ['senior.steps.info@gmail.com','info@btsconsultant.com','nasser@btsconsultant.com'];
 
         \Mail::to($emails)->send(new CouseOfferNotification($App));
 
            return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');
  
    }
}
