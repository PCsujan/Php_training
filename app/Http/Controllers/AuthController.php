<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Termwind\Components\Raw;

use function Laravel\Prompts\form;

class AuthController extends Controller
{

    //
    public function showLoginForm()
    {
        return view(view: 'welcome');
    }
    public function Submitlogin(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|string|min:6',
            ]);

            if(Auth::attempt( $request->only ('email','password'))){
                $request->session()->regenerate();
                return redirect()->intended(route('dashboard'));
            }
            return back()->withErrors([
                'email'=> 'Invalid credentails',
        ]);

        public function logout(Request $request) {
            $request->session()->regenerate();
            return redirect()->intended(route('logout'));
        }
    }   
}

