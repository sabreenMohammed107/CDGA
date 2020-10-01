<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Database\QueryException;
class CountryController extends Controller
{
    protected $object;
    
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Country $object)
    {
        $this->middleware('auth');
  
        $this->object = $object;
        $this->viewName = 'admin.country.';
        $this->routeName = 'country.';
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
        $countries=Country::orderBy("created_at", "Desc")->get();
      
      
        return view($this->viewName.'index', compact('countries'));
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
            'country_en_name'=>$request->input('country_en_name'),
           
            
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
        $country =Country::where('id', '=', $id)->first();
       
      

        return view($this->viewName.'edit',compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  $data=[
        'country_en_name'=>$request->input('country_en_name'),
       
        
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
      
        $country =Country::where('id', '=', $id)->first();  
      
        try{
            
            $country->delete();
       
        }
        catch(QueryException $q){
         
            return redirect()->back()->with('flash_danger','You cannot delete related with another...');  

        }
        
        return redirect()->route($this->routeName.'index')->with('flash_success', 'Data Has Been Deleted Successfully !');
    }
}
