<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $company=Company::latest()->first();
        $user=User::with(['branch'])->where('id',auth()->user()->id)->first();
        $products=Product::where('quantity','>','0')->orderBy('name','asc')->get();
        $orders=Customer::all();
        //last order details
        $lastID=Order::max('customer_id');
        $customer_detail=Order::with(['products'])->where('customer_id',$lastID)->first();
        $orderreceipts=Order::with(['products'])->where('customer_id',$lastID)->get();
        
        $info='No Products have been added to the Branch you are working in!';
            
            if ($user->branch->products->count()>0) {
                return view('admin.orders.create',array('user'=>Auth::user()),compact('products','orderreceipts','orders','customer_detail','company'));
            } else {
                return view('admin.orders.noproducttosell',array('user'=>Auth::user()),compact('info'));
            }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        DB::transaction(function () use($request) {
            //saving customer details
                if ($request->name=='' && $request->phone=='') {
                    $customer=Customer::create([
                        'name'=>'default_customer',
                        'phone'=>rand(12345678901,98765432102),
                    ]);
                } else {
                    $customer=Customer::create([
                        'name'=>$request->name,
                        'phone'=>$request->phone,
                    ]);
                }
                    
                    //saving orderdetails
                   if (count($request->product_id)>0) {
                       foreach ($request->product_id as $key => $product_id) {
                           
                        $product_taken=Product::where('id',$request->product_id[$key])->first();

                        if ($request->quantity[$key]>$product_taken->quantity) {
                            return redirect()->back()->with('highqtyrequested',$product_taken->name.' quantity you entered should be less than '.$product_taken->quantity.'. You can not sell this quantity.');
                        }else{
                            //updating the product
                            $product_balance=$product_taken->quantity - $request->quantity[$key];
                            $prod_update=Product::find($request->product_id[$key]);
                            $prod_update->quantity=$product_balance;
                            $prod_update->save();
                            
                            $data=array(
                               'ordernumber'=>rand(123456,789012),
                               'customer_id'=>$customer->id,
                               'user_id'=>auth()->user()->id,
                               'paymenttype'=>$request->paymenttype,
                               'unitprice'=>$request->unitprice[$key],
                               'sellingprice'=>$request->unitprice[$key],
                               'quantity'=>$request->quantity[$key],
                               'totalamount'=>$request->totalamount[$key],
                           );
            
                           //creating order
                           $order=Order::create($data);

                           //adding details of order and product to the pivot table
                            $order->products()->attach($prod_update->id,[
                                'unitprice'=>$request->unitprice[$key],
                                'sellingprice'=>$request->unitprice[$key],
                                'quantity'=>$request->quantity[$key],
                                'totalamount'=>$request->totalamount[$key]
                            ]);                               

                        }

                           if ($prod_update->quantity<=$prod_update->reorderlevel) {
                            return redirect()->back()->with('lowprodalert', $prod_update->name. ' needs to be replenished! Stock is '.$prod_update->quantity);
                            }
                       }
                   }
                   

                   //last order history
                    // $products=Product::all();
                    $products=Product::orderBy('name','asc')->get();
                    $orderdetails=Order::where('customer_id',$customer->id)->get();
                
                    $orderby=Customer::where('id',$customer->id)->get();
           
                // return view('admin.orders.create',array('user'=>Auth::user()),compact('products','orderdetails','orderby'))->with('order_success','Sales made successfully!');
                return view('admin.orders.create',array('user'=>Auth::user()),compact('products','orderdetails','orderby'))->with('success','Sales made successfully!');
                
            });
            
            return redirect()->back()->with('success','Sales made successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
