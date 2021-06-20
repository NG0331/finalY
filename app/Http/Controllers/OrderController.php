<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product; 
use App\Models\myCart;
use App\Models\myOrder;
Use Session;
Use Auth;
class OrderController extends Controller
{
    //
    public function add(){ 

        $r=request(); 
        $addOrder=myOrder::create([    
            
            'amount'=>$r->amount,             
            'paymentStatus'=>'pending',                 
            'userID'=>Auth::id(),                         
        ]); 
        
        $orderID=DB::table('myorders')->where('userID','=',Auth::id())->orderBy('created_at', 'desc')->first(); //get the lastest order ID        
        
        $items=$r->input('item');
        foreach($items as $item => $value){
            $carts =myCart::find($value);
            $carts->orderID = $orderID->id;
            $carts->save();
           }
        
        Session::flash('success',"Order succesful!");        
        Return redirect()->route('show.myCart'); //redirect to payment
        
    }
    
    public function show(){

        $myorders=DB::table('myorders')
        ->leftjoin('mycarts', 'myorders.id', '=', 'mycarts.orderID')
        ->leftjoin('products', 'products.id', '=', 'mycarts.productID')
        ->select('mycarts.*','myorders.*','products.*','mycarts.quantity as qty')
        ->where('myorders.userID','=',Auth::id())
        ->get();
        //->paginate(3);       
        return view('myOrder')->with('myorders',$myorders);
    }

}