<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Admin\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('admin.permission.index')
            ->with([
                'permissions'=>$permissions
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.permission.create');
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
            'name'=>'required|max:20|unique:permissions'
        ]);

        $permission = new Permission;
        $permission->name = $request->name;
        $permission->save();

        return redirect()->route('permission.index')->with('success','Permission Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $permissions = Permission::where('id',$permission->id)->first();
        return view('admin.permission.edit')
            ->with([
                'permissions'=>$permissions
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        $this->validate($request,[
            'name'=>'required|max:20'
        ]);

        $permission = Permission::find($permission->id);
        $permission->name = $request->name;
        $permission->save();

        return redirect()->route('permission.index')->with('success','Permission Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Admin\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $per = Permission::where('id',$permission->id)->delete();
        return redirect()->back();
    }
}
