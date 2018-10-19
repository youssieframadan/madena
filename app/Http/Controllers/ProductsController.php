<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\product_image;
use App\adress_product;
use Image;
use Session;
use App\Likes;
use App\Comments;
use DB;
class ProductsController extends Controller
{
    public function search(Request $request)
    {
        // ->where('Product_Title',$search_word)
        $search_word = $request['search_word'];
        

        $products_results = DB::table('products')
        ->Where('products.product_title', 'LIKE', '%' .$search_word. '%')
        ->orWhere('products.product_description', 'LIKE', '%' .$search_word. '%')
        ->orWhere('types.type_name', 'LIKE', '%' .$search_word. '%')
        ->orWhere('categories.category_name', 'LIKE', '%' .$search_word. '%')
        ->join('categories', 'categories.id', '=', 'products.product_category_id')
        ->join('types', 'types.id', '=', 'products.product_type_id')
        ->select('types.Type_Name','categories.Category_Name','products.*')
        ->get();
        
        if($products_results)
          return view('results',compact('products_results'));
        else
          abort(404);
    }
    public function store(Request $request)
    {
        /******* Validating *******/
        $this->validate(request(),[
            'product_title' => 'required',
            'category_id' => 'required',
            'type_id' => 'required',
            'description'=> 'required',
            'price_original'=> 'required',
            'store_id' => 'required',
            'adress_id' => 'required',
            'product_images'=>'required',
        ]);
        $sale = $request->has('Product_On_Sale')? true:false;
        if($sale){
        	$this->validate(request(),[
        		'price_new' => 'required'
            ]);
            $postsale = request('price_new');
        }else{
            $postsale = 0;
        }
        /******* End Validating *******/

        /******* Storing the Product *******/
        $product = Product::create(
            [
                'product_title' => request('product_title'),
                'product_category_id' => request('category_id'),
                'product_type_id' => request('type_id'),
                'product_description' => request('description'),
                'product_sale' => $sale,
                'product_price_presale' => request('price_original'),
                'product_price_postsale' => $postsale,
                'store_id' =>  request('store_id'),
            ]
        );
        /******* End Storing the Product *******/
        ini_set('memory_limit', '256M');
        /******* Adding Product Images *******/
        if ($request->hasFile('product_images')) {
            $images = $request->file('product_images');
            foreach ($images as $image) {
                $filename = time() .'-'.$image->getClientOriginalName();
                $destaintion = public_path('/Images/'.$filename);
                $newImage = Image::make($image)->resize(350,350)->save($destaintion);
                $newImage->destroy();
                $location = '/Images/'.$filename;
                product_image::create([
                    'product_id' => $product->id,
                    'image_location' => $location
                ]);
                
            }
            unset($images);
        }
        /******* End Adding Product Images *******/
        
        /******* Adding Availability in Branches *******/
        adress_product::create([
            'adress_id'  =>  request('adress_id'),
            'product_id' =>  $product->id,
            'product_status' => 'Available',
        ]);
        /******* End Adding Availability in Branches *******/
        return back();
    }
    public function update($id,Request $request)
    {
        $product = Product::find($id);
        if($product){
            if(auth()->user()->id == $product->store()->first()->user()->first()->id){
                /******* Validating *******/
                    $this->validate(request(),[
                        'product_title' => 'required',
                        'category_id' => 'required',
                        'type_id' => 'required',
                        'description'=> 'required',
                        'price_original'=> 'required',
                    ]);
                    $sale = $request->has('Product_On_Sale')? true:false;
                    if($sale){
                        $this->validate(request(),[
                            'price_new' => 'required'
                        ]);
                        $postsale = request('price_new');
                    }else{
                        $postsale = 0;
                    }
            /******* End Validating *******/
            /******* Updating the Product *******/
                $product->product_title = request('product_title');
                $product->product_category_id = request('category_id');
                $product->product_type_id = request('type_id');
                $product->product_description = request('description');
                $product->product_price_presale = request('price_original');
                $product->product_price_postsale =  $postsale;
                $product->product_sale = $sale;
                $product->save();
        /******* End Updating the Product *******/
        ini_set('memory_limit', '256M');
        /******* Adding Product Images *******/
        if ($request->hasFile('product_images')) {
            $images = $request->file('product_images');
            foreach ($images as $image) {
                $filename = time() .'-'.$image->getClientOriginalName();
                $destaintion = public_path('/Images/'.$filename);
                $newImage = Image::make($image)->resize(350,350)->save($destaintion);
                $newImage->destroy();
                $location = '/Images/'.$filename;
                product_image::create([
                    'product_id' => $product->id,
                    'image_location' => $location
                ]);
                
            }
            unset($images);
        }
        /******* End Adding Product Images *******/
        return back();
            }
        }
        return abort(404);
    }


    
    public function show($id)
    {
        $product = Product::find($id);
        if($product){
            return view('product.show')->with('product',$product);
        }
        return abort(404);
    }


    public function like($id){
        $product = Product::find($id);
        
        if($product){
            Likes::create(
                [
                    'product_id'=>$id,
                    'user_id'=>   auth()->user()->id,
                ]
            );
            $likesCounter = $product->likes()->count();
            return response()->json(array(
                'message'   =>  'Product Added to your list',
                'likesCounter' => $likesCounter
            ));
        }else{
            return abort(404);
        }
    }
    public function dislike($id){
        $product = Product::find($id);
        
        if($product){
            foreach (auth()->user()->likes()->get() as $like){
                if($like->product_id == $id){
                    $like->delete();
                }
            }
            $likesCounter = $product->likes()->count();
            return response()->json(array(
                'message'   =>  'Product removed from your list',
                'likesCounter' => $likesCounter
            ));
        }else{
            return abort(404);
        }
    }
    public function comment($id,Request $request)
    {
        $product = Product::find($id);
        
        if($product){
            $comment = Comments::create([
                'comment_body' => request('comment_body'),
                'user_id' => auth()->user()->id,
                'product_id' => $id
            ]);
            $commentCounter = $product->comments()->count();
            return response()->json(array(
                'message'   =>  ' your comment was added',
                'commentCounter' => $commentCounter
            ));
        }
        return abort(404);
    }
    public function productapi($id)
    {
        $product = Product::find($id);
        
        return response()->json($product);
    }
    public function destroy($id)
    {
        $product = Product::find($id)->delete();
        Session::put('success', 'Your Product Deleted Successfully.');
        return back();
    }
}
