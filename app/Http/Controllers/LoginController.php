<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Socialite;
class LoginController extends Controller
{


    
    public function store(Request $request){
        $validator = $this->validate(request(),[
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $remember = ($request->has('remember')) ? true : false ;
        if(auth()->attempt(request(['email','password'],$remember))){
            return back();
        }
        return back()->with('failed','Email or password wrong');
    }


    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        // $user->token;
    }


    public function destroy(){
        auth()->logout();
        return back();
    }
}
