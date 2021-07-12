<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product; 
use App\Models\Review; 
Use Auth;
Use Session;
class ReviewController extends Controller
{
    public function create(){
        return view('insertReview')->with('products',Product::id());

    }
    public function store(){   
        $r=request(); 
      
        $username= DB::table('users')->where('id','=', Auth::id())->value('name');    
        $addReview=review::create([    
            
            'productID'=>$r->productID,
            'comment'=>$r->comment, 
            'ratingPoints'=>$r->ratingPoints,
            'userID'=>Auth::id(),
            
        ]);
        
        Session::flash('success',"Review  succesful!");

        return redirect()->route('product.detail', ['id' => $r->productID]);
    }
}
