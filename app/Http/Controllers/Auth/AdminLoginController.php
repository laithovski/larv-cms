<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Hash;


class AdminLoginController extends Controller
{
    //Admin Login Controller

    public function __construct() {
        $this->middleware("guest:admin");
    }

    public function index() {
        return view('pages.auth.login');
    }

    public function authenticate($credentials){
        $admin = Auth::guard('admin')->getProvider()->retrieveByCredentials($credentials);

        Auth::guard('admin')->login($admin, false);
    }

    public function login(Request $request){
        //validate the form
        $this->validate($request, ['username' => 'required', 'email' => 'required|email', 'password'=> 'required']);

        $credentials = ['username' => $request->username, 'email' => $request->email, 'password'=>$request->password];
        
        if(Auth::guard('admin')->validate($credentials, false)){
            //Authenticate
            $this->authenticate($credentials);

            session()->flash('Success', 'Welcome back ' . $credentials["username"]);

            //Redirect to Dashboard //success
            return redirect(route('category.index'));
        }

        return back()->with("error", 'Username, Email and/or Password are incorrect')->withInput(['username' => $request->username, 'email' =>$request->email]);
    }
}
