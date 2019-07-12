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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//       $this->validate($request,[
//           'name'=>'required',
//           'email' => 'required|unique:admins',
//           'password'=>'required',
//           'confirm_password'=>'required',
//           'phone'=>'required',
//           'status'=>'required'
//       ]);
//      $user =new  Admin();
//      $user->name = $request->name;
//      $user->email = $request->email;
//      $user->password = $request->password;
//      $user->phone = $request->phone;
//      $user->status = $request->status;
//      if ($request->password === $request->confirm_password){
//        $user->save();
//        return redirect()->route('user.index')->with([
//            'success'=>'User Create Successful'
//        ]);
//      }else{
//          return redirect()->back();
//      }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
