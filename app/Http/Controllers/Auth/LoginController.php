<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use App\Models\CartItem;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        //22/4
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();


            if (Cookie::get('cart')) {
                Cookie::queue(Cookie::forget('cart'));
                $cart = json_decode(Cookie::get('cart'), true);

                // Lưu từng sản phẩm trong giỏ hàng vào cơ sở dữ liệu
                foreach ($cart as $productId => $product) {
                    // Tạo một mục giỏ hàng mới
                    $cartItem = new CartItem;
                    $cartItem->user_id = $request->user()->id; // ID người dùng hiện tại
                    $cartItem->product_id = $productId;
                    $cartItem->name = $product['name'];
                    $cartItem->price = $product['price'];
                    $cartItem->quantity = $product['quantity'];
                    $cartItem->save();
                }

                // Xóa cookie
            }


            session()->flash('success', 'Bạn đã đăng nhập thành công');

            $user = Auth::user();

            if ($user->userType == 0) {
                return redirect()->intended('home');
            } elseif ($user->userType == 1) {
                return redirect()->intended('hehe');
                // return abort(404);
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }




    public function logout(Request $request)
    {
        Auth::logout();

        
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        Cookie::queue(Cookie::forget('cart'));
        
        return redirect('/');
    }
}
