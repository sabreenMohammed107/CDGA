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
use App\Mail\QuickEnqueryNotification;
use App\Models\Venue;
class InHouseController extends Controller
{
    public function index(){
        $now_date = now();
        $courses = Course::all();
        $rounds = Round::where('rounds.active', '=', 1)->where('round_start_date', '>', $now_date)->orderBy('round_start_date', 'asc')->take(7)->get();
        $venues = Venue::all();
        $countries = Country::all();
        $saluts = ApplicantSalut::all();
        return view('web.courses.inHouse', compact('courses', 'countries', 'venues', 'saluts', 'rounds'));
    }

    public function registerApplicantsHouse(Request $request)
    {
       
        $applicant_data['course_id']=$request->get('course_id');
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
        $applicant_data['inhouse_perefer_dates']=$request->get('inhouse_perefer_dates');
        $applicant_data['inhouse_no_days']=$request->get('inhouse_no_days');
        $applicant_data['inhouse_no_particants']=$request->get('inhouse_no_particants');
        $applicant_data['fax']=$request->get('fax');
        $applicant_data['inhouse_requirements']=$request->get('inhouse_requirements');
        $applicant_data['register_round_id']=$request->get('register_round_id');
        $applicant_data['applicant_type_id']=3;
        $applicant_id =Applicant::create($applicant_data);

        $request->validate([
          
            'captcha' => 'required|captcha'
        ]);
        $emails = ['senior.steps.info@gmail.com','info@btsconsultant.com','nasser@btsconsultant.com'];
 
        \Mail::to($emails)->send(new QuickEnqueryNotification($applicant_id));
        if($applicant_id !=null){
            return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');

        }else{
            return redirect()->back()->with('message', 'Something Wronge !');

        }
    }
    
}
