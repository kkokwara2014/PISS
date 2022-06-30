<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Image;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pharmacy=Company::latest()->get();
        return view('admin.company.index',array('user'=>Auth::user()),compact('pharmacy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create',array('user'=>Auth::user()));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $pharm=Company::where('slug',$slug)->first();
        return view('admin.company.edit',array('user'=>Auth::user()),compact('pharm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request, [
        //     'logo' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        // ]);

        $products=Product::get();

        DB::transaction(function () use($request, $products, $id) {
            
            $pharmacy = Company::find($id);

            if ($request->hasFile('logo')) {
                $logo = $request->file('logo');
                $filename = time() . '.' . $logo->getClientOriginalExtension();
                Image::make($logo)->resize(600, 600)->save(public_path('pharmacy_logo/' . $filename));
    
                $pharmacy->name = $request->name;
                $pharmacy->email = $request->email;
                $pharmacy->phone = $request->phone;
                $pharmacy->address = $request->address;
                $pharmacy->vat = $request->vat;
                $pharmacy->logo = $filename;
                $pharmacy->save();
    
                foreach($products as $product){
                    $vatcomputation=($pharmacy->vat/100)*$product->unitprice;
                    $sellingprice=$product->unitprice + $vatcomputation;
                    //updating all the selling prices on each product
                    $product->sellingprice=ceil($sellingprice);
                    $product->save();

                    // Product::query()->update(['sellingprice'=>$sellingprice]);
                }
            }else{
                $pharmacy->name = $request->name;
                $pharmacy->email = $request->email;
                $pharmacy->phone = $request->phone;
                $pharmacy->address = $request->address;
                $pharmacy->vat = $request->vat;
                $pharmacy->save();
    
                foreach($products as $product){
                    $vatcomputation=($pharmacy->vat/100)*$product->unitprice;
                    $sellingprice=$product->unitprice + $vatcomputation;
                    //updating all the selling prices on each product
                    $product->sellingprice=ceil($sellingprice);
                    $product->save();
                    // Product::query()->update(['sellingprice'=>$sellingprice]);
                }
            }
                
        });

        return redirect()->route('pharmacy.index')->with('success','Pharmacy logo uploaded successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }
}
