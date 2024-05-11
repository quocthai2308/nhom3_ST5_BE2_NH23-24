<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function showTransactions() {
        $transactions = Transaction::with('user')->get(); // Lấy tất cả giao dịch và thông tin người dùng liên quan
        return view('admin.hangMoiDac', compact('transactions'));

    }
}
