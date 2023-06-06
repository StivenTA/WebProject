<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    //
    public function index()
    {
        $this->authorize('customer');
        return view('product.cart', [
            'transactions' => Transaction::where('user_id', '=', auth()->user()->id)->where('payed', '=', 1)->get(),
        ]);
    }
    public function view()
    {
        $this->authorize('customer');
        return view('product.transaction', [
            'transactions' => Transaction::where('user_id', '=', auth()->user()->id)->where('payed', '=', 0)->get(),
        ]);
    }
    public function find(Transaction $transaction)
    {
        $this->authorize('customer');
        return view('product.detailTransaction', [
            'transactions' => $transaction
        ]);
    }
    public function destroy(Transaction $transaction)
    {
        $this->authorize('customer');
        Transaction::destroy($transaction->id);
        return redirect('/cart')->with('success', 'Item in Cart has been deleted!');
    }
    // public function checkOut(User $user)
    // {
    //     $this->authorize('customer');
    //     Transaction::where('payed', 1)->where('user_id', $user->user_id)->update(['payed' => 0]);
    //     Product::where('id', $user->transaction->product->id)->update(['stocks' => $user->transaction->product->stocks - $user->transaction->quantity]);

    //     return redirect('/transaction')->with('success', 'Item successfully checked out!');
    // }
    public function checkOut(User $user)
    {
        $this->authorize('customer');

        // Retrieve the transaction for the user
        $transaction = $user->transactions->where('payed', 1)->first();

        if ($transaction) {
            // Update the payed status of the transaction
            $transaction->payed = 0;
            $transaction->save();

            // Update the stock quantity of the associated product
            $product = $transaction->product;
            if ($product) {
                $product->stocks -= $transaction->quantity;
                $product->save();
            }
        }

        return redirect('/transaction')->with('success', 'Item successfully checked out!');
    }
}
