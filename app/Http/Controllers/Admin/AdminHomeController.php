<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Course;
use App\Models\Round;
use App\Models\Applicant;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
class AdminHomeController extends Controller
{
    
    
    
    
    public function __construct()
    {
        
        $this->middleware('auth');
    }
    
    public function home(){
      
        $now = Carbon::now();
     
      $monthRound = date("F", strtotime($now)); //march
       $month = $now->month;
      $year = $now->year;
      $rounds = Round::whereMonth('round_start_date', $month)->whereYear('round_start_date', $year)->count();
      $roundsYear = Round::whereYear('round_start_date', $year)->count();
     $registerApplicant=Applicant::where('applicant_type_id','=',0)->whereMonth('created_at', $month)->whereYear('created_at', $year)->count();
    $nextRounds = Round::where('round_start_date', '>=', Carbon::today())->first();
       
 return view('admin.dashboard', compact('roundsYear','year','rounds','monthRound','registerApplicant','nextRounds'));
        
    }
}
