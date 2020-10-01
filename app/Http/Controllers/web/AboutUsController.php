<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
class AboutUsController extends Controller
{
    protected $viewName='web.aboutUs.';
    
    public function index(){
        $clients = Client::where('active', '=',1)->get();
        return view($this->viewName.'index',compact('clients'));
    }

    public function conditions(){

        return view($this->viewName.'conditions');
    }
    public function Consunltancy(){
        return view($this->viewName.'consunltancy');
    }
    
    public function accreditations(){
        return view($this->viewName.'accreditations');
    }
}
