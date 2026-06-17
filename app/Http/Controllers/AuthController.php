<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    
    public function index()
    {
        return view('auth.login');
    }   
    
    public function authenticate(Request $request)
    {
        $infoLogin = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::attempt($infoLogin, $request->remember ?? 0)) {
            if($request->user()->hasRole('store')) {
                return redirect()->route('chart');
            } else {  
                return redirect()->route('dashboard');
            }            
        }else{
            return redirect()->route('login')->withErrors([
                'username' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();

        return redirect('login');
    }
}
