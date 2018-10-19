<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class DashboardController extends Controller
{
    public function index($id)
    {
        if(Auth::check())
        foreach(auth()->user()->stores as $store){
            if($store->id == $id){
                return view('Dashboard.index')->with('store',$store);
            } 
        }else{
            return redirect('/');
        }
        return abort(404);
    }
}
