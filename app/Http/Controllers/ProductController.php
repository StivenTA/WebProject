<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(){
        return view('product.home',[
            'products' => Product::paginate(6)
        ]);
    }
    public function detail(Product $product){
        return view('product.detail',[
            'products' => $product
        ]);
    }

    public function cart(Request $request, Product $product){
        $this->authorize('customer');
        $validated = $request->validate([
            'quantity' => 'min:1'
        ]);
        $validated['product_id'] = $product->id;
        $validated['user_id'] = auth()->user()->id;
        $validated['payed'] = '1';
        if($validated['quantity'] > $product->stocks){
            return back()->with('quantityError','You Exceded the stocks of product. Please input Less than the stocks!');
        }else{
            Transaction::create($validated);
        }
        return redirect('/cart')->with('success', 'Item has been added to cart!');
    }


    public function search(){
        return view('product.search',[
            'products' => Product::search(request(['search','category']))->paginate(6)->withQueryString()
        ]);
    }

    public function index1(Product $product){
        $this->authorize('admin');
        return view('product.update',[
            'products' => $product
        ]);
    }
    public function upload(Request $request, Product $product){
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
            if($request->oldImg){
                Storage::delete($request->oldImg);
            }
            $validated['image'] = $request->file('image')->store('product-image');
        }
        Product::where('id', $product->id)->update($validated);
        return redirect('/')->with('success', 'Product has been updated!');
    }
}
