<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    public function index() {
        $productModel = new Product();
        $products= $productModel->getTenPreProducts();
        return view('home',['products'=>$products]);
    }
}
