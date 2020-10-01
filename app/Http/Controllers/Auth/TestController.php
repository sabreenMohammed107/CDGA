<?php

namespace App\Http\Controllers\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
   
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    } 

    protected function create(Request $data)
    {
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' =>uniqid(),
            'role' =>2,

        ]);

    //   return redirect('/home');
     return redirect('/admin')->with('flash_success',"$user->name's password has been reset successfully! Password('$user->password')");  
    }
}
