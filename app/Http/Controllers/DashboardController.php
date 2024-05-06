<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Product;
use App\Models\Voucher;
use App\Models\UserVoucher;
use App\Models\User;

class DashboardController extends Controller
{
    //
    public function getRevenueByDay()
    {
        $revenue = new Bill();
        $revenueByDay = $revenue->getRevenueByDay();
        return response()->json(['revenue' => $revenueByDay]);
    }
    public function getRevenueByMonth()
    {
        $revenue = new Bill();
        $revenueByMonth = $revenue->getRevenueByMonth();
        return response()->json(['revenue' => $revenueByMonth]);
    }
    public function getMostPopularProduct()
    {
        $productBill = new Product();
        $mostPopularProduct = $productBill->getLimitedProductCount();
        return response()->json(['mostPopularProduct' => $mostPopularProduct]);
    }
    public function getTotal()
    {
        $productBill = new Bill();
        $total = $productBill->getTotal();
        return response()->json(['total' => $total]);
    }
    public function manageVoucher()
    {
        $voucherModel = new Voucher();
        $vouchers = $voucherModel->getAllVoucher();
        return view('admin.manage-voucher', compact('vouchers'));
    }
    public function addVoucher(Request $request)
    {
        $voucherModel = new  Voucher();
        $userVocherModel = new UserVoucher();
        $userModel = new User();
        $users = $userModel->getAllUsers();
        $title = $request->input('title');
        $discount = $request->input('discount');
        $due_date = $request->input('duedate');
        $quantity = $request->input('quantity');
        $application = $request->input('application');
         if ($application == 1) {
            $voucherId =  $voucherModel->addVoucher($title, $discount, $due_date, $quantity);
            foreach ($users as $user) {
                $userVocherModel->addUserVoucher($user->id, $voucherId);
            }
         }
        return redirect()->route('admin.voucher');
    }
}
