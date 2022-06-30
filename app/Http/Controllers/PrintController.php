<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrintController extends Controller
{
    
    public function allstocks(){
        $company=Company::latest()->first();
        $stocks=Product::where('quantity','>',0)->get();
        return view('admin.print.stock',array('user'=>Auth::user()),compact('stocks','company'));
    }
    public function transactions(){
        $company=Company::latest()->first();
        $transactions=Order::with(['products'])->latest()->get();
        return view('admin.print.transaction',array('user'=>Auth::user()),compact('transactions','company'));
    }

    public function getreceipt(){

        // $products=Product::all();
       //  $products=Product::orderBy('name','asc')->get();
       //  $orderdetails=Orderdetail::where('customer_id',$customer->id)->get();
       //  $orderby=Customer::where('id',$customer->id)->get();
       return view('admin.reports.receipt',array('user'=>Auth::user()),compact('transactions'));
   }
}
