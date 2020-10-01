<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CareersApplicant;
use File;
use DB;
use Log;
class JobApplicantController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(CareersApplicant $object)
    {
        
        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'admin.jobApplicant.';
        $this->routeName = 'jobApplicant.';
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
        $jobApplicants=CareersApplicant::with('career')->with('level')->orderBy("created_at", "Desc")->get();
        return view($this->viewName.'index', compact('jobApplicants'));
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
        $jobApplicant=CareersApplicant::where('id', '=', $id)->first();
       
      

        return view($this->viewName.'view',compact('jobApplicant'));
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
        $jobApplicant=CareersApplicant::where('id', '=', $id)->first();
        // Delete File ..
        
        $file = $jobApplicant->doc_path;
        $cv = $jobApplicant->cv_path;
      
        $file_name = public_path('uploads/applicant/'.$file);
        $doc_name = public_path('uploads/applicant/'.$cv);
      
      
       
            $jobApplicant->delete();
                File::delete($file_name);
                File::delete($doc_name);
              
                return redirect()->route($this->routeName.'index')->with('flash_success', 'Data Has Been Deleted Successfully !');
    }


 
}
