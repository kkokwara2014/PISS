<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, 
WithHeadingRow, 
SkipsOnError, 
WithChunkReading
{
    private $users;
    function __construct() {
        $this->users=User::select('id','email')->get();
	}
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $user=$this->users->where('email',$row['email'])->first();
        return new Product([
            'code'=>rand(23456789,98765432),
            'name'=>$row['name'],
            'slug'=>Str::slug($row['name']),
            'unitprice'=>$row['unitprice'],
            'sellingprice'=>$row['sellingprice'],
            'quantity'=>$row['quantity'],
            'expirydate'=>date('Y-m-d',strtotime($row['expirydate'])),
            'reorderlevel'=>10,
            'isavailable'=>1,
            'category_id'=>$row['category_id'],
            'brand_id'=>$row['brand_id'],
            'branch_id'=>$row['branch_id'],
            'user_id'=>$user->id??NULL,
            'supplier_id'=>$row['supplier_id'],
        ]);

        // 'created_at'=>date('Y-m-d H:i:s'),
        //     'updated_at'=>date('Y-m-d H:i:s'),
    }
	/**
	 */

	/**
	 *
	 * @param \Throwable $e
	 *
	 * @return mixed
	 */
	function onError(\Throwable $e) {
	}
	
	/**
	 *
	 * @return int
	 */
	function chunkSize(): int {
        return 500;
	}
}
