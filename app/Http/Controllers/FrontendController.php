<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ExpirydateController;

class FrontendController extends Controller
{
    public function index(){
        // return view('welcome');
        $curentdate=ExpirydateController::currentdate();
        $expirydate=ExpirydateController::expirydate();
        return view('auth.login',compact('curentdate','expirydate'));
        // return view('auth.login');
    }
}
