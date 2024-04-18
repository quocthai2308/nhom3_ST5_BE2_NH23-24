<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    public function index() {
        $productModel = new Product();
        $products= $productModel->getTenPreProducts();
        $specialProducts = $productModel->getSpecialOfferProducts();
        $newProducts = $productModel->getNewProducts();
       return view('home',compact('products','specialProducts','newProducts'));
    }
    public function detail($id){
        $productModel = new Product();
        $product = $productModel->getProductDetails($id);
     return view('detail', compact('product'));
    }
}
