<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['bookName','approve','author','publisher','publishDate','description','price','image','dimensions','quantity','pages','categoryID','languageID'];
    public function category(){
        return $this->belongsTo('App\Models\Category');
    }
    public function language(){
        return $this->belongsTo('App\Models\Language');
    }
    public function review(){
        return $this->hasMany('App\Models\reviews');
    }
}