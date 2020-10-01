<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Country;
use App\Models\Venue;
use DB;
use Log;
use Illuminate\Foundation\Validation\ValidatesRequests;
class BranchesController extends Controller
{
  
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Branch $object)
    {
        
        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'admin.branches.';
        $this->routeName = 'branch.';
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
        $branches=Branch::orderBy("created_at", "Desc")->get();
      
        $countries=Country::all();
      
        return view($this->viewName.'index', compact('branches','countries'));
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
        $hq=0;

if($request->input('active')=='on'){
    $active=1;
}
if($request->input('hq')=='on'){
    $hq=1;
}
$hqs=Branch::where('hq',1)->first();

 
       
    $data=[
            'branch_name'=>$request->input('branch_name'),
            'address'=>$request->input('address'),
            'email'=>$request->input('email'),
            'office_phone'=>$request->input('office_phone'),
            'mobile'=>$request->input('mobile'),
            'map_location' =>$request->input('map_location'),
            'country_id' =>$request->input('country_id'),
            'venue_id'=>$request->input('venue_id'),
            'active'=>$active,
            'hq'=>$hq,
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
        $branch =Branch::where('id', '=', $id)->first();
       
        $countries=Country::all();

        return view($this->viewName.'edit',compact('branch','countries'));
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
        $hq=0;

if($request->input('active')=='on'){
    $active=1;
}
if($request->input('hq')=='on'){
    $hq=1;
}
$hqs=Branch::where('hq',1)->get();

      
       
    $data=[
            'branch_name'=>$request->input('branch_name'),
            'address'=>$request->input('address'),
            'email'=>$request->input('email'),
            'office_phone'=>$request->input('office_phone'),
            'mobile'=>$request->input('mobile'),
            'map_location' =>$request->input('map_location'),
            'active'=>$active,
            'hq'=>$hq,
             ];
      
     if($request->input('country_id')){

        $data['country_id']=$request->input('country_id');
     }
     if($request->input('venue_id')){
        $data['venue_id'] =$request->input('venue_id');
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
        $this->object::findOrFail($id)->delete();
        
        return redirect()->route($this->routeName.'index')->with('flash_success', 'Data Has Been Deleted Successfully !');
    }

    function fetch(Request $request)
    {
       
     $select = $request->get('select');
     $value = $request->get('value');
     $dependent = $request->get('dependent');
     $data =Venue::where('country_id', $value)->get();
     $output = '<option value="">Select Venue</option>';
    foreach($data as $row)
    {
     $output .= '<option value="'.$row->id.'">'.$row->venue_en_name.'</option>';
    }
    echo $output;
   }
}
