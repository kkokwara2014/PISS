<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SummaryController extends Controller
{
    public function purchasesummary(){
        //total unit prices and qty of available stock
        $totalunitpricesofstock=Product::sum('unitprice');
        //count total quantity of available stocks
        $totalstocks=Product::sum('quantity');
                
        //total amount of available stock
        $totalamountofstocks=$totalunitpricesofstock*$totalstocks;

        $stocks=Product::where('quantity','>',5)->latest()->get();
        return view('admin.summary.stocks',array('user'=>Auth::user()),compact('stocks','totalstocks','totalunitpricesofstock','totalamountofstocks'));
        
    }
    public function salesummary(){
        //count total amount sold
        $totalamountsold=Order::sum('totalamount');
        //sales quantity
        $totalqtysold=Order::sum('quantity');

        $transactions=Order::with(['products'])->latest()->get();
        
        return view('admin.summary.sales',array('user'=>Auth::user()),compact('transactions','totalamountsold','totalqtysold'));
    }
}
