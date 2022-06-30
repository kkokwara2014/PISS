<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ReportController extends Controller
{
    public function daily(){
        $dailyreports=Order::with(['products'])->whereDate('created_at',Carbon::today())->latest()->get();
        return view('admin.reports.daily',array('user'=>Auth::user()),compact('dailyreports'));
    }
    public function weekly(){
        $weeklyreports=Order::with(['products'])->whereBetween('created_at',[Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->latest()->get();
        return view('admin.reports.weekly',array('user'=>Auth::user()),compact('weeklyreports'));
    }
    public function monthly(){
        $monthlyreports=Order::with(['products'])->whereBetween('created_at',[Carbon::now()->startOfMonth(),Carbon::now()->endOfMonth()])->latest()->get();
        return view('admin.reports.monthly',array('user'=>Auth::user()),compact('monthlyreports'));
    }
    public function yearly(){
        $yearlyreports=Order::with(['products'])->whereYear('created_at',Carbon::now()->year)->latest()->get();
        $specificyear=Order::with(['products'])->whereYear('created_at',Carbon::now()->year)->first();
        return view('admin.reports.yearly',array('user'=>Auth::user()),compact('yearlyreports','specificyear'));
    }
    public function specific(){
        $specificreports=Order::with(['products'])->latest()->limit(5)->get();
        return view('admin.reports.specific',array('user'=>Auth::user()), compact('specificreports'));
    }

    public function specificresult(Request $request){

       $numofvalue=$request->numofvalue;
       $criteria=$request->criteria;
      
       $info='No available record was found from your selected criteria ';
       
       if ($criteria=='day') {
            $specificreports=Order::with(['products'])->where('created_at','>=',Carbon::now()->subDays($numofvalue))->latest()->get();
            return view('admin.reports.specific',array('user'=>Auth::user()),compact('specificreports','info','numofvalue','criteria'));
        } elseif($criteria=='week') {
            $specificreports=Order::with(['products'])->where('created_at','>=',Carbon::now()->subWeeks($numofvalue))->latest()->get();
            return view('admin.reports.specific',array('user'=>Auth::user()),compact('specificreports','info','numofvalue','criteria'));
        }elseif($criteria=='month') {
            $specificreports=Order::with(['products'])->where('created_at','>=',Carbon::now()->subMonths($numofvalue))->latest()->get();
            return view('admin.reports.specific',array('user'=>Auth::user()),compact('specificreports','info','numofvalue','criteria'));
        }elseif($criteria=='year') {
            $specificreports=Order::with(['products'])->where('created_at','>=',Carbon::now()->subYears($numofvalue))->latest()->get();
            return view('admin.reports.specific',array('user'=>Auth::user()),compact('specificreports','info','numofvalue','criteria'));
        }
    }
    public function range(){
        $rangereports=Order::with(['products'])->latest()->limit(5)->get();
        $info='No available record was found from the range of dates selected!';
        
        return view('admin.reports.range',array('user'=>Auth::user()),compact('rangereports','info'));
    }

    public function fetchrecordinrange(Request $request){
        $starting=date('Y-m-d',strtotime($request->fromdate));
        $ending=date('Y-m-d',strtotime($request->todate));

        $info='No available record was found from the range of dates selected ';

        $rangereports=Order::with(['products'])->whereBetween('created_at',[$starting,$ending])->get();
        return view('admin.reports.range',array('user'=>Auth::user()),compact('rangereports','info','starting','ending'));
    }
}
