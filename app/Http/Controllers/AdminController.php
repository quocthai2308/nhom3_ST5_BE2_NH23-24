<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Đảm bảo đã import model User
class AdminController extends Controller
{
    //
    public function index()
    {
        $users = User::all(); // Lấy tất cả người dùng
        return view('admin', ['users' => $users]); // Trả về view với dữ liệu người dùng
    }
}
