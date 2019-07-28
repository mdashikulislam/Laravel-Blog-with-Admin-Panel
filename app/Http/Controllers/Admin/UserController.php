<?php

namespace App\Http\Controllers\Admin;

use App\Model\Admin\Admin;
use App\Model\Admin\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Admin::all();
        return view('admin.users.index')->with([
            'users' =>$users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Auth::user()->can('admin.user.create')){
            $roles = Role::all();
            if ($roles->count() > 0){
                return view('admin.users.create')
                    ->with([
                        'roles'=>$roles
                    ]);
            }else{
                return redirect()->route('role.create')->with([
                    'success'=>'Create Role First'
                ]);
            }
        }
        return redirect()->route('admin.home');



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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone'=>['required'],
        ]);
        $request->status? : $request['status']=0;
        $request['password'] = bcrypt($request->password);
        $user = Admin::create($request->all());
        $user->roles()->sync($request->role);
        return redirect()->route('user.index')->with('success','User added Successfully');

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
        if (\Auth::user()->can('admin.user.update')){
            $roles = Role::all();
            $user = Admin::find($id);

            return view('admin.users.edit')
                ->with([
                    'roles'=>$roles,
                    'user'=>$user
                ]);
        }
        return redirect()->route('admin.home');

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone'=>['required'],
        ]);
        $request->status? : $request['status']=0;
        $user = Admin::where('id',$id)->update($request->except('_token','_method','role'));
        Admin::find($id)->roles()->sync($request->role);
        return redirect()->route('user.index')->with('success','User Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user  = Admin::where('id',$id)->delete();
        return redirect()->route('user.index')->with('success','User Delete Successfully');
    }
}
