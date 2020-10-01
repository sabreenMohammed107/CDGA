<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Testmonials;

use DB;
use Log;
class TestimonialController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Testmonials $object)
    {
        
        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'admin.testimonial.';
        $this->routeName = 'testimonial.';
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
        $testimonials=Testmonials::orderBy("created_at", "Desc")->get();
        return view($this->viewName.'index', compact('testimonials'));
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
            'reviewer_name'=>$request->input('reviewer_name'),
            'reviewer_text'=>$request->input('reviewer_text'),
            'reviewer_star_rate'=>$request->input('rating'),
          
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
        $testimonial =Testmonials::where('id', '=', $id)->first();
        return view($this->viewName.'edit',compact('testimonial'));
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
            'reviewer_name'=>$request->input('reviewer_name'),
            'reviewer_text'=>$request->input('reviewer_text'),
          
          
        ];
        if($request->input('rating')){
            $data['reviewer_star_rate'] =$request->input('rating');
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
        $testimonial =Testmonials::where('id', '=', $id)->first();
      
      
       
            $testimonial->delete();
            return redirect()->route($this->routeName.'index')->with('flash_success', 'Data Has Been Deleted Successfully !');
    }
}
