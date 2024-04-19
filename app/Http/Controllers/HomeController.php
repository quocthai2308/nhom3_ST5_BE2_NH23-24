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
       return view('home',compact('products','specialProducts','newProducts','categories'));
    }
    public function detail($id){
        $productModel = new Product();
        $product = $productModel->getProductDetails($id);
       return view('detail', compact('product'));
    }
}
