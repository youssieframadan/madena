<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware('guest');
    }




    public function store(Request $request){
        $this->validate(request(),[
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'email'=> 'required|email',
            'phone_number'=> 'required',
            'password'=>'required'
        ]);
        
        // $user = User::create(request(['name','age','gender','email','phone_number','password']));
        $user = User::create([
            'name'=>request('name'),
            'age'=>request('age'),
            'gender'=>request('gender'),
            'email'=>request('email'),
            'phone_number'=>request('phone_number'),
            'password'=>request('password'),
            'user_type_id'=>3
            
        ]);
       
        auth()->login($user);
        return redirect()->intended('/');
    }



}
