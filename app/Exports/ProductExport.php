<?php

namespace App\Exports;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ProductExport implements FromView
{
    /**
     * Class constructor.
     */
    public function __construct($products)
    {
        $this->products = $products;
    }
    public function view(): View
    {
        return view('admin.products.export',[
            'products'=>$this->products
        ]);
    }


}
