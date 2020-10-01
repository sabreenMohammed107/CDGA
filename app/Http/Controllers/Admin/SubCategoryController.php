<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CourseSubCategory;
use App\Models\CourseCategory;
use File;
use DB;
use Log;
class SubCategoryController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(CourseSubCategory $object)
    {
        $this->middleware('auth');
  
        $this->object = $object;
        $this->viewName = 'admin.subCategory.';
        $this->routeName = 'subcat.';
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
        $subCategories=CourseSubCategory::where('course_category_id', '!=',4)->where('course_category_id', '!=',6)->with('courseCategory')->orderBy("created_at", "Desc")->get();
        $categories=CourseCategory::where('id', '!=',4)->where('id', '!=',6)->orderBy("created_at", "Desc")->get();

        return view($this->viewName.'index', compact('subCategories','categories'));
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

if($request->input('subcategory')=='on'){
    $active=1;
}

       
    $data=[
            'subcategory_code'=>$request->input('subcategory_code'),
            'subcategory_en_name'=>$request->input('subcategory_en_name'),
            'course_category_id'=>$request->input('course_category_id'),
            'subcategory_en_description'=>$request->input('subcategory_en_description'),
            'active'=>$active,
                        ];
                        if($request->hasFile('pic'))
             
             {

             $subcategory_image=$request->file('pic');
       
             $data['subcategory_image'] = $this->UplaodImage($subcategory_image);
             }

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
        
        $subcategory =CourseSubCategory::where('id', '=', $id)->first();
       
         $categories=CourseCategory::where('id', '!=',4)->where('id', '!=',6)->get();

         return view($this->viewName.'edit', compact('categories','subcategory'));
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
      

       if($request->input('subcategory')=='on'){
           $active=1;
             }
        $data=[
            'subcategory_code'=>$request->input('subcategory_code'),
            'subcategory_en_name'=>$request->input('subcategory_en_name'),
            'subcategory_en_description'=>$request->input('subcategory_en_description'),
            'active'=>$active,
             ];
             if($request->input('course_category_id')){

                $data['course_category_id']=$request->input('course_category_id');
             }
            
             if($request->hasFile('pic'))
             
             {
                $subcategory_image=$request->file('pic');
       
                $data['subcategory_image'] = $this->UplaodImage($subcategory_image);

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
        $subcategory =CourseSubCategory::where('id', '=', $id)->first();
        // Delete File ..
        $file = $subcategory->subcategory_image;
      
        $file_name = public_path('uploads/courses/'.$file);
            
        if ($subcategory->rounds()->count()) {

            return redirect()->back()->with('flash_danger','You cannot delete related with another...');    
         }
            $subcategory->delete();
                File::delete($file_name);
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
		$imageName = $name;
		$uploadPath = public_path('uploads/courses');
		
		// Move The image..
		$file->move($uploadPath, $imageName);
       
		return $imageName;
    }
}
