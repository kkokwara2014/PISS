<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'code',
        'name',
        'slug',
        'unitprice',
        'sellingprice',
        'quantity',
        'expirydate',
        'reorderlevel',
        'isavailable',
        'brand_id',
        'branch_id',
        'category_id',
        'user_id',
        'supplier_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
    public function branch(){
        return $this->belongsTo(Branch::class);
    }
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function brand(){
        return $this->belongsTo(Brand::class);
    }
    public function orders(){
        return $this->belongsToMany(Order::class);
    }
}
