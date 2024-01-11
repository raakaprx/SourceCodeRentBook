<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;


class AuthController extends Controller

{
    public function login()
    {
        return view ('login');
    }

    public function register()
    {
        return view ('register');
    }
    
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
        
      
        //dan apakah user loginya valid
    
        if (Auth::attempt($credentials)){
             // apakah user sudah = active
             if(Auth::user()->status !='active'){ 
                Auth::logout();
                $request->session()->invalidate();    
                $request->session()->regenerateToken();
                Session::flash('status','failed');
                Session::flash('message','Akun anda belum aktif,silahkan kontak admin untuk aktivasi');
                return redirect('/login');
            }
          
            $request->session()->regenerate();
            if(Auth::user() ->role_id == 1) {
                return redirect('/Dashboard');
            }

            if(Auth::user() ->role_id == 2) {
                return redirect('/Profile');
            }
        } 
            Session::flash('status', 'failed');
            Session::flash('message', 'Login Invalid');
            return redirect('/login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();    
        $request->session()->regenerateToken();
        return redirect('login');
    }        

    public function registerProses(Request $request)
    {
        $validate = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'phone' => 'max:255',
            'address' => 'required',
        ]);

        $user = User::create($request->all());

        Session::flash('status', 'Succes');
        Session::flash('message', 'Register Succes . Wait admin for Approval ');
        return redirect('register');
    }
}