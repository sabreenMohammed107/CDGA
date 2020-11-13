<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Round;
use App\Models\Country;
use App\Models\Venue;
use App\Models\Course;
use App\Models\Currency;
use DB;
use Log;
use File;
use Carbon\Carbon;
class RoundController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Round $object)
    {
        
        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'admin.rounds.';
        $this->routeName = 'round.';
        $this->message = 'The Data has been saved';
        $this->errormessage = 'check Your Data ';
        
       
      
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $now_date = now();
        $rounds= Round::where('rounds.active', '=', 1)->where('round_start_date', '>', $now_date)->get();
        // $rounds=Round::orderBy("created_at", "Desc")->get();
      
      
        return view($this->viewName.'index', compact('rounds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $courses=Course::orderBy("course_en_name", "asc")->get();
        $countries=Country::all();
        $currencies=Currency::all();
        return view($this->viewName.'create', compact('countries','courses','currencies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

       

       
        $active=0;
     
if($request->input('round')=='on'){
    $active=1;
}


$maxValue = Round::where('course_id','=',$request->input('course_id'))->orderBy('id', 'desc')->value('round_code'); 

$cors=Course::where('id','=',$request->input('course_id'))->first();

// if (strpos($maxValue, '-') !== false) {
   
    $max=substr($maxValue, strrpos($maxValue, '-') + 1);

  
  if($max>=01){
   if($max<10){
    $max =$max+1;
    
    $roundCode=$cors->course_code.'-0'.$max ;
   }else{
    $roundCode=$cors->course_code.'-'.$max ;
   }
   
  } 
// }
    else
    {
      
    
        $max =01;
       $roundCode=$cors->course_code.'-0'.$max  ;
    }



    $data=[
            'round_code'=>$roundCode,
            'course_id'=>$request->input('course_id'),
            'country_id'=>$request->input('country_id'),
            'venue_id'=>$request->input('venue_id'),
            'round_start_date'=>Carbon::parse($request->input('round_start_date')),
            'round_end_date'=>Carbon::parse($request->input('round_end_date')),
            'round_price'=>$request->input('round_price'),
            'currency_id'=>$request->input('currency_id'),
            'round_place'=>$request->input('round_place'),
            'show_home_order'=>$request->input('show_home_order'),
          
            'active'=>$active,
                        ];

                        $xx=$this->object::create($data);


                      
                        
       
        return redirect()->route($this->routeName.'index')->with('flash_success', $this->message);
     
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
        $round =Round::where('id', '=', $id)->first();
        $courses=Course::orderBy("course_en_name", "asc")->get();
        $countries=Country::all();
        $currencies=Currency::all();
        return view($this->viewName.'edit', compact('round','countries','courses','currencies'));
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
      
        $active=0;
     
if($request->input('round')=='on'){
    $active=1;
}

    $data=[
          
             'round_start_date'=>Carbon::parse($request->input('round_start_date')),
            'round_end_date'=>Carbon::parse($request->input('round_end_date')),
            'round_price'=>$request->input('round_price'),
            'round_place'=>$request->input('round_place'),
            'show_home_order'=>$request->input('show_home_order'),
          
            'active'=>$active,
                        ];
        if($request->input('course_id')){

            $data['course_id']=$request->input('course_id');
         }
         if($request->input('country_id')){

            $data['country_id']=$request->input('country_id');
         }
         if($request->input('venue_id')){

            $data['venue_id']=$request->input('venue_id');
         }
         if($request->input('currency_id')){

            $data['currency_id']=$request->input('currency_id');
         }

         $this->object::findOrFail($id)->update($data);
       
         return redirect()->route($this->routeName.'index')->with('flash_success', $this->message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $round =Round::where('id', '=', $id)->first();
        if ($round->applicant()->count()) {

            return redirect()->back()->with('flash_danger','You cannot delete related with another...');    
         } 
        $round->delete();
        return redirect()->route($this->routeName.'index')->with('flash_success', 'Data Has Been Deleted Successfully !');

    }
/**
 * Get venue on country
 */
    function fetchCountry(Request $request)
    {
      
       
     $select = $request->get('select');
     $value = $request->get('value');
    
     $data =Venue::where('country_id', $value)->get();
     $output = '<option value="">Select Venue</option>';
    foreach($data as $row)
    {
     $output .= '<option value="'.$row->id.'">'.$row->venue_en_name.'</option>';
    }
    echo $output;
   }
}
