<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class HomeController extends Controller
{
    public function index() {
        $productModel = new Product();
        $categoryModel = new Category();
        $products= $productModel->getTenPreProducts();
        $specialProducts = $productModel->getSpecialOfferProducts();
        $newProducts = $productModel->getNewProducts();
        $categories = $categoryModel->getParentCategories();
        $allCategories = $categoryModel->getAllCategories();
       return view('home',compact('products','specialProducts','newProducts','categories','allCategories'));
    }
    public function detail($id){
        $productModel = new Product();
        $product = $productModel->getProductDetails($id);
       return view('detail', compact('product'));
    }
    public function search(Request $request){
        $searchTerm = $request->input('name');
        $productModel = new Product();
        $products = $productModel->getProductByKeyword($searchTerm);
       return view('search', compact('products','searchTerm'));
    }
    public function category($categoryId){
        $productModel = new Product();
        $products = $productModel->getProductsByCategoryId($categoryId);
       return view('category', compact('products'));
    }
  
}
