<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Career;
use App\Models\careerLevel;
use App\Models\CareersApplicant;
use App\Mail\JoinUsNotification;
use DB;
class JoinUsController extends Controller
{
    protected $viewName='web.joinUs.';
    public function index(){
        $careers=Career::where('active', '=',1)->get();
        $careerLevels=careerLevel::all();

        return view($this->viewName.'index',compact('careers','careerLevels'));
    }
     public function joinusForm(Request $request){
       
      
     
        $data=[
            'career_id'=>$request->input('career_id'),
             'carrer_level_id'=>$request->input('carrer_level_id'),
             'expected_salary'=>$request->input('expected_salary'),
             'name'=>$request->input('name'),
             'email'=>$request->input('email'),
             'mobile'=>$request->input('mobile'),
            
             
                         ];
 
              $cv_path=$request->file('cv_path');

              
             if($request->file('cv_path')){
               $data['cv_path'] = $this->UplaodImage($cv_path);
                }
           
            
             
              $doc_path=$request->file('doc_path');
             if($request->file('doc_path')){
            $data['doc_path'] = $this->UplaodFile($doc_path);
              }
            
         
            $careerApp= CareersApplicant::create($data);
            // $emails = ['sabreenm312@gmail.com','senior.steps.info@gmail.com'];
            $emails = ['senior.steps.info@gmail.com','info@btsconsultant.com','nasser@btsconsultant.com'];
            \Mail::to($emails)->send(new JoinUsNotification($careerApp));
            return redirect()->back()->with('message', 'Thanks; your request has been submitted successfully !');
  
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
		$imageName = $name;
		$uploadPath = public_path('uploads/applicant');
		
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
		$uploadPath = public_path('uploads/applicant');
		
		// Move The image..
		$file->move($uploadPath, $fileName);
       
		return $fileName;
    }
}
