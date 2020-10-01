<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Models\CourseCategory;
use App\Models\HomeSlider;
use App\Models\Round;
use App\Models\Client;
use App\Models\Partner;
use App\Models\BtsNumber;
use App\Models\Trainer;
use App\Models\ContactMessage;
use App\Models\NewsLetter;
use App\Models\Venue;
use App\Models\CourseSubCategory;
use App\Mail\NewUserNotification;
use App\Mail\NewsLetterNotification;
use Carbon\Carbon;
use App\Models\Year_calendar;
use Illuminate\Database\QueryException;
class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $homeSlider = HomeSlider::where('active', '=',1)->firstOrFail();
        // $courseCategories =CourseCategory::with('courseSubCategories')->where('id', '!=',4)->where('active', '=',1)->get();
        $rounds =Round::with('course')->with('country')->with('venue')->where('active', '=',1)->where('show_home_order','!=',null)->orderBy('show_home_order', 'asc')->take(8)->get();
        $clients = Client::where('active', '=',1)->get();
        $partners = Partner::where('active', '=',1)->get();
        $btsNumbers = BtsNumber::where('active', '=',1)->get();
        $trainers =Trainer::all();
        $venues=Venue::all();
        $subCategories=CourseSubCategory::where('active', '=',1)->get();
        $now = Carbon::now();
        $year = $now->year;
        $calender =Year_calendar::where('id', '=',1)->firstOrFail();

        // new 
        $now_date = now();
        $poprounds = Round::where('rounds.active', '=', 1)->where('round_start_date', '>', $now_date)->orderBy('round_start_date', 'asc')->take(4)->get();
        $venues=Venue::all();
        $subCategories=CourseSubCategory::where('active', '=',1)->get();
        $rounds =Round::with('course')->with('country')->with('venue')->where('active', '=',1)->where('show_home_order','!=',null)->orderBy('show_home_order', 'asc')->take(8)->get();
        $clients = Client::where('active', '=',1)->get();
        $partners = Partner::where('active', '=',1)->get();
        $btsNumbers = BtsNumber::where('active', '=',1)->get();
        $trainers =Trainer::all();
        $now = Carbon::now();
        $year = $now->year;
        $calender =Year_calendar::where('id', '=',1)->firstOrFail();
        return view('web.home.copyIndex', compact('poprounds','venues','subCategories','rounds','clients','btsNumbers','trainers','partners','calender','year'));
    }

    public function sendMessage(Request $request){
      
        try{
          
            
            $user=  ContactMessage::create($request->all());
            $emails = ['senior.steps.info@gmail.com','info@btsconsultant.com','nasser@btsconsultant.com'];
            \Mail::to($emails)->send(new NewUserNotification($user));
           
           
              return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');
         
      
       
        }
        catch(QueryException $q){
         
            return redirect()->back()->with('message','You cannot send Empty Message...');  

        }
    
     
    }
    public function refreshCaptcha()
    {
      
        return response()->json(['captcha'=> captcha_img()]);
    }

    public function sendNewsLetter(Request $request){
        try{

       $letter= NewsLetter::create($request->all());
       $emails = ['senior.steps.info@gmail.com','info@btsconsultant.com','nasser@btsconsultant.com'];
       \Mail::to($emails)->send(new NewsLetterNotification($letter));
   

        return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');
    }
       catch(QueryException $q){
     
        return redirect()->back()->with('message','ُEmpty Newsletter !!!');  

    }
    
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
}
