<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use App\Models\Testmonials;
use App\Models\ImageGallery;
class TesimonialController extends Controller
{
    protected $viewName='web.testimonial.';

    public function index(){

        $testimonial=HomeSlider::where('active', '=',1)->firstOrFail();
        $reviews=Testmonials::inRandomOrder(rand(10,100))->get();
        $secondReviews=Testmonials::inRandomOrder(rand(10,100))->get();
        $galleries=ImageGallery::orderBy('order', 'ASC')->get();
        
        return view($this->viewName.'index',compact('testimonial','reviews','secondReviews','galleries'));
    }
}
