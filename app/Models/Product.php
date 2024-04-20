<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
 /**
  * @param  $id
  */
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
   public function getProductDetails($id)
    {
        return self::find($id);
    }
   public function getProductByKeyword($keyword)
    {
           $products = Product::where('name', 'LIKE', "%{$keyword}%")->get(); 
           return $products;
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }
    public function getProductsByCategoryId($categoryId)
    {
        $products = Product::whereHas('categories', function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        })
        ->with('images')
        ->orderByDesc('id')
        ->get();   
    return $products;
}
    use HasFactory;
}
