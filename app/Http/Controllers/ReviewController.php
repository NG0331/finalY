<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product; 
use App\Models\reviews; 
Use Auth;
Use Session;
class ReviewController extends Controller
{
    public function create(){
        return view('insertReview')->with('products',Product::id());
    }

    public function store(){   
        $r=request(); 
      
        $name= DB::table('users')->where('id','=', Auth::id())->value('name');
        $products=Product::find($r->ID);         
        $addReview=reviews::create([     
            'userID'=>Auth::id(),
            'userName'=>Auth::user()->name,
            'productID'=>$r->id,    
            'ratingPoints'=>$r->ratingPoints,  
            'comment'=>$r->comment,
        ]); 
        
       

        return redirect()->route('product.detail', ['id' => $r->productID]);
    }
}

