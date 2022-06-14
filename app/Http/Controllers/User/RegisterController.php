<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

Use App\User;

class RegisterController extends Controller
{
    public function registerForm()
    {
        return view('_user.register');
    }

    public function registerSubmit(Request $request)
    {
        $this->validate($request, [
            'name'      =>'string|required|min:2',
            'email'     =>'string|required|unique:users,email',
            'password'  =>'required|min:6|confirmed',
        ]);
        $data = $request->all();

        $check = User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'password'  => bcrypt($data['password']),
            'status'    => 'active'
        ]);
        Session::put('user', $data['email']);
        if($check){
            request()->session()->flash('success','Successfully registered');
            return redirect()->route('home');
        }
        else{
            request()->session()->flash('error','Please try again!');
            return back();
        }
    }
}
