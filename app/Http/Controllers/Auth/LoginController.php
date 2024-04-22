<?php
namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
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
            $user = Auth::user();

            // Lưu user id vào session
              $request->session()->put('user_id', $user->id);


        // Kiểm tra giá trị của cột userType và điều hướng tương ứng
        if ($user->userType == 0) {
            return redirect()->intended('home');
        } elseif ($user->userType == 1) {
            return redirect()->intended('admin.product-manager');

            // return abort(404);
        }

        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
//21/4
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}