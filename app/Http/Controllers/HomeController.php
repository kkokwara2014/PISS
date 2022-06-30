<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Company;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        //greeting module
        $greeting='';
        $timeofDay=date('H');
        if($timeofDay<'12'){
            $greeting='Good morning';
        }elseif($timeofDay>='12' && $timeofDay<'17'){
            $greeting='Good afternoon';
        }elseif($timeofDay>='17' && $timeofDay<'19'){
            $greeting='Good evening';
        }elseif($timeofDay>='19'){
            $greeting='Good night';
        }

        //count branches
        $countbranches=Branch::count();
        //count sales staff
        
        $countsalesstaff=User::with(['roles'])->whereHas('roles', function($query) {
            $query->where('name', '=', 'Sales Person');
        })->count();

        //count total amount sold
        $totalamountsold=Order::sum('totalamount');
        
        //total unit prices and qty of available stock
        $totalunitpricesofstock=Product::sum('unitprice');
        //count total quantity of available stocks
        $totalstocks=Product::sum('quantity');
                
        //total amount of available stock
        $totalamountofstocks=$totalunitpricesofstock*$totalstocks;

        //sales quantity
        $totalqtysold=Order::sum('quantity');

        //replenishable stocks
        $allreplenishableproducts=Product::where('quantity','<=',5)->limit(5)->get();
        $replenishableproducts=Product::where('quantity','<=',5)->count();
        //most selling product
        $mostsellingproducts=Order::with(['products'])->max('quantity');

        //stocks in branches
        $stocksinbranches=Branch::with(['products'])->get();

        //staff list and roles
        $staffs=User::orderBy('created_at','asc')->get();

        //todays sales
        $todaysales=Order::whereDate('created_at',Carbon::today())->sum('totalamount');
        
             
        $transactions=Order::with(['products'])->latest()->get();

       $medicineexpirydate=date('Y-m-d');
    //    $medicineexpirydate=date('2023-09-12');
       $expiredmedicines=Product::with(['branch'])->where('expirydate','<',$medicineexpirydate)->get();

       $company=Company::latest()->first();

        return view('admin.index',array('user'=>Auth::user()),compact(
            'greeting',
            'allreplenishableproducts',
            'replenishableproducts',
            'countbranches',
            'countsalesstaff',
            'totalamountsold',
            'totalstocks',
            'stocksinbranches',
            'staffs',
            'totalqtysold',
            'totalamountofstocks',
            'countsalesstaff',
            'todaysales',
            'transactions',
            'expiredmedicines',
            'medicineexpirydate',
            'company',
        ));
    }
}
