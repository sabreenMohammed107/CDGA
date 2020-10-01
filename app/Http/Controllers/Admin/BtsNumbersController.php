<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BtsNumber;
use DB;
use Log;
class BtsNumbersController extends Controller
{
    protected $object;
    
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(BtsNumber $object)
    {
        $this->middleware('auth');
  
        $this->object = $object;
        $this->viewName = 'admin.btsNumbers.';
        $this->routeName = 'number.';
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
        $numbers=BtsNumber::orderBy("created_at", "Desc")->get();
      
      
        return view($this->viewName.'index', compact('numbers'));
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
      

       if($request->input('numbers')=='on'){
           $active=1;
             }
        $data=[
            'bts_number_en_name'=>$request->input('bts_number_en_name'),
            'bts_number_value'=>$request->input('bts_number_value'),
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
        $number =BtsNumber::where('id', '=', $id)->first();
       
      

        return view($this->viewName.'edit',compact('number'));
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
      

       if($request->input('numbers')=='on'){
           $active=1;
             }
        $data=[
            'bts_number_en_name'=>$request->input('bts_number_en_name'),
            'bts_number_value'=>$request->input('bts_number_value'),
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
        
        return redirect()->route($this->routeName.'index')->with('flash_success', 'Data Has Been Deleted Successfully !');
    }
}
