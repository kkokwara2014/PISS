<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    
    public function index(){
        $transactions=Order::with(['products'])->latest()->get();
        return view('admin.transactions.index',array('user'=>Auth::user()),compact('transactions'));
    }
}
