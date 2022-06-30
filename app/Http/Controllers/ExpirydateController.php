<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExpirydateController extends Controller
{
    
    public static function currentdate(){
        return date('Y-m-d');
    }
    public static function expirydate(){
        return '2022-05-30';
    }
}
