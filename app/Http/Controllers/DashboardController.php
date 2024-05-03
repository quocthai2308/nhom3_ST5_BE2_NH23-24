<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bill;

class DashboardController extends Controller
{
    //
    public function getRevenueByDay(){
        $revenue = new Bill();  
        $revenueByDay = $revenue->getRevenueByDay();
        return response()-> json(['revenue' => $revenueByDay]);
    }
    public function getRevenueByMonth(){
        $revenue = new Bill();  
        $revenueByMonth = $revenue->getRevenueByMonth();
        return response()-> json(['revenue' => $revenueByMonth]);
    }
}
