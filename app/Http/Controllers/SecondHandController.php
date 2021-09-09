<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Language;
use App\Models\Product;
use App\Models\Category;
use App\Models\reviews;
use Session;
use Auth;
class SecondHandController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        
    }
    public function show() {

        $categories=Category::all();
        if (request()->category) {
            $products=DB::table('products')
            ->select('products.*')
            ->where('products.approve','=','1')
            ->where('products.bookStatus','=','secondHand')
            ->where('products.categoryID','=',request()->category)
            ->paginate(9);

            $categoryNames=DB::table('categories')
            ->select('categories.*')
            ->where('categories.id','=',request()->category)
            ->get();
            
        }else {
            $products=DB::table('products')
            ->select('products.*')
            ->where('products.approve','=','1')
            ->where('products.bookStatus','=','secondHand')
            ->paginate(9); 
            $categoryNames=null;
  
        }
        
        return view('products/secondHand')->with([
            'products'=>$products,
            'categories'=>$categories,
            'categoryName'=>$categoryNames,
        ]);

        }
}
