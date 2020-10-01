<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Speakers;
use App\Models\SpeakersExpertise;
use App\Models\SpeakerCourse;
use File;
use DB;
use Log;
use App\Models\TeachCourse;
class ApplicantSpeakerController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Speakers $object)
    {
        
        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'admin.applicantSpeaker.';
        $this->routeName = 'appl.';
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
        $speakers=Speakers::with('country')->with('salut')->orderBy("created_at", "Desc")->get();
        return view($this->viewName.'index', compact('speakers'));
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
        $speaker=Speakers::where('id', '=', $id)->first();
       
      $speakerExpers=Speakers::find($id);
         $speakerCourses=Speakers::find($id);
        // $speakerCourses=TeachCourse::all();
    //  $speakerCourses=DB::table('speaker_courses')->select('id')
    //  ->where('speaker_id','=',$id)
    //  ->pluck('id');
    // return($speakerCourses->course);
        return view($this->viewName.'view',compact('speaker','speakerExpers','speakerCourses'));
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
        $speakerApplicant=Speakers::where('id', '=', $id)->first();
        // Delete File ..
        
        $file = $speakerApplicant->doc_path;
        $cv = $speakerApplicant->cv_path;
      
        $file_name = public_path('uploads/courseBrochure/'.$file);
        $doc_name = public_path('uploads/courseBrochure/'.$cv);
      
      
       
            $speakerApplicant->delete();
                File::delete($file_name);
                File::delete($doc_name);
              
                return redirect()->route($this->routeName.'index')->with('flash_success', 'Data Has Been Deleted Successfully !');
    }
}
