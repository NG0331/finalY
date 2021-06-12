<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function store(){
        $r=request();
        $addCategory=Category::create([     
            'ID'=>$r->ID,
            'name'=>$r->name,
        ]);
        return redirect()->route('showCategory');
    }
    public function show(){ 
        $categories=Category::all();//instead SQL select * from categories  
        return view('showCategory')->with('categories',$categories);
    }
    public function delete($id){
         $categories=Category::find($id);
         $categories->delete();//apply delete from categories where id='$id'
         return redirect()->route('showCategory');
    }
}
