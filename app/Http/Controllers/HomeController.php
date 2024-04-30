<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;

class HomeController extends Controller
{
    public function index()
    {
        $productModel = new Product();
        $categoryModel = new Category();
        $products = $productModel->getTenPreProducts();
        $specialProducts = $productModel->getSpecialOfferProducts();
        $newProducts = $productModel->getNewProducts();
        $categories = $categoryModel->getParentCategories();
        $allCategories = $categoryModel->getAllCategories();
        return view('home', compact('products', 'specialProducts', 'newProducts', 'categories', 'allCategories'));
    }


    public function detail($id)
    {
        $productModel = new Product();
        $reviewModel = new Review();
        $product = $productModel->getProductDetails($id);
        $reviews = $reviewModel-> getReviewByProduct($id);
        return view('detail', compact('product','reviews'));
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('name');
        $productModel = new Product();
        $products = $productModel->getProductByKeyword($searchTerm);
        return view('search', compact('products', 'searchTerm'));
    }
    public function category($categoryId)
    {
        $productModel = new Product();
        $products = $productModel->getProductsByCategoryId($categoryId);

        return view('category', compact('products'));
    }
    public function shopping_cart()
    {

        return view('shopping-cart');
    }

    public function addLike(Request $request)
    {
        // Validate request...
        $userLikeProduct = new Product;
        if (session('user_id') != null) {
            $product_id = $request->product_id;
            $user_id = session('user_id');
            $userLikeProduct->addProductToUserLikes($user_id, $product_id);
        } else {
            return view('auth.login');
        }
        return response()->json(['success' => true]);
    }
    public function review(Request $request)
    {
        $reviewModel = new Review();
        $productId = $request->product_id;
        $rating = $request->rating;
        $content = $request->content;
        $user = $reviewModel->getUserName(session('user_name'),$productId);
        if ($user) {
            return response()->json(['auth' => false]);
        }
         else
          {
            if (session('user_id') != null) {
                $reviewModel->store($rating, $content, $productId);
            } else {
                return view('auth.login');
            }
            return response()->json(['success' => true]);
        }
    }
    public function getAverageRating(Request $request){
        $reviewModel = new Review();
        $id = $request->input('product_id');
        $rating = $reviewModel-> getAverageRating($id);
        return response()->json(['rating' => $rating]);
    }
    public function countRV(Request $request){
        $reviewModel = new Review();
        $id = $request->input('product_id');
        $count = $reviewModel-> countRV($id);
        return response()->json(['count' => $count]);
    }
    public function getReviewByProduct(Request $request){
        $reviewModel = new Review();
        $id = $request->input('product_id');
        $userName = session('user_name');
        $reviews = $reviewModel-> getReview($id,$userName);
        return response()->json(['reviews' => $reviews]);
    }
}
