<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;
use Image;
use App\Adress;
class StoresController extends Controller
{
    public function show($id){
        return $id;
    }
    public function store(Request $request){
        /***** Validating *****/
        $this->validate(request(),[
            'storename' => 'required',
            'governorate_id' => 'required',
            'city_id' => 'required',
            'street'=> 'required',
            'block_no'=> 'required',
            'phone_no'=>'required',
            'store_image'=>'required',
        ]);
            /***** End Validating *****/

        /****** Storing Store Image ******/
        $location = '';
        if($request->hasFile('store_image')){
            $image = $request->file('store_image');
            $filename = time() .'-'.$image->getClientOriginalName().'.' . $image->getClientOriginalExtension();
            $location = public_path('Images\\'.$filename);
            Image::make($image)->resize(350,350)->save($location);
        }
        /****** End Storing Store Image ******/


        /**** Creating Store *****/
         $store =  Store::create([
            'storename' => request('storename'),
            'phone_no' => request('phone_no'),
            'user_id' => auth()->id(),
            'store_image' => $location,
           ]);
        /****  Creating Store *****/


        /***** Creating Main Adress   ****/

        Adress::create(
            [
               'governorate_id' => request('governorate_id'),
               'city_id' => request('city_id'),
               'street' => request('street'),
               'block_no' => request('block_no'),
               'store_id' => $store->id
            ]
        );

        /***** End Creating Main Adress   ****/

            return back();
}
    public function userStores(){
        
    }
}
