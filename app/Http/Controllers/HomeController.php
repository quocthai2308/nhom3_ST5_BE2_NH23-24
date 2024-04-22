<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\UserLikeProduct;
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
    public function shopping_cart(){
        
       return view('shopping-cart');
    }
    public function addLike(Request $request)
    {
        // Validate request...
        $userLikeProduct = new UserLikeProduct;
        $userLikeProduct->user_id = $request->session->get('user_id');
        $userLikeProduct->product_id = $request->product_id;
        $userLikeProduct->save();
    
        return response()->json(['success' => true]);
    }
    
}
