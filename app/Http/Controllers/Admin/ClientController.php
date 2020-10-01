<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use File;
use DB;
use Log;
class ClientController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Client $object)
    {
        
        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'admin.clients.';
        $this->routeName = 'client.';
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
        $clients=Client::orderBy("created_at", "Desc")->get();
      
      
        return view($this->viewName.'index', compact('clients'));
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
      

       if($request->input('client')=='on'){
           $active=1;
             }
        $data=[
            'client_website'=>$request->input('client_website'),
            'client_name'=>$request->input('client_name'),
             'active'=>$active,
            
             ];
		
       
        $client_logo_url=$request->file('pic');
       
        $data['client_logo_url'] = $this->UplaodImage($client_logo_url);
       
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
        $client =Client::where('id', '=', $id)->first();
       
      

        return view($this->viewName.'edit',compact('client'));
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
      

       if($request->input('client')=='on'){
           $active=1;
             }
        $data=[
            'client_website'=>$request->input('client_website'),
            'client_name'=>$request->input('client_name'),
             'active'=>$active,
            
             ];
		
             if($request->hasFile('pic'))
             {
                $client_logo_url=$request->file('pic');
       
                $data['client_logo_url'] = $this->UplaodImage($client_logo_url);

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
        $client=Client::where('id', '=', $id)->first();
        // Delete File ..
        $file = $client->client_logo_url;
      
        $file_name = public_path('uploads/clients/'.$file);
             File::delete($file_name);
       
            $client->delete();
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
		$uploadPath = public_path('uploads/clients');
		
		// Move The image..
		$file->move($uploadPath, $imageName);
       
		return $imageName;
    }
}
