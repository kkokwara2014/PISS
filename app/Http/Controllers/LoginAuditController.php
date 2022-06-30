<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Loginaudit;


class LoginAuditController extends Controller
{
    
    public function index(){

        $logins=Loginaudit::latest()->get();
        return view('admin.loginaudit.index',array('user'=>Auth::user()),compact('logins'));
    }
}
