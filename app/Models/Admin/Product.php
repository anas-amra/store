<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =['name','price','quantity','description','category_id','user_id'];
    // Each product belongs to one category

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
