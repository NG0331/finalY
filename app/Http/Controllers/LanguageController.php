<?php

namespace App\Http\Controllers;
use App\Models\Language;
use Illuminate\Http\Request;
use DB;

class LanguageController extends Controller    
{
    public function insert()
    {
        return view('admin/insertLanguage');
    }

    public function store(){
        $r=request();
        $addLanguage=Language::create([     
            'ID'=>$r->ID,
            'name'=>$r->name,
        ]);
        return redirect()->route('show.Language');
    }

    public function show(){ 
        $languages=Language::all();//instead SQL select * from categories  
        return view('admin/showLanguage')->with('languages',$languages);
    }
    
    public function delete($id){
         $languages=Language::find($id);
         $languages->delete();//apply delete from categories where id='$id'
         return redirect()->route('show.Language');
    }
}
    

