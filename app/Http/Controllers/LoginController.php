<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    //
    public function login(){
        return view('loginRegister.login');
    }
 
 
    public function auth(Request $request){
         $credentials = $request->validate([
             'email' => 'required|email',
             'password' => 'required'
         ]);
         
         
         if(Auth::attempt($credentials)){
            
            if($request->rememberme){
                Cookie::queue('email', $credentials['email'], 120);
                Cookie::queue('password', $credentials['password'], 120);
            }
            $request->session()->regenerate();           
            return redirect()->intended('/');
            
         };
         return back()->with('loginError', 'Login Failed!');
    }
 
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function user(){
        $this->authorize('admin');
        return view('LoginRegister.user',[
            'users' => User::where('is_admin',0)->get()
        ]);
    }
    public function delete(User $user){
        $this->authorize('admin');
        User::destroy($user->id);
        return redirect('/user')->with('success','User has been deleted!');
    }
}
