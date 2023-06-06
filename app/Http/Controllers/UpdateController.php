<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateController extends Controller
{
    //

    public function index(){
        $this->authorize('customer');
        return view('loginRegister.update');
    }
    public function update(Request $request){
        $this->authorize('customer');
        $validated = $request->validate([
            'name' => 'required|max:30',
            'password' => 'required|confirmed|min:8',
            'gender' => 'required'
        ]);
        $validated['password'] = Hash::make($validated['password']);

        User::where('id', auth()->user()->id)->update($validated);
        return redirect('/')->with('success', 'Profile Has Been Updated!');
    }

    public function index1(){
        $this->authorize('admin');
        return view('product.insert');
    }
    public function store(Request $request){
        $this->authorize('admin');
        $validated = $request->validate([
            'category' => 'required',
            'name' => 'required|min:5|max:25',
            'description' => 'required|min:10|max:100',
            'price' => 'required|integer|min:1000|max:10000000',
            'stocks' => 'required|integer|min:1',
            'image'=>  'image'
        ]);
        if($request->file('image')){
            $validated['image'] = $request->file('image')->store('product-image');
        }
        Product::create($validated);
        return redirect('/')->with('success', 'Product Has been added!');
    }
}
