<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Imports\ProductImport;
use App\Models\Company;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ExportImportController extends Controller
{
    /**
     * Class constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function importfilepage(){
        return view('admin.products.importfilepage',array('user'=>Auth::user()));
    }

    public function downloadsample($filename){
        $file = public_path('sample/'.$filename);
        $name = basename($file);
        return response()->download($file, $name);
    }

    public function import(Request $request){
        $this->validate($request,[
            'filename'=>'required|mimes:xlsx,xls,csv'
        ]);

        Excel::import(new ProductImport, $request->file('filename'));
        return redirect()->route('stocks.index')->with('success','Records imported successfully!');
    }

    public function export(){
        $company=Company::latest()->first();
        $products=Product::all();
        return Excel::download(new ProductExport($products),$company->slug.'_stocks.xlsx');
    }

}
