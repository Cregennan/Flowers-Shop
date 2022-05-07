<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function login(Request $request){
        $validated = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        $result = Auth::attempt([
            'username'=>$validated['username'],
            'password'=>$validated['password']
        ]);
        if($result) {
            return redirect()->intended('/');
        }
        else{
            return Redirect::route('login')->with([
                    'error'=>true,
                    'message'=>'Неверный логин или пароль'
                ]);
        }
    }

    public function logout(){
        Auth::logout();
        return \redirect()->intended('/');
    }
}
