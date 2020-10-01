<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseSubCategory;
use App\Models\CourseCategory;
use App\Models\RelatedCourses;
use Storage;
use DB;
use Log;
use File;
use Illuminate\Database\QueryException;
class CoursesController extends Controller
{
    protected $object;
    protected $viewName;
    protected $routeName;
    protected $message;
    protected $errormessage;

    public function __construct(Course $object)
    {
        
        $this->middleware('auth');
        $this->object = $object;
        $this->viewName = 'admin.courses.';
        $this->routeName = 'course.';
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
        $courses=Course::orderBy("created_at", "Desc")->get();
      
      
        return view($this->viewName.'index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=CourseCategory::all();
        return view($this->viewName.'create', compact('categories'));
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
     
if($request->input('course')=='on'){
    $active=1;
}

     $maxValue=100;

if($request->input('course_sub_category_id')){

    $maxValue =Course::where('course_sub_category_id','=',$request->input('course_sub_category_id'))->orderBy('id', 'desc')->value('course_code'); 
   
  
   
 $cat=CourseSubCategory::where('id','=', $request->input('course_sub_category_id'))->first();
 
 $max =substr($maxValue,strlen($cat->subcategory_code)); 
 if($max >=100){
    
    $max=$max+1;

    $courseCode=$cat->subcategory_code.$max ;


}else{

    $max =100;

    $courseCode=$cat->subcategory_code.$max;
}


    $data=[
            'course_code'=>$courseCode,
            'course_en_name'=>$request->input('course_en_name'),
            'course_en_desc'=>$request->input('course_en_desc'),
            'course_duration'=>$request->input('course_duration'),
            'Accreditation'=>$request->input('Accreditation'),
            'course_highlight'=>$request->input('course_highlight'),
            'course_objectives'=>$request->input('course_objectives'),
            'course_audience'=>$request->input('course_audience'),
            'course_training_methods'=>$request->input('course_training_methods'),
            'course_daily_agenda'=>$request->input('course_daily_agenda'),
            'active'=>$active,
                        ];

                        if($request->input('course_sub_category_id')){

                            $data['course_sub_category_id']=$request->input('course_sub_category_id');
                         }
                       
                         if($request->hasFile('course_image'))
                         {
                            $course_image=$request->file('course_image');
                   
                            $data['course_image'] = $this->UplaodImage($course_image);
            
                         }
                         if($request->hasFile('thumbnail'))
                         {
                            $thumbnail=$request->file('thumbnail');
                   
                            $data['course_image_thumbnail'] = $this->UplaodImage($thumbnail);
            
                         }

                         if($request->hasFile('fileDoc'))
                         {
                            $fileDoc=$request->file('fileDoc');
                   
                            $data['course_brochure'] = $this->UplaodFile($fileDoc);
            
                         }
          
           
     

        $this->object::create($data);
                    }
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $relateds=[];
        $relatedCourses=[];
        $course =Course::with('subCategory')->where('id', '=', $id)->first();
        $categories=CourseCategory::where('id', '!=',4)->get();
        $relateds=Course::where('id', '!=', $id)->orderBy("course_en_name", "asc")->get();
        $relatedCourses=RelatedCourses::where('course_id', '=', $id)->orderBy("created_at", "Desc")->get();
        return view($this->viewName.'edit', compact('relatedCourses','relateds','categories','course'));
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
     
if($request->input('course')=='on'){
    $active=1;
}


    $data=[
           
            'course_en_name'=>$request->input('course_en_name'),
            'course_en_desc'=>$request->input('course_en_desc'),
          
            'course_duration'=>$request->input('course_duration'),
            'Accreditation'=>$request->input('Accreditation'),
            'course_highlight'=>$request->input('course_highlight'),
            'course_objectives'=>$request->input('course_objectives'),
            'course_audience'=>$request->input('course_audience'),
            'course_training_methods'=>$request->input('course_training_methods'),
            'course_daily_agenda'=>$request->input('course_daily_agenda'),
            'active'=>$active,
                        ];

                        if($request->input('course_sub_category_id')){

                            $data['course_sub_category_id']=$request->input('course_sub_category_id');
                         }
                       
                         if($request->hasFile('course_image'))
                         {
                            $course_image=$request->file('course_image');
                   
                            $data['course_image'] = $this->UplaodImage($course_image);
            
                         }
                         if($request->hasFile('thumbnail'))
                         {
                             
                            $thumbnail=$request->file('thumbnail');
                   
                            $data['course_image_thumbnail'] = $this->UplaodImage($thumbnail);
            
                         }

                         if($request->hasFile('fileDoc'))
                         {
                           
                            $fileDoc=$request->file('fileDoc');
                   
                            $data['course_brochure'] = $this->UplaodFile($fileDoc);
            
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
        $course =Course::where('id', '=', $id)->first();
        // Delete File ..
        
        $file = $course->course_image;
        $doc = $course->course_brochure;
        $fileThumbnail = $course->course_image_thumbnail;

        $file_name = public_path('uploads/courses/'.$file);
        $doc_name = public_path('uploads/courseBrochure/'.$doc);
        $thumbnail = public_path('uploads/courses/'.$fileThumbnail);
      
        // if ($course->rounds()->count() ) {

        //     return redirect()->back()->with('flash_danger','You cannot delete related with another...');    
        //  }  
        //         $menyList=RelatedCourses::all();
        //         $count=0;
        //       foreach($menyList as $row){
        //        if($row->course_id==$id){

        //         $count=$count+1;

        //           }

        //        }
     
        //        if($count>0){

        //     return redirect()->back()->with('flash_danger','You cannot delete related with another...');    
        //  }   
        try{
            $course->delete();
                File::delete($file_name);
                File::delete($doc_name);
                File::delete($thumbnail);

            }
            catch(QueryException $q){
             
                return redirect()->back()->with('flash_danger','You cannot delete related with another...');  
    
            }
                return redirect()->route($this->routeName.'index')->with('flash_success', 'Data Has Been Deleted Successfully !');
    }
    /**
     * uplaud image
     */
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
        $imageName = $name;
      
		$uploadPath = public_path('uploads/courseBrochure');
		
		// Move The image..
		  $file->move($uploadPath, $imageName);
     
        //  Storage::put('public/uploads/courseBrochure', $imageName);
        // $filename =$imageName->store('/public/uploads',['disk' => 'public']);
        return $imageName;
    }

    /**
     * dependace sub category
     */
    function fetchCat(Request $request)
    {
       
     $select = $request->get('select');
     $value = $request->get('value');
   
     $data =CourseSubCategory::where('course_category_id', $value)->get();
     $output = '<option value="">Select Sub Category</option>';
    foreach($data as $row)
    {
     $output .= '<option value="'.$row->id.'">'.$row->subcategory_en_name.'</option>';
    }
    echo $output;
   }


/**
 * save Related Course
 */
public function saveRelated(Request $request){
    $data['course_id']=$request->get('course_id');
    $data['related_course_id']=$request->get('related_course_id');
    RelatedCourses::create($data);
    return back();
}


public function deleteRelated($id){
    
    $relatedcourse =RelatedCourses::where('id', '=', $id)->first();
    
    $relatedcourse->delete();
   
    return redirect()->back();

}
   
}
