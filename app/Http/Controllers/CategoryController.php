<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    
    public function insert()
    {
        return view('admin/insertCategory');
    }
    
    public function store(){
        $r=request();
        $addCategory=Category::create([     
            'ID'=>$r->ID,
            'name'=>$r->name,
        ]);
        return redirect()->route('show.Category');
    }
    public function show(){ 
        $categories=Category::all();//instead SQL select * from categories  
        return view('admin/showCategory')->with('categories',$categories);
    }
    public function delete($id){
         $categories=Category::find($id);
         Product::where('categoryID',$id)->delete();
         $categories->delete();//apply delete from categories where id='$id'
         return redirect()->route('show.Category');
    }
}
