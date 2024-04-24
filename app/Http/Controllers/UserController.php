<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller

{
     public $users; // Khai báo thuộc tính
    //
    public function __construct()
    {
        // Đảm bảo chỉ những người dùng đã đăng nhập mới có thể truy cập các phương thức trong controller này
        $this->middleware('auth');
    }
    public function update(Request $request)
    {
        $user = Auth::user();

        // Xác thực thông tin
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'current_password' => 'required',
            'new_password' => 'required|string|min:8',
        ]);

        // Kiểm tra mật khẩu hiện tại
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không đúng.']);
        }

        // Cập nhật thông tin
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->new_password) {
            $user->password = Hash::make($request->new_password);
        }
        $user->save();

        return back()->with('success', 'Thông tin tài khoản đã được cập nhật.');
    }
}
