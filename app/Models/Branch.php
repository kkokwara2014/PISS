<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable=[
        'address',
        'town',
        'state',
        'company_id',
    ];

    public function company(){
        return $this->belongsTo(Company::class);
    }

    public function users(){
        return $this->hasMany(User::class);
    }
    public function products(){
        return $this->hasMany(Product::class);
    }

    

}
