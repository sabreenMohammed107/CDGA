<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use DB;
use Log;

class SliderController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(HomeSlider $object)
    {
        
        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'admin.homeSlider.';
        $this->routeName = 'slider.';
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
        $sliders=HomeSlider::orderBy("created_at", "Desc")->get();
      
      
        return view($this->viewName.'index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
      

       if($request->input('slider')=='on'){
           $active=1;
             }
        $data=[
            'slider_video_url'=>$request->input('slider_video_url'),
            'testimonials_video_url'=>$request->input('testimonials_video_url'),
            'slider_en_title'=>$request->input('slider_en_title'),
            'slider_en_subtitle'=>$request->input('slider_en_subtitle'),
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
        $slider =HomeSlider::where('id', '=', $id)->first();
       
      

        return view($this->viewName.'edit',compact('slider'));
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
      

       if($request->input('slider')=='on'){
           $active=1;
             }
        $data=[
            'slider_video_url'=>$request->input('slider_video_url'),
            'testimonials_video_url'=>$request->input('testimonials_video_url'),
            'slider_en_title'=>$request->input('slider_en_title'),
            'slider_en_subtitle'=>$request->input('slider_en_subtitle'),
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
        $this->object::findOrFail($id)->delete();
        
        return redirect()->route($this->routeName.'index')->with('flash_success','Data Has Been Deleted Successfully !');
    }
}
