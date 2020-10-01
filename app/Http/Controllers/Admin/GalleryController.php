<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ImageGallery;
use File;
use DB;
use Log;
class GalleryController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(ImageGallery $object)
    {
        
        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'admin.imageGallery.';
        $this->routeName = 'gallery.';
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
        $galleries=ImageGallery::orderBy("created_at", "Desc")->get();
        return view($this->viewName.'index', compact('galleries'));

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
      

       if($request->input('gallery')=='on'){
           $active=1;
             }
        $data=[
            'order'=>$request->input('order'),
           
             'active'=>$active,
            
             ];
		
       
        $image_path=$request->file('pic');
       
        $data['image_path'] = $this->UplaodImage($image_path);
       
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
        $gallery =ImageGallery::where('id', '=', $id)->first();
       
      

        return view($this->viewName.'edit',compact('gallery'));
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
      

       if($request->input('gallery')=='on'){
           $active=1;
             }
        $data=[
            'order'=>$request->input('order'),
           
             'active'=>$active,
            
             ];
		
             if($request->hasFile('pic'))
             {
        $image_path=$request->file('pic');
       
        $data['image_path'] = $this->UplaodImage($image_path);
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
        $gallery=ImageGallery::where('id', '=', $id)->first();
        // Delete File ..
        $file = $gallery->image_path;
      
        $file_name = public_path('uploads/gallery/'.$file);
             File::delete($file_name);
       
            $gallery->delete();
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
		$uploadPath = public_path('uploads/gallery');
		
		// Move The image..
		$file->move($uploadPath, $imageName);
       
		return $imageName;
    }
}
