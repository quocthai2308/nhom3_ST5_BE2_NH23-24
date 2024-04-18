<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function images()
    {
        return $this->hasMany(Image::class);
    }
   public function getTenPreProducts(){
    $products = Product::with('images')->take(10)->get();
    return $products;
   }
   public function getSpecialOfferProducts(){
    $products = Product::with('images')->offset(10)->limit(30)->get();
    return $products;
   }
   public function getNewProducts(){
    $products = Product::with('images')->orderByDesc('id')->limit(10)->get()->reverse();
    return $products;
   }
    use HasFactory;
}
