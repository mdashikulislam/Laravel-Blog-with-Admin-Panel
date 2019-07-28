<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Permission;
use App\Model\Admin\Role;
use App\Model\User\tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.user.role');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index')->with([
            'roles'=>$roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create')
            ->with([
                'permissions'=>$permissions
            ]);
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
            'name'=>'required|max:20|unique:roles',
            'permission'=>'required'
        ]);
        $role = new Role();
        $role->name = $request->name;
        $role->save();
        $role->permissions()->sync($request->permission);
        return redirect()->route('role.index')->with('success','Role Crerate Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permissions = Permission::all();
        $edit = Role::where('id',$id)->first();
        return view('admin.role.edit')
            ->with([
                'edit'=>$edit,
                'permissions'=>$permissions
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'name'=>'required|max:20',
            'permission'=>'required'
        ]);
        $role = Role::find($id);
        $role->name = $request->name;
        $role->save();
        $role->permissions()->sync($request->permission);
        return redirect()->route('role.index')->with('success','Role Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::where('id',$id)->delete();
        return redirect()->back();
    }
}
