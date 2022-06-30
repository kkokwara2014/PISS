<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staffs=User::latest()->get();
        return view('admin.staff.index',array('user'=>Auth::user()),compact('staffs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches=Branch::orderBy('address','asc')->get();
        $roles=Role::orderBy('name','asc')->get();
        return view('admin.staff.create',array('user'=>Auth::user()),compact('branches','roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required|unique:users',
            'phone'=>'required|unique:users',
            'branch_id'=>'required',
            'role_id'=>'required',
        ]);
        //adding new staff
        $staff=new User();
        $staff->identitynum=rand(23456,78912);
        $staff->lastname=$request->lastname;
        $staff->firstname=$request->firstname;
        $staff->email=$request->email;
        $staff->phone=$request->phone;
        $staff->branch_id=$request->branch_id;
        $staff->save();


        //attaching newly created staff to a role
        $userRole=Role::where('id',$request->role_id)->first();
        $staff->roles()->attach($userRole);

        //redirecting to all staff page
        return redirect()->route('staffs.index')->with('success','New Staff with number '.$staff->identitynum.' has been created successfully!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $staff=User::where('id',$id)->first();
        return view('admin.staff.show',array('user'=>Auth::user()),compact('staff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $staff=User::where('id',$id)->first();
        $branches=Branch::orderBy('address','asc')->get();
        $roles=Role::orderBy('name','asc')->get();
        return view('admin.staff.edit',array('user'=>Auth::user()),compact('staff','branches','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'firstname'=>'required',
            'lastname'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'branch_id'=>'required',
            'role_id'=>'required',
        ]);
        //adding new staff
        $staff=User::find($id);
        // $staff->identitynum=rand(23456,78912);
        $staff->lastname=$request->lastname;
        $staff->firstname=$request->firstname;
        $staff->email=$request->email;
        $staff->phone=$request->phone;
        $staff->branch_id=$request->branch_id;
        $staff->save();


        //attaching newly created staff to a role
        // $userRole=Role::where('name','Sales Staff')->first();
        $userRole=Role::where('id',$request->role_id)->first();
        $staff->roles()->sync($userRole);

        //redirecting to all staff page
        return redirect()->route('staffs.index')->with('success','Staff with number '.$staff->identitynum.' has been edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }

    public function activate($id)
    {
        $staff = User::find($id);
        $staff->isactive = '1';
        $staff->save();
        
        return back();
    }

    public function deactivate($id)
    {
        $staff = User::find($id);
        $staff->isactive = '0';
        $staff->save();

        return back();
    }
}
