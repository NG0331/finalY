<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product; 
use App\Models\myCart;
Use Session;
Use Auth;
class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add(){ 

        $r=request(); 
        $addCategory=myCart::create([            
            'quantity'=>$r->quantity,             
            'orderID'=>'',  
            'productID'=>$r->id,                 
            'userID'=>Auth::id(),
        ]);
        Session::flash('success',"Product add succesful!");        
        Return redirect()->route('products.List');
    }
    public function show(){ 
        $carts=DB::table('mycarts')
        ->leftjoin('products', 'products.id', '=', 'mycarts.productID')
        ->select('mycarts.quantity as qty','mycarts.id as cid','products.*')
        ->where('mycarts.orderID','=','') //'' haven't make payment
        ->where('mycarts.userID','=',Auth::id())
        ->paginate(12);
        return view('myCart')->with('carts',$carts);
    }

    public function showMyCart(){
        $carts=DB::table('mycarts')
        ->leftjoin('products', 'products.id', '=', 'mycarts.productID')
        ->select('mycarts.quantity as qty','mycarts.id as cid','products.*')
        ->where('mycarts.orderID','=','') //'' haven't make payment
        ->where('mycarts.userID','=',Auth::id())
        ->paginate(12);
        return view('myCart')->with('carts',$carts);
    }
    public function delete($id){
        $carts=mycart::find($id);
        $carts->delete();
        return redirect()->route('show.myCart');
    }
}
