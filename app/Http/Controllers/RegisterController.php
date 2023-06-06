<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function register(){
        return view('loginRegister.register');
    }
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:8',
            'gender' => 'required'
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        
        // $request->session()->flash();

        return redirect('/login')->with('success', 'Registration is Done! Please login');
    }
}
