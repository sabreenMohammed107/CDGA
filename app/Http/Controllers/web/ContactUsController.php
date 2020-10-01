<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Branch;
class ContactUsController extends Controller
{
    protected $viewName='web.contactUs.';
    public function index(){
        $contactBranchs =Branch::with('country')->with('venue')->where('active', '=',1)->orderBy('hq', 'DESC')->get();
       
        return view($this->viewName.'index', compact('contactBranchs'));
    }
}
