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
        return view('home');
    }
    public function show()
    {
        $products = Product::take(6)->inRandomOrder()->get();

        return view('userProduct')->with('products', $products);

    }
    public function adminHome()
    {
        return view('adminHome');
    }


}
