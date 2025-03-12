<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =['name','price','quantity','description','category_id'];
    // Each product belongs to one category

    public function category(){
        return $this->belongsTo(Category::class);
    }

    // public function category(){
    //     return $this->belongsTo(Category::class);
    // }



}
