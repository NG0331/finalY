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

class UserController extends Controller
{
    public function userInsert(){
        return view('user/insertProduct') 
        ->with('languages',Language::all())
        ->with('categories',Category::all());;
    }

    public function StoreSecondHand() {
        $r=request();
        $image=$r->file('product-image');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();
        $name= DB::table('users')->where('id','=', Auth::id())->value('name');
        $addProduct=Product::create([
            'userID'=>Auth::id(),
            'userName'=>Auth::user()->name,
            'bookName'=>$r->bookName,
            'author'=>$r->author,
            'publisher'=>$r->publisher,
            'publishDate'=>$r->publishDate,
            'description'=>$r->description,
            'dimensions'=>$r->dimensions,   
            'categoryID'=>$r->category,
            'languageID'=>$r->language,
            'price'=>$r->price,
            'quantity'=>$r->quantity,
            'pages'=>$r->pages,
            'approve'=>0, //pending = 0, 1 approve ,2 reject
            'is_secondHand'=>1,
            'image'=>$imageName,           
        ]);
        Session::flash('success',"must send your  sample book to office and waiting admin approve"); 
        return redirect()->route('show.Status');
    }

    public function StoreNewBook() {
        $r=request();
        $image=$r->file('product-image');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();
        $name= DB::table('users')->where('id','=', Auth::id())->value('name');
        $addProduct=Product::create([
            'userID'=>Auth::id(),
            'userName'=>Auth::user()->name,
            'bookName'=>$r->bookName,
            'author'=>$r->author,
            'publisher'=>$r->publisher,
            'publishDate'=>$r->publishDate,
            'description'=>$r->description,
            'dimensions'=>$r->dimensions,   
            'categoryID'=>$r->category,
            'languageID'=>$r->language,
            'price'=>$r->price,
            'quantity'=>$r->quantity,
            'pages'=>$r->pages,
            'approve'=>0, //pending = 0, 1 approve ,2 reject
            'is_newBook'=>1,
            'image'=>$imageName,           
        ]);
        Session::flash('success',"must send your sample book to office and waiting admin approve"); 
        return redirect()->route('show.Status');
    }

    
    public function showStatus() {
        $products=DB::table('products')
        ->select('products.*')
        ->where('products.userID','=',Auth::id())
        ->paginate(12);
        return view('user/bookStatus')->with('products',$products);
    }
}