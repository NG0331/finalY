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
class ProductController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
        
    }

    public function adminInsert(){
        return view('admin/insertProduct') 
        ->with('languages',Language::all())
        ->with('categories',Category::all());;
    }

    public function adminStore() {
        $r=request();
        $image=$r->file('product-image');
        $image->move('images',$image->getClientOriginalName());
        $imageName=$image->getClientOriginalName();
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
            'approve'=>1, //pending = 0, 1 approve ,2 reject
            'bookStatus'=>$r->bookStatus,
            'image'=>$imageName,           
            
        ]);
        Session::flash('success',"add product succesful!"); 
        return redirect()->route('show.Product');
    }
    public function show() {

        $categories=Category::all();
        if (request()->category) {
            $products=DB::table('products')
            ->select('products.*')
            ->where('products.approve','=','1')
            ->where('products.bookStatus','=','newBook')
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
            ->where('products.bookStatus','=','newBook')
            ->paginate(9); 
            $categoryNames=null;
  
        }
        
        return view('products/products')->with([
            'products'=>$products,
            'categories'=>$categories,
            'categoryName'=>$categoryNames,
        ]);

        }

        public function showSecondHand() {

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
            
            return view('products/products')->with([
                'products'=>$products,
                'categories'=>$categories,
                'categoryName'=>$categoryNames,
            ]);
    
            }
        public function showProduct() {
            $products=DB::table('products')
            ->select('products.*')
            ->where('products.approve','=','1')
            ->paginate(12);
            return view('admin/showProduct')->with('products',$products);
        }
    
        

    public function edit($id) {
        $products=Product::all()->where('id',$id);
        return view('admin/editProduct')->with('products',$products)
                                ->with('languages',Language::all())
                                ->with('categories',Category::all());;
    }

    public function delete($id) {
        $products=Product::find($id);
        $products->delete();
        return redirect()->route('show.Product');
    }

    public function update() {
        $r=request();
        $products=Product::find($r->ID);
        if($r->file('product-image')!='') {
            $image=$r->file('product-image');
            $image->move('images',$image->getClientOriginalName());
            $imageName=$image->getClientOriginalName();
            $products->image=$imageName;
        }
        $products->bookName=$r->bookName;
        $products->author=$r->author;
        $products->publisher=$r->publisher;
        $products->publishDate=$r->publishDate;
        $products->description=$r->description;
        $products->dimensions=$r->dimensions;
        $products->languageID=$r->language;
        $products->categoryID=$r->category;
        $products->price=$r->price;
        $products->quantity=$r->quantity;
        $products->pages=$r->pages;
        $products->bookStatus=$r->pages;
        $products->save();
        return redirect()->route('show.Product');
    }

    public function search() {

        $categories=Category::all();
        $categoryNames=null;
        $r=request();
        $keyword=$r->searchProduct;
        $products=DB::table('products')
        ->leftjoin('categories','categories.id','=','products.categoryID')
        ->select('categories.name as catname','categories.id as catid','products.*')
        ->where('products.bookName','like','%'.$keyword.'%')
        ->orWhere('products.description','like','%'.$keyword.'%')
        ->paginate(6);
        
        return view('/products/searchResult')->with('products',$products);
    }
    
    public function showProducts() {
        $products=DB::table('products')
        ->select('products.*')
        ->where('products.approve','=','1')
        ->paginate(9); 
       
        return view('products/products')->with('products',$products);
    }

    public function showProductDetail($id) {
        $r=request();
        $products=Product::all()->where('id',$id);
        $review=reviews::where('productID',$id)->get();

        return view('products/productDetail')->with('products',$products)
                                    ->with('review',$review)
                                    ->with('productID',$id)
                                    ->with('categories',Category::all());
    }      
    public function adminShowProductDetail($id) {
        $r=request();
        $products=Product::all()->where('id',$id);
        $review=reviews::where('productID',$id)->get();

        return view('admin/bookDetail')->with('products',$products)
                                    ->with('review',$review)
                                    ->with('productID',$id)
                                    ->with('categories',Category::all());
    }      
   
}