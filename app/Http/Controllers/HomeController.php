<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Product; 
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    
    {
        if(auth()->user()->is_admin == 0){
            return view('userHome');
        }elseif(auth()->user()->is_admin == 1){
            return view('adminHome');
        }
       
    }
  
    public function show(){
        $products=DB::table('products')
        ->select('products.*')
        ->where('products.approve','=','1')
        ->take(6)->inRandomOrder()->get();

        return view('/products/userProduct')->with('products', $products);
    }
    
    

}
