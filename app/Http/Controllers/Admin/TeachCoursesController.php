<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TeachCourse;
use App\Models\SpeakerCourse;
use DB;
use Log;
class TeachCoursesController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(TeachCourse $object)
    {
        
        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'admin.teachCourses.';
        $this->routeName = 'teach.';
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
        $teachCourses=TeachCourse::orderBy("created_at", "Desc")->get();
        
        return view($this->viewName.'index', compact('teachCourses'));
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
       

		
        
        $data=[
            'name'=>$request->input('name'),
       
             ];
		
       
      
       
        $this->object::create($data);

	
       
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
        

		
        
        $data=[
            'name'=>$request->input('name'),
       
             ];
		
       
      
       
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
      $teach= $this->object::findOrFail($id);
         $menyList=SpeakerCourse::all();
              $count=0;
                   foreach($menyList as $row){
                    if($row->course_id==$id){
    
                     $count=$count+1;

                       }

                    }

                 

  if($count>0){

    return redirect()->back()->with('flash_danger','You cannot delete related with another...');   
  }
  else{

    $teach->delete();  
    return redirect()->route($this->routeName.'index')->with('flash_success', 'Data Has Been Deleted Successfully !'); 
  }
}   
    
}
