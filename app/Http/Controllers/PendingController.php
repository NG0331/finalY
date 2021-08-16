<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Language;
use App\Models\Product;
use App\Models\Category;
use App\Models\reviews;
use Auth;
use Session;


class PendingController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function show() {

        $categories=Category::all();
        if (request()->category) {
            $products=DB::table('products')
            ->select('products.*')
            ->where('products.categoryID','=',request()->category)
            ->paginate(9);


            $categoryNames=DB::table('categories')
            ->select('categories.*')
            ->where('categories.id','=',request()->category)
            ->get();
            
        }else {
            $products=Product::paginate(9);
            $categoryNames=null;
  
        }
        
        return view('products')->with([
            'products'=>$products,
            'categories'=>$categories,
            'categoryName'=>$categoryNames,
        ]);
        }
        public function pengdingBook() {
            $products=DB::table('products')
            ->select('products.*')
            ->where('products.approve','=','0') //pending =0
            ->paginate(12); 
       
            return view('pending/showPendingBook')->with('products',$products);
        }
        public function approve($id){
            $products = Product::find($id);  
            $products->approve = 1; // approve =1
            $products->save();
            Session::flash('approved',"Sucessfuly Approved");
            return redirect()->route('showPending.Book'); // route Name
        }
    
        public function reject($id){
    
            $products = Product::find($id);  
            $products->approve = 2; 
            $products->delete();
            // reject = 2
            
            Session::flash('rejected',"Sucessfuly rejected");
            return redirect()->route('showPending.Book');

        }
}
