<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class ManagerLoginController extends Controller
{
    public function __construct(){
      $this->middleware('guest:manager');
    }

    public function showLoginForm(){
      return view('auth.manager-login');
    }

    public function login(Request $request){
        //validate the form data
        $this->validate($request, [
            'email' => 'required|email' ,
            'password' => 'required|min:6'
        ]);

        //attempt to log the user in
        if(Auth::guard('manager')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            // if successful, then redirect to intended location
            echo "ajkd sfkadj f" ;die ;
            return redirect()->intended(route('manager.dashbord')) ;
        }
        //Auth::guard('admin')->attempt($credentials , $remember);
        //if unsuccessfull , then redirect to login with form data
        return redirect()->back()->withInput($request->only('email','remember')) ;
    }

}
