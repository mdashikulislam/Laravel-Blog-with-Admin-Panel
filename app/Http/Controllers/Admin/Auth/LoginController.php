<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Model\Admin\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/backend/home';

    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);


        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }


        return $this->sendFailedLoginResponse($request);
    }

    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    protected function credentials(Request $request)
    {
//        return $request->only($this->username(), 'password');

       $admin = Admin::where('email',$request->email)->get();
       $admins = Admin::where('email',$request->email)->first();
       if (count($admin)){
           if ($admins['status'] == 0){
               return [
                   'email'=>'inactive',
                   'password'=>'Your account is not Active, please contact with admin'
               ];
           }else{
               return [
                   'email'=>$request->email,
                   'password'=>$request->password,
                   'status'=>1
               ];
           }
       }
           return $request->only($this->username(), 'password');



    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/backend/login');
    }
}
