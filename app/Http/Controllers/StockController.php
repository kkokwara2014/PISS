<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks=Product::where('quantity','>',5)->latest()->get();
        return view('admin.stock.index',array('user'=>Auth::user()),compact('stocks'));
    }

    public function replenishable(){
        $replenishablestocks=Product::where('quantity','<=',5)->latest()->get();
        return view('admin.stock.replenishable',array('user'=>Auth::user()),compact('replenishablestocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches=Branch::orderBy('address','asc')->get();
        $brands=Brand::orderBy('name','asc')->get();
        $categories=Category::orderBy('name','asc')->get();
        $suppliers=Supplier::orderBy('name','asc')->get();
        return view('admin.stock.create',array('user'=>Auth::user()),compact(
            'branches',
            'brands',
            'categories',
            'suppliers',
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            // 'invoicenumber'=>'required|unique:products',
            'name'=>'required',
            'unitprice'=>'required',
            'quantity'=>'required',
            'branch_id'=>'required',
            'supplier_id'=>'required',
        ]);

        $stock=new Product();
        $stock->code=rand(23456789,98765432);
        $stock->branch_id=$request->branch_id;
        $stock->supplier_id=$request->supplier_id;
        $stock->category_id=$request->category_id;
        $stock->brand_id=$request->brand_id;
        $stock->name=$request->name;
        $stock->slug=Str::slug($request->name);
        $stock->unitprice=$request->unitprice;
        $stock->sellingprice=$request->sellingprice;
        $stock->quantity=$request->quantity;
        $stock->expirydate=$request->expirydate;
        $stock->user_id=auth()->user()->id;
        $stock->save();

        return redirect()->route('stocks.index')->with('success','New Stock added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $stock=Product::where('id',$id)->first();
        return view('admin.stock.show',array('user'=>Auth::user()),compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock=Product::where('id',$id)->first();
        $branches=Branch::orderBy('address','asc')->get();
        $suppliers=Supplier::orderBy('name','asc')->get();
        return view('admin.stock.edit',array('user'=>Auth::user()),compact('stock','branches','suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stock=Product::find($id);

        if ($stock->invoicenumber!=$request->invoicenumber) {
            $stock->invoicenumber=$request->invoicenumber;
            $stock->name=$request->name;
            $stock->slug=Str::slug($request->name);
            $stock->unitprice=$request->unitprice;
            $stock->quantity=$request->quantity;
            $stock->branch_id=$request->branch_id;
            $stock->supplier_id=$request->supplier_id;
            $stock->user_id=auth()->user()->id;
            $stock->save();
        } else {
            $stock->name=$request->name;
            $stock->slug=Str::slug($request->name);
            $stock->unitprice=$request->unitprice;
            $stock->quantity=$request->quantity;
            $stock->branch_id=$request->branch_id;
            $stock->supplier_id=$request->supplier_id;
            $stock->user_id=auth()->user()->id;
            $stock->save();
        }

        return redirect()->route('stocks.index')->with('success','Stock edited successfully!');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return redirect()->back()->with('deleted', $product->name. ' deleted successfully!');
    }

    public function replenishstock(Request $request, $id){
        $replenishstock=Product::find($id);
        $replenishstock->quantity=$request->quantity;
        $replenishstock->save();

        return redirect()->back()->with('success', $replenishstock->name. ' has been replenished with '. $replenishstock->quantity.' stock(s)');
    }

    public function editstockprice(Request $request, $id){
        $stockprice=Product::find($id);
        $stockprice->unitprice=$request->unitprice;
        $stockprice->sellingprice=$request->sellingprice;
        $stockprice->save();

        return redirect()->back()->with('success', $stockprice->name. ' has been updated successfully!');
    }
    public function editstockqty(Request $request, $id){
        $stockqty=Product::find($id);
        $stockqty->quantity=$request->quantity;
        $stockqty->save();

        return redirect()->back()->with('success', $stockqty->name. ' has been updated with '. $stockqty->quantity.' stock(s)');
    }
}
