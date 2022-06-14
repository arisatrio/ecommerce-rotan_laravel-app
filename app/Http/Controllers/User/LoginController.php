<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use Session;

class LoginController extends Controller
{
    public function loginForm()
    {
        return view('_user.login');
    }

    public function loginSubmit(Request $request)
    {
        $data= $request->all();
        
        if(Auth::attempt(['email' => $data['email'], 'password' => $data['password'], 'status'=>'active'])) {
            Session::put('user',$data['email']);
            
            request()->session()->flash('success','Successfully login');
            return redirect()->route('home');
        }
        else {
            request()->session()->flash('error','Invalid email and password pleas try again!');
            return redirect()->back();
        }
    }
}
