<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Expertise;
use App\Models\TeachCourse;
use App\Models\Country;
use App\Models\Venue;
use App\Models\ApplicantSalut;
use App\Models\Speakers;
use App\Models\SpeakerCourse;
use App\Models\SpeakersExpertise;
use App\Mail\SpeakerNotification;
use DB;

class SpeakersController extends Controller
{
    protected $viewName='web.speakers.';
    public function index(){
         $expertises=Expertise::all();
          $courses=TeachCourse::all();
         $countries=Country::all();
          $saluts=ApplicantSalut::all();
        return view($this->viewName.'index',compact('expertises','courses','countries','saluts'));

    }

    public function speakerForm(Request $request){
        $courses=[];
        $expertises=[];
        
       
        $speaker = new Speakers;
        $courses=$request->input('courses');
        $expertises=$request->input('expertise');
       
        $data=[
           'salut_id'=>$request->input('salut_id'),
            'frist_name'=>$request->input('frist_name'),
            'last_name'=>$request->input('last_name'),
            'email'=>$request->input('email'),
            'country_id'=>$request->input('country_id'),
            'venue_id'=>$request->input('venue_id'),
            'phone'=>$request->input('phone'),
            'mobile'=>$request->input('mobile'),
            'other_data'=>$request->input('other_data'),
            
                        ];

                        if($request->hasFile('cv_path'))
                        {
                     $cv_path=$request->file('cv_path');
       
                      $data['cv_path'] = $this->UplaodImage($cv_path);
           
                        }
                        if($request->hasFile('doc_path'))
                         {
                         $doc_path=$request->file('doc_path');
       
                          $data['doc_path'] = $this->UplaodFile($doc_path);
                         }
             DB::beginTransaction();

    try{   
             $speaker= Speakers::create($data);
         
           
             if($courses!==null ){     
            
                foreach ($courses as $course)
        
             {
            $input=[
                'course_id'=>$course,

                'speaker_id'=> $speaker->id,

            ] ;

            // Store The Image Name..
          

    SpeakerCourse::create($input);
 
           
            }
			
        }
        if($expertises!==null ){
        foreach ( $expertises as $expertise)
		{
            $input=[
                'expertise_id'=>$expertise,

                'speaker_id'=> $speaker->id,

            ] ;

			// Store The Image Name..
           
                SpeakersExpertise::create($input);
           
        }
    }
        DB::commit();
        // $emails = ['sabreenm312@gmail.com','senior.steps.info@gmail.com'];
         $emails = ['senior.steps.info@gmail.com','info@btsconsultant.com','nasser@btsconsultant.com'];
        \Mail::to($emails)->send(new SpeakerNotification($speaker));
       
        return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');

    }catch(\Exception $e){
        DB::rollback();
        return redirect()->back()
        ->with('flash_danger','Something Went Wrong!');
    }
   
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



 /**
     * uplaud image
     */
    public function UplaodImage($file_request)
	{
		//  This is Image Info..
		$file = $file_request;
		$name = $file->getClientOriginalName();
		$ext  = $file->getClientOriginalExtension();
		$size = $file->getSize();
		$path = $file->getRealPath();
		$mime = $file->getMimeType();


		// Rename The Image ..
		$imageName =$name;
		$uploadPath = public_path('uploads/courseBrochure');
		
		// Move The image..
		$file->move($uploadPath, $imageName);
       
		return $imageName;
    }
    /**
     * uplaud file
     */
    public function UplaodFile($file_request)
	{
		//  This is Image Info..
		$file = $file_request;
		$name = $file->getClientOriginalName();
		$ext  = $file->getClientOriginalExtension();
		$size = $file->getSize();
		$path = $file->getRealPath();
		$mime = $file->getMimeType();


		// Rename The Image ..
		$fileName =$name;
		$uploadPath = public_path('uploads/courseBrochure');
		
		// Move The image..
		$file->move($uploadPath, $fileName);
       
		return $fileName;
    }

}
