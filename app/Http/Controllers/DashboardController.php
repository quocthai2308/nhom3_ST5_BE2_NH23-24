<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;
use App\Models\Product;

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
    public function getTotal(){
        $productBill = new Bill();
        $total = $productBill->getTotal();
        return response()->json(['total'=> $total]);
    }
}
