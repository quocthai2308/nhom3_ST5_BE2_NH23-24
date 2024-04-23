<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class CartController extends Controller
{

    public function addToCart(Request $request, $id) {
        $product = Product::find($id); // Tìm sản phẩm dựa trên ID
    
        // Kiểm tra xem cookie có tồn tại không
        if (Cookie::get('cart')) {
            $cart = json_decode(Cookie::get('cart'), true);
        } else {
            $cart = [];
        }
    
        if (Auth::check()) {

             // Thêm sản phẩm vào giỏ hàng
             if (isset($cart[$id])) {
                $cart[$id]['quantity'] += 1;
            } else {
                $cart[$id] = [
                    'id' => $product->id, // Thêm ID sản phẩm vào mảng
                    'name' => $product->name,
                    'description' => $product->description,
                    'price' => $product->price,
                    'quantity' => 1
                ];
            }


            foreach ($cart as $productId => $product) {
                // Tạo một mục giỏ hàng mới
                $cartItem = new CartItem;
                $cartItem->user_id = $request->user()->id; // ID người dùng hiện tại
                $cartItem->product_id = $productId;
                $cartItem->name = $product['name'];
                $cartItem->description = $product['description'];
                $cartItem->price = $product['price'];
                $cartItem->quantity = $product['quantity'];
                $cartItem->save();
            }
        }
        else {
            // Thêm sản phẩm vào giỏ hàng
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] += 1;
            } else {
                $cart[$id] = [
                    'id' => $product->id, // Thêm ID sản phẩm vào mảng
                    'name' => $product->name,
                    'description' => $product->description,
                    'price' => $product->price,
                    'quantity' => 1
                ];
            }

        }
    
        // Lưu giỏ hàng vào cookie
        $cookie = Cookie::make('cart', json_encode($cart), 60);
    
        // Trả về phản hồi thành công với cookie
        return response('Product added to cart.')->withCookie($cookie);
    }
    

    public function showCart(Request $request) {
        if (Auth::check()) {
            $cart = CartItem::where('user_id', $request->user()->id)->get()->toArray();
    
            // Chuyển đổi dữ liệu từ cơ sở dữ liệu thành định dạng giống như cookie
            $cart = array_map(function($item) {
                return [
                    'id' => $item['product_id'],
                    'name' => $item['name'],
                    'description' => $item['description'],
                    'price' => $item['price'],
                    'quantity' => $item['quantity']
                ];
            }, $cart);
        } else {
            // Nếu người dùng chưa đăng nhập, lấy dữ liệu từ cookie
            if (Cookie::get('cart')) {
                $cart = json_decode(Cookie::get('cart'), true);
            } else {
                $cart = [];
            }
        }
    
        // Hiển thị trang giỏ hàng với dữ liệu từ cookie hoặc cơ sở dữ liệu
        return view('shopping-cart', ['cart' => $cart]);
    }


    public function removeFromCart(Request $request, $id) {
        if (Auth::check()) {
            // Người dùng đã đăng nhập, xóa sản phẩm khỏi cơ sở dữ liệu
            $user = Auth::user();
            $cartItem = CartItem::where('user_id', $user->id)->where('product_id', $id)->first();

            Log::info('User ID: ' . $user->id);

            if ($cartItem) {
                $cartItem->delete();
                return response('Product removed from cart.');
            } else {
                return response('Product not found in cart.');
            }
        } else {
            // Người dùng chưa đăng nhập, xóa sản phẩm khỏi cookie
            if (Cookie::get('cart')) {
                $cart = json_decode(Cookie::get('cart'), true);
                if (isset($cart[$id])) {
                    unset($cart[$id]);
                    $cookie = Cookie::make('cart', json_encode($cart), 60);
                    return response('Product removed from cart.')->withCookie($cookie);
                } else {
                    return response('Product not found in cart.');
                }
            } else {
                return response('No products in cart.');
            }
        }
    }
    
    
    
    
}
