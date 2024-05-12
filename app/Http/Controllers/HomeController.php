<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Review;
use App\Models\Voucher;
use App\Models\Bill;

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
        $bestSeller = $productModel->getBestSeller();
        return view('home', compact('products', 'specialProducts', 'newProducts', 'categories', 'allCategories', 'bestSeller'));
    }


    public function detail($id)
    {
        $productModel = new Product();
        $reviewModel = new Review();
        $product = $productModel->getProductDetails($id);
        $reviews = $reviewModel->getReviewByProduct($id);
        return view('detail', compact('product', 'reviews'));
    }
    public function search(Request $request)
    {
        $searchTerm = $request->input('name');
        $productModel = new Product();
        $products = $productModel->getProductByKeyword($searchTerm);
        return view('search', compact('products', 'searchTerm'));
    }
    public function category($categoryId, Request $request)
    {
        $sortType = $request->input('sort');
        $category = Category::find($categoryId); // Lấy category dựa trên categoryId

        switch ($sortType) {
            case 'price_asc':
                $products = Product::whereHas('categories', function ($query) use ($categoryId) {
                    $query->where('category_id', $categoryId);
                })->orderBy('price', 'asc')->get();
                break;
            case 'price_desc':
                $products = Product::whereHas('categories', function ($query) use ($categoryId) {
                    $query->where('category_id', $categoryId);
                })->orderBy('price', 'desc')->get();
                break;
            case 'name_asc':
                $products = Product::whereHas('categories', function ($query) use ($categoryId) {
                    $query->where('category_id', $categoryId);
                })->orderBy('name', 'asc')->get();
                break;
            default:
                $products = Product::whereHas('categories', function ($query) use ($categoryId) {
                    $query->where('category_id', $categoryId);
                })->get();
                break;
        }

        return view('category', compact('products', 'category')); // Truyền $category vào view
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
        $user = $reviewModel->getUserName(session('user_name'), $productId);
        if ($user) {
            return response()->json(['auth' => false]);
        } else {
            if (session('user_id') != null) {
                $reviewModel->store($rating, $content, $productId);
            } else {
                return view('auth.login');
            }
            return response()->json(['success' => true]);
        }
    }
    public function getAverageRating(Request $request)
    {
        $reviewModel = new Review();
        $id = $request->input('product_id');
        $rating = $reviewModel->getAverageRating($id);
        return response()->json(['rating' => $rating]);
    }
    public function countRV(Request $request)
    {
        $reviewModel = new Review();
        $id = $request->input('product_id');
        $count = $reviewModel->countRV($id);
        return response()->json(['count' => $count]);
    }
    public function getReviewByProduct(Request $request)
    {
        $reviewModel = new Review();
        $id = $request->input('product_id');
        $userName = session('user_name');
        $reviews = $reviewModel->getReview($id, $userName);
        return response()->json(['reviews' => $reviews]);
    }
    public function vouchers()
    {
        $voucherM = new Voucher();
        $id = session('user_id');
        if (isset($id)) {
            $vouchers = $voucherM->getVoucherByUserId($id);
            return view('vouchers', compact('vouchers'));
        } else {
            return view('auth.login');
        }

    }
    public function getVoucher()
    {
        $voucherM = new Voucher();
        $id = session('user_id');
        if (isset($id)) {
            $vouchers = $voucherM->getVoucherByUserId($id);
            return response()->json(['vouchers' => $vouchers]);
        } else {
            return view('auth.login');
        }

    }
    public function getProductByOrders()
    {
        $productModel = new Product();
        $id = session('user_id');
        if (isset($id)) {
            $products = $productModel->getProductByOrders($id);
            return view('track-orders', compact('products'));
        } else {
            return view('auth.login');
        }

    }
    public function setStateOrder(Request $request)
    {
        $billModel = new Bill();
        $id = $request->input('bill_id');
        $billModel->updateBill($id);

        return response()->json(['result' => true]);

    }
}
