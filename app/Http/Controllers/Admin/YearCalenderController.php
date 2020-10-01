<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Year_calendar;

use DB;
use Log;
class YearCalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Year_calendar $object)
    {
        
        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'admin.yearCalender.';
        $this->routeName = 'yearCalender.';
        $this->message = 'The Data has been saved';
        $this->errormessage = 'check Your Data ';
        
       
      
    }
    public function index()
    {
        $calenders=Year_calendar::orderBy("created_at", "Desc")->get();
        return view($this->viewName.'index', compact('calenders'));
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
        $calender =Year_calendar::where('id', '=', $id)->first();
        return view($this->viewName.'edit',compact('calender'));
        
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
      
        if($request->hasFile('fileCurrent'))
        {
           $fileCurrent=$request->file('fileCurrent');
  
           $data['current_year_calendar'] = $this->UplaodFile($fileCurrent);

        }

        if($request->hasFile('fileNext'))
        {
           $fileNext=$request->file('fileNext');
  
           $data['next_year_calendar'] = $this->UplaodFile($fileNext);

        }
        if($request->hasFile('fileProfile'))
        {
           $fileProfiles=$request->file('fileProfile');
  
           $data['campany_profile'] = $this->UplaodFile($fileProfiles);

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
        //
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
		$imageName =$name;
		$uploadPath = public_path('uploads/calender');
		
		// Move The image..
		$file->move($uploadPath, $imageName);
       
		return $imageName;
    }

}
