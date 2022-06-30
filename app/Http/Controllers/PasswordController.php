<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class PasswordController extends Controller
{
    public function store(Request $request){
        $userpassword=User::find(auth()->user()->id);
        $userpassword->password=bcrypt($request->password);
        $userpassword->save();

        return redirect()->back()->with('success','Password changed successfully!');
    }
}
