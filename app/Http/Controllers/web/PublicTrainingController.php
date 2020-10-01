<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CourseSubCategory;
class PublicTrainingController extends Controller
{  
    protected $viewName='web.publicTraining.';

    

    public function index(){

     $trainingCategories =CourseSubCategory::whereIn('course_category_id', ['1', '2','3'])->paginate(9);

     return view($this->viewName.'index', compact('trainingCategories'));
    }
    /**
             * Make pagination on all and return with ajax
             */
              
            
            function fetch_main(Request $request)
            {
             

             if($request->ajax())
             {
                $trainingCategories =CourseSubCategory::whereIn('course_category_id', ['1', '2','3'])->paginate(9);
                        
              return view('web.publicTraining.indexCat', compact('trainingCategories'))->render();
             }
            }
/**
 * 
 * technicalTraining
 */

            public function technicalTraining($id){
               
                $technicalTraining=CourseSubCategory::where('course_category_id', $id)->paginate(9);
               
                return view($this->viewName.'technical', compact('technicalTraining'));
            }
             /**
             * Make pagination on technicalTraining and return with ajax
             */
              
            
            function fetch_tech(Request $request)
            {
             

             if($request->ajax())
             {
                $technicalTraining=CourseSubCategory::where('course_category_id', 1)->paginate(9);
                        
              return view('web.publicTraining.technicalCat', compact('technicalTraining'))->render();
             }
            }
            /**
             *  softTraining
             * 
             */

            public function softTraining($id){
                $softTraining=CourseSubCategory::where('course_category_id', $id)->paginate(9);
               
                return view($this->viewName.'soft', compact('softTraining'));
            }
             /**
             * Make pagination on softTraining and return with ajax
             */
              
            
            function fetch_soft(Request $request)
            {
             

             if($request->ajax())
             {
                $softTraining=CourseSubCategory::where('course_category_id', 2)->paginate(9);
                        
              return view('web.publicTraining.softCat', compact('softTraining'))->render();
             }
            }
/**
 * 
 *certiTraining
 */
            public function certiTraining($id){
                $certiTraining=CourseSubCategory::where('course_category_id', $id)->paginate(9);
               
                return view($this->viewName.'certified', compact('certiTraining'));
            }

             /**
             * Make pagination on certiTraining and return with ajax
             */
              
            
            function fetch_certi(Request $request)
            {
             

             if($request->ajax())
             {
                $certiTraining=CourseSubCategory::where('course_category_id', 3)->paginate(9);
                        
              return view('web.publicTraining.certifiedCat', compact('certiTraining'))->render();
             }
            }

            /**
             * it training
             */
            
            public function itTraining($id){
              $itCategories=CourseSubCategory::where('course_category_id', $id)->paginate(9);
             
              return view($this->viewName.'it', compact('itCategories'));
          }
           /**
             * Make pagination on it training and return with ajax
             */
              
            
            function fetch_it(Request $request)
            {
             

             if($request->ajax())
             {
                $itCategories=CourseSubCategory::where('course_category_id', 5)->paginate(9);
                        
              return view('web.publicTraining.itCat', compact('itCategories'))->render();
             }
            }

}
