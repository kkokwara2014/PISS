<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'ordernumber',
        'customer_id',
        'user_id',
        'paymenttype',
        'unitprice',
        'sellingprice',
        'quantity',
        'totalamount'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function customer(){
        return $this->belongsTo(Customer::class);
    }
    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('unitprice','sellingprice', 'quantity', 'totalamount')
    	->withTimestamps();
    }
}
