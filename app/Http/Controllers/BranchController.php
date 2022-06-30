<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches=Branch::latest()->get();
        return view('admin.branches.index',array('user'=>Auth::user()),compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches=Branch::with(['users','products'])->latest()->get();
        return view('admin.branches.index',array('user'=>Auth::user()),compact('branches'));
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
            'address'=>'required',
            'town'=>'required',
            'state'=>'required',
        ]);

        Branch::create([
            'address'=>$request->address,
            'town'=>$request->town,
            'state'=>$request->state,
            'company_id'=>1,
        ]);

        return redirect()->back()->with('success','New Branch added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $branch=Branch::with(['products'])->where('id',$id)->first();
        return view('admin.branches.show',array('user'=>Auth::user()),compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $branch=Branch::where('id',$id)->first();
        return view('admin.branches.edit',array('user'=>Auth::user()),compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'address'=>'required',
            'town'=>'required',
            'state'=>'required',
        ]);

        $branch=Branch::find($id);
        $branch->address=$request->address;
        $branch->town=$request->town;
        $branch->state=$request->state;
        $branch->save();
           
        return redirect()->route('branches.index')->with('success','Branch edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $branch->delete();
        return redirect()->back()->with('deleted', $branch->address.' branch deleted successfully!');
    }
}
