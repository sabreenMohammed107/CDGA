<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Career;

use DB;
use Log;
class CareersController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Career $object)
    {
        
        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'admin.careers.';
        $this->routeName = 'career.';
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
        $careers=Career::orderBy("created_at", "Desc")->get();
        return view($this->viewName.'index', compact('careers'));
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
       
        $active=0;
      

        if($request->input('career')=='on'){
            $active=1;
              }
      $data=[
            'job_name'=>$request->input('job_name'),
            'job_requirements'=>$request->input('job_requirements'),
            'active'=>$active,
          
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
        $career =Career::where('id', '=', $id)->first();
        return view($this->viewName.'edit',compact('career'));
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
      

        if($request->input('career')=='on'){
            $active=1;
              }
      $data=[
            'job_name'=>$request->input('job_name'),
            'job_requirements'=>$request->input('job_requirements'),
            'active'=>$active,
          
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
        $career =Career::where('id', '=', $id)->first();
      

        if ($career->careerApplicant()->count()) {

            return redirect()->back()->with('flash_danger','You cannot delete related with another...');    
         }   
       
        $career->delete();
        
     
        return redirect()->route($this->routeName.'index')->with('flash_success', 'Data Has Been Deleted Successfully !');
    }
}
