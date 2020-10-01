<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Trainer;
use File;
use DB;
use Log;
class TraineerController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Trainer $object)
    {
        
        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'admin.traineers.';
        $this->routeName = 'trainer.';
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
        $trainers=Trainer::orderBy("created_at", "Desc")->get();
        return view($this->viewName.'index', compact('trainers'));
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
            'trainer_name'=>$request->input('trainer_name'),
            'trainer_desc'=>$request->input('trainer_desc'),
           
            
             ];

             $trainer_image=$request->file('pic');
       
             $data['trainer_image'] = $this->UplaodImage($trainer_image);
            
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
        $trainer =Trainer::where('id', '=', $id)->first();
        return view($this->viewName.'edit',compact('trainer'));
    
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
            'trainer_name'=>$request->input('trainer_name'),
            'trainer_desc'=>$request->input('trainer_desc'),
           
            
             ];
             if($request->hasFile('pic'))
             {
             $trainer_image=$request->file('pic');
       
             $data['trainer_image'] = $this->UplaodImage($trainer_image);
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
        $trainer =Trainer::where('id', '=', $id)->first();
        // Delete File ..
        $file = $trainer->trainer_image;
      
        $file_name = public_path('uploads/trainers/'.$file);
             File::delete($file_name);
       
            $trainer->delete();
            return redirect()->route($this->routeName.'index')->with('flash_success', 'Data Has Been Deleted Successfully !');
    }
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
		$uploadPath = public_path('uploads/trainers');
		
		// Move The image..
		$file->move($uploadPath, $imageName);
       
		return $imageName;
    }
}
